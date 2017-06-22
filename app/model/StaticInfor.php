<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\library\PHPDev;

class StaticInfor extends Model
{
    protected $table = 'static';
    protected $primaryKey = 'static_id';
    public $timestamps = false;
    const FOLDER = 'static';
    protected $fillable = array(
        'static_id',
        'static_title',
        'static_keyword',
        'static_content',
        'static_status'
    );

    public static function removeCache($id = 0,$key='')
    {
        if ($id > 0) {
            Cache::forget(\Memcaches::CACHE_ALL_STATIC);
            Cache::forget(\Memcaches::CACHE_STATIC_ID . $id);
        }
        if ($key!=''){
            Cache::forget(\Memcaches::CACHE_STATIC_KEY . $key);
        }
    }

    public static function searchByCondition($search = array(), $limit = 0, $offset = 0, &$total = 0)
    {
        $rs = array();
        try {
            $query = self::where('static_id', '>', 0);
            if (isset($search['static_title']) && $search['static_title'] != '') {
                $query->where('static_title', 'like', '%' . $search['static_title'] . '%');
            }
            if (isset($search['static_status']) && $search['static_status'] != -1) {
                $query->where('static_status', $search['static_status']);
            }
            $total = $query->count();
            $fil_get = isset($search['fil_get']) && $search['fil_get'] != '' ? explode(',', trim($search['fil_get'])) : array();
            if (!empty($fil_get)) {
                $rs = $query->take($limit)->skip($offset)->get($fil_get);
            } else {
                $rs = $query->take($limit)->skip($offset)->get();
            }
            return $rs;
        } catch (\PDOException $e) {
            throw new \PDOException();
        }
    }

    public static function getById($id = 0)
    {
        $rs = \Memcaches::CACHE_ON ? Cache::get(\Memcaches::CACHE_STATIC_ID . $id) : array();
        if (empty($rs)) {
            try {
                $rs = self::find($id);
                if ($rs && \Memcaches::CACHE_ON) {
                    Cache::put(\Memcaches::CACHE_STATIC_ID . $id, $rs, \Memcaches::CACHE_TIME_TO_LIVE_ONE_MONTH);
                }
            } catch (\PDOException $e) {
                throw new \PDOException();
            }
        }
        return $rs;
    }

    public static function getIdByKeyword($key = '')
    {
        $id = 0;
        $rs = \Memcaches::CACHE_ON ? Cache::get(\Memcaches::CACHE_STATIC_KEY . $key) : array();
        try {
            if (empty($rs)) {
                $rs = self::where('static_keyword', $key)->first();
                if ($rs && \Memcaches::CACHE_ON) {
                    Cache::put(\Memcaches::CACHE_STATIC_KEY . $key, $rs, \Memcaches::CACHE_TIME_TO_LIVE_ONE_MONTH);
                }
            }
            $id = $rs->static_id;
        } catch (\PDOException $e) {
            throw new \PDOException();
        }
        return $id;
    }

    public static function getAll($dataget = array(), $limit = 0)
    {
        $rs = \Memcaches::CACHE_ON ? Cache::get(\Memcaches::CACHE_ALL_STATIC) : array();
        $rs  = array();
        if (empty($rs)) {
            try {
                $query = self::where('static_id', '>', 0);
                $query->where('static_status', \CGlobal::status_show);
                $fil_get = isset($dataget['fil_get']) && $dataget['fil_get'] ? explode(',', trim($dataget['fil_get'])) : array();
                if ($limit > 0) {
                    $query->take($limit);
                }
                if (!empty($fil_get)) {
                    $rs = $query->get($fil_get);
                } else {
                    $rs = $query->get();
                }
                if ($rs && \Memcaches::CACHE_ON) {
                    Cache::put(\Memcaches::CACHE_ALL_STATIC, $rs, \Memcaches::CACHE_TIME_TO_LIVE_ONE_MONTH);
                }
            } catch (\PDOException $E) {
                throw new \PDOException();
            }
        }
        return $rs;
    }

    public static function addItem($data = array())
    {
        if (is_array($data) && count($data) > 0) {
            try {
                DB::beginTransaction();
                $item = new self();
                foreach ($data as $k => $v) {
                    $item->$k = $v;
                }
                if ($item->save()) {
                    DB::commit();
                    if ($item->static_id && \Memcaches::CACHE_ON) {
                        self::removeCache($item->static_id,$item->static_keyword);
                    }
                    return $item->static_id;
                }
                DB::commit();
            } catch (\PDOException $e) {
                DB::rollBack();
                throw new \PDOException();
            }
        }
        return false;
    }

    public static function updateItem($data = array(), $id = 0)
    {
        if (is_array($data) && count($data) > 0 && $id > 0) {
            try {
                DB::beginTransaction();
                $item = self::find($id);
                $item->update($data);
                if (isset($item->static_id) && $item->static_id > 0) {
                    self::removeCache($item->static_id,$item->static_keyword);
                }
                DB::commit();
                return true;
            } catch (\PDOException $e) {
                DB::rollBack();
                throw new \PDOException();
            }
        }
        return false;
    }

    public static function deleteItem($id = 0)
    {
        if ($id > 0) {
            try {
                DB::beginTransaction();
                $item = self::find($id);
                if ($item != null) {
                    $item->delete();
                    DB::commit();
                    if (isset($item->static_id) && $item->static_id > 0) {
                        self::removeCache($item->static_id,$item->static_keyword);
                    }
                    return true;
                }
            } catch (\PDOException $e) {
                DB::rollBack();
                throw new \PDOException();
            }
        }
        return false;
    }

    public static function saveItem($data = array(), $id = 0)
    {
        if ($id > 0) {
            return self::updateItem($data, $id);
        } else {
            return self::addItem($data);
        }
    }
}

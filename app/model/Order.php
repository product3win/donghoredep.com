<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\library\PHPDev;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'order_id';
    public $timestamps = false;
    const FOLDER = 'order';
    protected $fillable = array(
        'order_id',
        'order_name',
        'order_phone',
        'order_address',
        'product_infor',
        'order_total',
        'order_status',
        'order_srouces',
        'order_created'
    );

    public static function removeCache($id = 0)
    {
        if ($id > 0) {
            Cache::forget(\Memcaches::CACHE_ALL_ORDER);
            Cache::forget(\Memcaches::CACHE_ORDER_ID . $id);
        }
    }

    public static function searchByCondition($search = array(), $limit = 0, $offset = 0, &$total = 0)
    {
        $rs = array();
        try {
            $query = self::where('order_id', '>', 0);
            if (isset($search['order_name']) && $search['order_name'] != '') {
                $query->where('order_name', 'like', '%' . $search['order_name'] . '%');
                $query->orWhere('order_phone',$search['order_name']);
            }
            if (isset($search['order_status']) && $search['order_status'] != -1) {
                $query->where('order_status', $search['order_status']);
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
        $rs = \Memcaches::CACHE_ON ? Cache::get(\Memcaches::CACHE_ORDER_ID . $id) : array();
        if (empty($rs)) {
            try {
                $rs = self::find($id);
                if ($rs && \Memcaches::CACHE_ON) {
                    Cache::put(\Memcaches::CACHE_ORDER_ID . $id, $rs, \Memcaches::CACHE_TIME_TO_LIVE_ONE_MONTH);
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
        $rs = \Memcaches::CACHE_ON ? Cache::get(\Memcaches::CACHE_CATEGORY_KEY . $key) : array();
        try {
            if (empty($rs)) {
                $rs = self::where('category_keyword', $key)->first();
                if ($rs && \Memcaches::CACHE_ON) {
                    Cache::put(\Memcaches::CACHE_CATEGORY_KEY . $key, $rs, \Memcaches::CACHE_TIME_TO_LIVE_ONE_MONTH);
                }
            }
            $id = $rs->category_id;
        } catch (\PDOException $e) {
            throw new \PDOException();
        }
        return $id;
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
                    if ($item->order_id && \Memcaches::CACHE_ON) {
                        self::removeCache($item->order_id);
                    }
                    return $item->order_id;
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
                if (isset($item->order_id) && $item->order_id > 0) {
                    self::removeCache($item->order_id);
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
                    if (isset($item->order_id) && $item->order_id > 0) {
                        self::removeCache($item->order_id);
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

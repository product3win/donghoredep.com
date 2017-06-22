<?php
/**
 * Created by PhpStorm.
 * User: Bui
 * Date: 17/06/2017
 * Time: 20:31 CH
 */

namespace App\Http\Controllers\Manager;


use App\Http\Controllers\BaseAdminController;
use App\Http\Controllers\BaseHomController;
use App\model\StaticInfor;
use App\model\Trash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StaticController extends BaseAdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    protected $arrStatus = array(-1 => 'Chọn trạng thái', \CGlobal::status_show => 'Hiện', \CGlobal::status_hide => 'Ẩn');
    public function listView(Request $request){
        $this->menu();
        $this->title('Static');
        $this->breadcrumb([['title' => 'Static', 'link' => route('admin.static'), 'active' => 'active']]);
        $pageNo = (int)$request->has('page') ? $request->page : 1;
        $pageScroll = \CGlobal::num_scroll_page;
        $limit = \CGlobal::num_record_per_page;
        $offset = ($pageNo - 1) * $limit;
        $search = array();
        $total = 0;
        $search['static_title'] = $request->has('static_title') ? $request->static_title : '';
        $search['static_status'] = (int)$request->has('static_status') ? $request->static_status : -1;
        $dataSearch = StaticInfor::searchByCondition($search, $limit, $offset, $total);
        $paging = $total > 0 ? \Pagging::getPager($pageScroll, $pageNo, $total, $limit, $search, $request->url()) : '';
        $optionStatus = \Utility::getOption($this->arrStatus, $search['static_status']);
        return view('manager.static.list', ['search' => $search, 'data' => $dataSearch, 'total' => $total, 'paging' => $paging, 'optionStatus' => $optionStatus]);
    }
    public function getItem(Request $request, $id = 0)
    {
        $this->menu();
        $this->title($id == 0 ? 'Thêm static mới' : 'Cập nhật static');
        $this->breadcrumb([['title' => 'Static', 'link' => \route('admin.static'), 'active' => ''], ['title' => $id == 0 ? 'thêm mới' : 'cập nhật', 'link' => \route('admin.static_edit', ['id' => $id]), 'active' => 'active']]);
        \Loader::loadJS('libs\ckeditor\ckeditor.js',\CGlobal::$postHead);
        $data = array();
        if ($id > 0) {
            $data = StaticInfor::getById($id);
        }
        $optionStatus = \Utility::getOption($this->arrStatus, isset($data['static_status']) ? $data['static_status'] : \CGlobal::status_show);
        return view('Manager.static.add', ['id' => $id, 'data' => $data, 'optionStatus' => $optionStatus]);
    }

    public function postItem(Request $request, $id = 0)
    {
        $id = $id == 0 ? $request->id_hidden : $id;
        $this->validate($request, [
            'static_title' => 'required|string',
            'static_keyword' => 'required|string',
            'static_status' => 'required|int|min:0']);

        $data = array('static_title' => addslashes($request->static_title),
            'static_content' => addslashes($request->static_content),
            'static_keyword' => $request->static_keyword,
            'static_status' => $request->static_status);

        StaticInfor::saveItem($data, $id);
        return redirect()->route('admin.static');
    }

    public function delete(Request $request)
    {
        $checkID = $request->checkItem;
        $token = $request->_token;
        if (Session::token() === $token) {
            if (!empty($checkID) && is_array($checkID)) {
                foreach ($checkID as $id) {
                    Trash::addItem($id, Session::get('user')['user_id'], 'App\model\StaticInfor', Script::FOLDER, 'static_id', 'static_title', '', '');
                    StaticInfor::deleteItem($id);
                }
            }
            return redirect()->route('admin.static');
        }
    }
}
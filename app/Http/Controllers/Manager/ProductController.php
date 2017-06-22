<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\BaseAdminController;
use App\model\Category;
use App\model\product;
use App\model\Trash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use \Upload;
use \Pagging;
use \Utility;

class ProductController extends BaseAdminController
{
    protected $arStatus = array(-1 => 'chọn trạng thái', \CGlobal::status_show => 'Hiện', \CGlobal::status_hide => 'Ẩn');
    protected $arCate = array(-1 => 'Chọn danh mục sản phẩm');
    protected $arBrand = array(-1 => 'Chọn nhãn hiệu');

    public function __construct()
    {
        parent::__construct();
        $cate = Category::getAll(array('category_parent_id' => Category::getIdByKeyword(\CGlobal::key_danh_muc_dh)), 0);
        $brand = Category::getAll(array('category_parent_id' => Category::getIdByKeyword(\CGlobal::key_nhan_hieu)), 0);
        foreach ($cate as $item) {
            $this->arCate[$item->category_id] = $item->category_title;
        }
        foreach ($brand as $item) {
            $this->arBrand[$item->category_id] = $item->category_title;
        }
    }

    public function listView(Request $request)
    {
        $this->menu();
        $this->title('Product');
        $this->breadcrumb([['title' => 'Product', 'link' => route('admin.product'), 'active' => 'active']]);
        $pageNo = (int)$request->has('page') ? $request->page : 1;
        $pageScroll = \CGlobal::num_scroll_page;
        $limit = \CGlobal::num_record_per_page;
        $offset = ($pageNo - 1) * $limit;
        $search = array();
        $total = 0;

        $search['product_code'] = $request->has('product_code') ? $request->product_code : '';
        $search['product_cate_id'] = (int)$request->has('product_cate_id') ? $request->product_cate_id : -1;
        $search['product_brand_id'] = (int)$request->has('product_brand_id') ? $request->product_brand_id : -1;
        $search['product_cheapest'] = (int)$request->has('product_cheapest') ? $request->product_cheapest : -1;
        $search['product_gif'] = (int)$request->has('product_gif') ? $request->product_gif : -1;
        $search['product_most'] = (int)$request->has('product_most') ? $request->product_most : -1;
        $search['product_news'] = (int)$request->has('product_news') ? $request->product_news : -1;
        $search['product_buy_most'] = (int)$request->has('product_buy_most') ? $request->product_buy_most : -1;
        $search['product_best'] = (int)$request->has('product_best') ? $request->product_best : -1;
        $search['product_status'] = (int)$request->has('product_status') ? $request->product_status : -1;
        $dataSearch = Product::searchByCondition($search, $limit, $offset, $total);
//        $total = 5000;
        $paging = $total > 0 ? Pagging::getPager($pageScroll, $pageNo, $total, $limit, $search, $request->url()) : '';

        $optionStatus = Utility::getOption($this->arStatus, $search['product_status']);
        $optionCate = Utility::getOption($this->arCate, $search['product_cate_id']);
        $optionBrand = Utility::getOption($this->arBrand, $search['product_brand_id']);

        return view('manager.product.list', ['search' => $search, 'data' => $dataSearch, 'total' => $total, 'paging' => $paging, 'optionStatus' => $optionStatus,
            'arCate' => $this->arCate, 'optionCate' => $optionCate, 'arBrand' => $this->arBrand, 'optionBrand' => $optionBrand]);

    }

    public function getItem(Request $request, $id = 0)
    {
        \Loader::loadJS('libs/ckeditor/ckeditor.js', \CGlobal::$postHead);
        $this->menu();
        $this->title($id == 0 ? 'Thêm sản phẩm mới' : 'Cập nhật sản phẩm');
        $this->breadcrumb([['title' => 'Product', 'link' => \route('admin.product'), 'active' => ''], ['title' => $id == 0 ? 'thêm mới' : 'cập nhật', 'link' => \route('admin.product_edit', ['id' => $id]), 'active' => 'active']]);
        $data = array();
        if ($id > 0) {
            $data = Product::getById($id);
        }
        $optionStatus = Utility::getOption($this->arStatus, isset($data['product_status']) ? $data['product_status'] : \CGlobal::status_show);
        $optionCate = Utility::getOption($this->arCate, isset($data['product_cate_id']) ? $data['product_cate_id'] : -1);
        $optionBrand = Utility::getOption($this->arBrand, isset($data['product_brand_id']) ? $data['product_brand_id'] : -1);
        return view('Manager.product.add', ['id' => $id, 'data' => $data, 'optionStatus' => $optionStatus,
            'arCate' => $this->arCate, 'optionCate' => $optionCate, 'arBrand' => $this->arBrand, 'optionBrand' => $optionBrand]);
    }

    public function postItem(Request $request, $id = 0)
    {
        $id = $id == 0 ? $request->id_hidden : $id;
        $this->validate($request, ['product_code' => 'required|string',
            'product_title' => 'required|string']);

        $data = array();
        $data['product_cate_id'] = $request->product_cate_id;
        $data['product_brand_id'] = $request->product_brand_id;
        $data['product_code'] = addslashes($request->product_code);
        $data['product_title'] = addslashes($request->product_title);
        $data['product_alias'] = Utility::pregReplaceStringAliasNoSpace($request->product_title).Utility::pregReplaceStringAlias($request->product_code);
        $data['product_price'] = $request->product_price;
        $data['product_price_saleof'] = $request->product_price_saleof;
        $data['product_video'] = serialize($request->product_video);
        $data['product_intro'] = addslashes($request->product_intro);
        $data['product_details'] = addslashes($request->product_details);
        $data['product_status'] = $request->product_status;
        $data['product_cheapest'] = $request->product_cheapest;
        $data['product_gif'] = $request->product_gif;
        $data['product_most'] = $request->product_most;
        $data['product_news'] = $request->product_news;
        $data['product_buy_most'] = $request->product_buy_most;
        $data['product_best'] = $request->product_best;
        $data['product_order_no'] = $request->product_order_no;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keywords'] = $request->meta_keywords;
        $data['meta_description'] = $request->meta_description;
        $data['product_created'] = time();

        $item = Product::getById($id);
        $fileName = '';
        $listfileName = array();

        if ($request->hasFile('product_media') && $request->file('product_media')->isValid()) {
            if ($id <= 0) {
                $id = Product::saveItem(['product_status' => \CGlobal::status_img, 'product_created' => time()], $id);
            }
            if ($id > 0) {
                $fileName = \Upload::uploadFile(
                    'product_media',
                    $_file_ext = 'jpg,jpeg,png',
                    $_max_file_size = 10 * 1024 * 1024,
                    $_folder = Product::FOLDER . '/' . $id,
                    $type_json = 0
                );
            }
        }
        if ($request->remove_media == 1 && (!empty($item) && $item->product_media != '')) {
            Upload::unlinkFileAndFolder($item->product_media, $id, 'uploads/' . Product::FOLDER, 'uploads/thumbs/' . Product::FOLDER, 0);
        }
        if ($request->remove_media == 0 && (!empty($item) && $item->product_media != '')) {
            $fileName = $item->product_media;
        }
        $data['product_media'] = $fileName;

        $ar = !empty($item) && $item->product_multi_media != '' ? unserialize($item->product_multi_media) : array();
        if (is_array($request->product_multi_media) && count($request->product_multi_media) > 0) {
            if ($id <= 0) {
                $id = Product::saveItem(['product_status' => \CGlobal::status_img, 'product_created' => time()], $id);
            }
            if ($id > 0) {
                $listfileName = \Upload::UploadMultiFile(
                    'product_multi_media',
                    $_file_ext = 'jpg,jpeg,png',
                    $_max_file_size = 10 * 1024 * 1024,
                    $_folder = Product::FOLDER . '/' . $id,
                    $type_json = 0
                );
            }
        }
        if (($request->has('remove_multi_media') && is_array($request->remove_multi_media) && count($request->remove_multi_media) > 0) && (!empty($ar))) {
            foreach ($request->remove_multi_media as $k => $v) {
                if ($v != -1) {
                    Upload::unlinkFileAndFolder($ar[$v], $id, 'uploads/' . Product::FOLDER, 'uploads/thumbs/' . Product::FOLDER, 0);
                    unset($ar[$v]);
                }
            }
            if (!empty($ar)) {
                foreach ($ar as $k => $v) {
                    $listfileName[] = $v;
                }
            }
        }
        $data['product_multi_media'] = serialize($listfileName);
        if ($id > 0) {
            unset($data['product_created']);
        }
        product::saveItem($data, $id);
        return redirect()->route('admin.product');
    }

    public function delete(Request $request)
    {
        $checkID = $request->checkItem;
        $token = $request->_token;
        if (Session::token() === $token) {
            if (!empty($checkID) && is_array($checkID)) {
                foreach ($checkID as $id) {
                    Trash::addItem($id, Session::get('user')['user_id'], 'App\model\Product', Product::FOLDER, 'product_id', 'product_title', 'product_media', 'product_multi_media');
                    Product::deleteItem($id);
                }
            }
            return redirect()->route('admin.product');
        }
    }
}

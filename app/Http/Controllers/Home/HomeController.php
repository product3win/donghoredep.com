<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\BaseHomController;
use App\model\Banner;
use App\model\Category;
use App\model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class HomeController extends BaseHomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $header = $this->menu($request);
        \Loader::loadTitle( 'Donghoredep.com');
        $banner = Banner::getAll();
        $totalFocus = 0;
        $totalHost = 0;
        $totalMost = 0;
        $totalCheapest = 0;
        $brand = Category::getAll(['category_parent_id'=>Category::getIdByKeyword(\CGlobal::key_nhan_hieu),'horizontal_menu'=>\CGlobal::status_show]);
        $pdFocus = Product::searchByCondition(['product_focus'=>\CGlobal::status_show,'product_status'=>\CGlobal::status_show],\CGlobal::num_record_per_page_product,0,$totalFocus);
        $pdHost = Product::searchByCondition(['product_host'=>\CGlobal::status_show,'product_status'=>\CGlobal::status_show],\CGlobal::num_record_per_page_product,0,$totalHost);
        $pdMost = Product::searchByCondition(['product_buy_most'=>\CGlobal::status_show,'product_status'=>\CGlobal::status_show],\CGlobal::num_record_per_page_product,0,$totalMost);
        $pdCheapest = Product::searchByCondition(['product_cheapest'=>\CGlobal::status_show,'product_status'=>\CGlobal::status_show],\CGlobal::num_record_per_page_product,0,$totalCheapest);

        return view('home.index',array_merge($header,['banner'=>$banner,'brand'=>$brand,'totalFocus'=>$totalFocus,'pdFocus'=>$pdFocus,'totalHost'=>$totalHost,'pdHost'=>$pdHost,'totalMost'=>$totalMost,'pdMost'=>$pdMost,'totalCheapest'=>$totalCheapest,'pdCheapest'=>$pdCheapest]));
    }
    public function details(Request $request,$name)
    {
        $this->menu($request);
        \Loader::loadTitle( 'Donghoredep.com');
        $banner = Banner::getAll();
        $totalFocus = 0;
        $totalHost = 0;
        $totalMost = 0;
        $totalCheapest = 0;
        $brand = Category::getAll(['category_parent_id'=>Category::getIdByKeyword(\CGlobal::key_nhan_hieu),'horizontal_menu'=>\CGlobal::status_show]);
        $pdFocus = Product::searchByCondition(['product_focus'=>\CGlobal::status_show,'product_status'=>\CGlobal::status_show],\CGlobal::num_record_per_page_product,0,$totalFocus);
        $pdHost = Product::searchByCondition(['product_host'=>\CGlobal::status_show,'product_status'=>\CGlobal::status_show],\CGlobal::num_record_per_page_product,0,$totalHost);
        $pdMost = Product::searchByCondition(['product_buy_most'=>\CGlobal::status_show,'product_status'=>\CGlobal::status_show],\CGlobal::num_record_per_page_product,0,$totalMost);
        $pdCheapest = Product::searchByCondition(['product_cheapest'=>\CGlobal::status_show,'product_status'=>\CGlobal::status_show],\CGlobal::num_record_per_page_product,0,$totalCheapest);
        return view('home.details',['banner'=>$banner,'brand'=>$brand,'totalFocus'=>$totalFocus,'pdFocus'=>$pdFocus,'totalHost'=>$totalHost,'pdHost'=>$pdHost,'totalMost'=>$totalMost,'pdMost'=>$pdMost,'totalCheapest'=>$totalCheapest,'pdCheapest'=>$pdCheapest]);
    }
    public function category(Request $request,$name='',$product=''){
        $this->menu($request);
        return view('home.index');
    }
}

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
    public function details(Request $request)
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
    public function ajaxindexproduct(Request $request){
        $type = $request->type;
        $pageNo = $request->page>0?$request->page:1;
        $limit = \CGlobal::num_record_per_page_product;
        $offset = ($pageNo - 1) * $limit;
        $total = 0;
        $html = '';
        if($type>0){
            $typeProduct = '';
            switch ($type){
                case 1: $typeProduct = 'product_focus'; break;
                case 2:$typeProduct = 'product_host'; break;
                case 3:$typeProduct ='product_buy_most';break;
                case 4:$typeProduct = 'product_cheapest';break;
            }
            $pd = Product::searchByCondition(array($typeProduct=>\CGlobal::status_show,'product_status'=>\CGlobal::status_show),$limit,$offset,$total);
            if(!empty($pd)){
                foreach ($pd as $item){
                    $html = $html.'
                        <div class="col-sm-4 col-md-3 itemproduct">
                            <div class="thumbnail" title="'.$item->product_title.'">
                                <img src="'.\ThumbImg::thumbBaseNormal(Product::FOLDER,$item->product_id,$item->product_media,300,250,'',true,true,true).'" alt="'.$item->product_title.'">
                                <div class="caption" title="'.$item->product_title.'">
                                    <h4 title="'.$item->product_title.'">'.$item->product_title.'</h4>
                                    <h5 title="'.$item->product_title.'">
                                        <div class="gia" title="'.$item->product_title.'">
                                            <span class="ok">'.\Funclip::numberFormat($item->product_price).'đ</span><br>
                                            <span class="notok">'.\Funclip::numberFormat($item->product_price_saleof).'đ</span>
                                        </div>
                                        <a href="'.\route('home.details',['name'=>\Utility::pregReplaceStringAlias($item->product_title)]).'" class="btn btn-default" role="button" title="'.$item->product_title.'">Xem ngay</a>
                                    </h5>
                                </div>
                            </div>
                        </div>';
                }
            }
        }
        echo json_encode($html);
        die;
    }
}

<?php

namespace App\Http\Controllers;


use App\model\Category;
use App\model\StaticInfor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class BaseHomController extends Controller
{
    public function __construct()
    {
    }

    public function menu(Request $request)
    {
        $path = $request->path();
        $arMenu = array();
        $listMenu = Category::getAllMenu();
        if (!empty($listMenu)) {
            foreach ($listMenu as $item) {
                if ($item->horizontal_menu == \CGlobal::status_show && $item->category_status = \CGlobal::status_show) {
                    $vertical_menu = array();
                    foreach ($listMenu as $item2) {
                        if ($item2->vertical_menu == \CGlobal::status_show && $item2->category_parent_id==$item->category_id){
                            $vertical_menu[] = array('title' => $item2->category_title, 'link' => route('home.category', ['name' => $item2->category_keyword]), 'icon' => '', 'active' => $this->checkPath($path, $item2->category_keyword) ? 'active' : '');
                        }
                    }
                    $arMenu[] = array('title' => $item->category_title, 'link' => route('home.category', ['name' => $item->category_keyword]), 'icon' => '', 'active' => $this->checkPath($path, $item->category_keyword) ? 'active' : '','submenu'=>$vertical_menu);
                }
            }
        }
        \Loader::loadMenu($arMenu);
        $hostline  = StaticInfor::getById(StaticInfor::getIdByKeyword(\CGlobal::key_hostline));
        \CGlobal::$txt_hostline = !empty($hostline)?$hostline->static_content:\CGlobal::$txt_hostline;
        $zalo = StaticInfor::getById(StaticInfor::getIdByKeyword(\CGlobal::key_zalo));
        \CGlobal::$txt_zalo = !empty($zalo)?$zalo->static_content:\CGlobal::$txt_zalo;
        $footer_left = StaticInfor::getById(StaticInfor::getIdByKeyword(\CGlobal::key_footer_left));
        \CGlobal::$txt_footer_left = !empty($footer_left)?$footer_left->static_content:\CGlobal::$txt_footer_left;
        $hotroKH = Category::getAll(['category_parent_id'=>Category::getIdByKeyword(\CGlobal::key_ho_tro_khach_hang)]);
        $chinhsachChung = Category::getAll(['category_parent_id'=>Category::getIdByKeyword(\CGlobal::key_chinh_sach_chung)]);
        return ['menu'=>$arMenu,'hostline'=>$hostline->static_content,'zalo'=>$zalo->static_content,'footer_left'=>$footer_left->static_content,'hotroKH'=>$hotroKH,'chinhsachChung'=>$chinhsachChung];
    }

    public function checkPath($path = '', $pathcheck = '')
    {
        $r = false;
        if ($path === $pathcheck || strtolower(substr($path, 0, strlen($pathcheck))) === strtolower($pathcheck)) {
            $r = true;
        }
        return $r;
    }
}

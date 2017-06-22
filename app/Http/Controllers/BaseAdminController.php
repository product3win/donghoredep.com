<?php

namespace App\Http\Controllers;

use App\model\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class BaseAdminController extends Controller
{
    protected $user = array();

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function title($title_name)
    {
        \Loader::loadTitle($title_name);
    }

    public function menu()
    {
        $rName = Route::current()->getName();
        $arMenu = array();
        $arMenu[] = array('title' => 'Đơn hàng', 'link' => route('admin.order'), 'icon' => 'fa-globe fa-admin', 'active' => $this->checkRouteName($rName, 'admin.order') ? 'active' : '');
        $arMenu[] = array('title' => 'Danh mục', 'link' => route('admin.category'), 'icon' => 'fa-th fa-admin', 'active' => $this->checkRouteName($rName, 'admin.category') ? 'active' : '');
        $arMenu[] = array('title' => 'Sản phẩm', 'link' => route('admin.product'), 'icon' => 'fa-bookmark fa-admin', 'active' => $this->checkRouteName($rName, 'admin.product') ? 'active' : '');
        $arMenu[] = array('title' => 'Tin tức', 'link' => route('admin.news'), 'icon' => 'fa-quote-right fa-admin', 'active' => $this->checkRouteName($rName, 'admin.news') ? 'active' : '');
        $arMenu[] = array('title' => 'Banner', 'link' => route('admin.banner'), 'icon' => 'fa-image fa-admin', 'active' => $this->checkRouteName($rName, 'admin.banner') ? 'active' : '');
        $arMenu[] = array('title' => 'Static', 'link' => route('admin.static'), 'icon' => 'fa-image fa-admin', 'active' => $this->checkRouteName($rName, 'admin.static') ? 'active' : '');
        $arMenu[] = array('title' => 'Hệ thống', 'link' => 'javascrip:void(0)', 'icon' => 'fa-angle-down',
            'submenu' => array(
                array('title' => 'Module', 'link' => route('admin.module'), 'icon' => 'fa-gears fa-admin', 'active' => $this->checkRouteName($rName, 'admin.module') ? 'active' : ''),
                array('title' => 'Phân quyển', 'link' => route('admin.role'), 'icon' => 'fa-key fa-admin', 'active' => $this->checkRouteName($rName, 'admin.role') ? 'active' : ''),
                array('title' => 'Người dùng', 'link' => route('admin.user'), 'icon' => 'fa-group fa-admin', 'active' => $this->checkRouteName($rName, 'admin.user') ? 'active' : ''),
                array('title' => 'Thùng rác', 'link' => route('admin.trash'), 'icon' => 'fa-trash fa-admin', 'active' => $this->checkRouteName($rName, 'admin.trash') ? 'active' : ''),
            ));
        \Loader::loadMenu($arMenu);
    }

    public function checkRouteName($routeName = '', $nameCheck = '')
    {
        $r = false;
        if ($routeName === $nameCheck || strtolower(substr($routeName, 0, strlen($nameCheck))) === strtolower($nameCheck)) {
            $r = true;
        }
        return $r;
    }

    public function breadcrumb($listItem)
    {
        \Loader::loadBreadcrumb($listItem);
    }
}

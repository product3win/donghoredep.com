<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('page-404', 'Controller@page404')->name('page-404');

//home
Route::get('ho-tro-khach-hang/{name?}', 'Home\HotroKhachHang@index')->name('hotrokhachhang')->where(['name'=>'[0-9a-zA-z\-]+']);



Route::get('/', 'Home\HomeController@index')->name('index');
Route::get('chi-tiet', 'Home\HomeController@details')->name('details');
Route::get('{name?}.html','Home\HomeController@category')->name('home.category')->where(['name'=>'[0-9a-zA-z\-]+']);
Route::get('dong-ho/{name?}.html','Home\HomeController@details')->name('home.details')->where(['name'=>'[0-9a-zA-z\-]+']);
Route::get('{name?}/{product?}.html','Home\HomeController@details')->name('home.detailsCT')->where(['name'=>'[0-9a-zA-z\-]+','product'=>'[0-9a-zA-z\-]+']);
Route::get('ajax-index-product','Home\HomeController@ajaxindexproduct')->name('home.ajaxindexproduct');

// admin
Auth::routes();

Route::group(array('prefix' => 'admin', 'before' => '','middleware'=>'web'), function(){
    Route::get('/', 'Manager\OrderController@listView')->name('admin.dashboard');
    Route::get('order', 'Manager\OrderController@listView')->name('admin.order');
    Route::get('order/edit', 'Manager\OrderController@getItem')->name('admin.order_edit');
    Route::get('order/edit', 'Manager\OrderController@postItem')->name('admin.order_edit');
    Route::get('order/delete', 'Manager\OrderController@delete')->name('admin.order_delete');
    /// module
    Route::get('module', 'Manager\ModuleController@listView')->name('admin.module');
    Route::get('module/edit/{id?}', 'Manager\ModuleController@getItem')->name('admin.module_edit')->where('id', '[0-9]+');
    Route::post('module/edit/{id?}', 'Manager\ModuleController@postItem')->name('admin.module_edit')->where('id', '[0-9]+');
    Route::match(['GET','POST'],'module/delete',  'Manager\ModuleController@delete')->name('admin.module_delete');
    /// role
    Route::get('role', 'Manager\RoleController@listView')->name('admin.role');
    Route::get('role/edit/{id?}', 'Manager\RoleController@getItem')->name('admin.role_edit')->where('id', '[0-9]+');
    Route::post('role/edit/{id?}', 'Manager\RoleController@postItem')->name('admin.role_edit')->where('id', '[0-9]+');
    Route::match(['GET','POST'],'role/delete',  'Manager\RoleController@delete')->name('admin.role_delete');
    /// user
    Route::get('user', 'Manager\UsersController@listView')->name('admin.user');
    Route::get('user/edit/{id?}', 'Manager\UsersController@getItem')->name('admin.user_edit')->where('id', '[0-9]+');
    Route::post('user/edit/{id?}', 'Manager\UsersController@postItem')->name('admin.user_edit')->where('id', '[0-9]+');
    Route::match(['GET','POST'],'user/delete',  'Manager\UsersController@delete')->name('admin.user_delete');
    Route::get('user/profile', 'Manager\UsersController@profileUser')->name('admin.user_profile');
    Route::post('user/profile', 'Manager\UsersController@postprofileUser')->name('admin.user_profile');
    Route::get('user/changepass', 'Manager\UsersController@changeass')->name('admin.user_changepass');
    Route::post('user/changepass', 'Manager\UsersController@postChangeass')->name('admin.user_changepass');
    /// category
    Route::get('category', 'Manager\CategoryController@listView')->name('admin.category');
    Route::get('category/edit/{id?}', 'Manager\CategoryController@getItem')->name('admin.category_edit')->where('id', '[0-9]+');
    Route::post('category/edit/{id?}', 'Manager\CategoryController@postItem')->name('admin.category_edit')->where('id', '[0-9]+');
    Route::match(['GET','POST'],'category/delete',  'Manager\CategoryController@delete')->name('admin.category_delete');
    /// trash
    Route::get('trash', 'Manager\TrashController@listView')->name('admin.trash');
    Route::get('trash/show/{id?}', 'Manager\TrashController@getItem')->name('admin.trash_showrestore')->where('id', '[0-9]+');
    Route::match(['GET','POST'],'trash/restore', 'Manager\TrashController@restore')->name('admin.trash_restore');
    Route::match(['GET','POST'],'trash/delete',  'Manager\TrashController@delete')->name('admin.trash_delete');
    /// product
    Route::get('product', 'Manager\ProductController@listView')->name('admin.product');
    Route::get('product/edit/{id?}', 'Manager\ProductController@getItem')->name('admin.product_edit')->where('id', '[0-9]+');
    Route::post('product/edit/{id?}', 'Manager\ProductController@postItem')->name('admin.product_edit')->where('id', '[0-9]+');
    Route::match(['GET','POST'],'product/delete',  'Manager\ProductController@delete')->name('admin.product_delete');
    /// news
    Route::get('news', 'Manager\NewsController@listView')->name('admin.news');
    Route::get('news/edit/{id?}', 'Manager\NewsController@getItem')->name('admin.news_edit')->where('id', '[0-9]+');
    Route::post('news/edit/{id?}', 'Manager\NewsController@postItem')->name('admin.news_edit')->where('id', '[0-9]+');
    Route::match(['GET','POST'],'news/delete',  'Manager\NewsController@delete')->name('admin.news_delete');
    
    /// banner
    Route::get('banner', 'Manager\BannerController@listView')->name('admin.banner');
    Route::get('banner/edit/{id?}', 'Manager\BannerController@getItem')->name('admin.banner_edit')->where('id', '[0-9]+');
    Route::post('banner/edit/{id?}', 'Manager\BannerController@postItem')->name('admin.banner_edit')->where('id', '[0-9]+');
    Route::match(['GET','POST'],'banner/delete',  'Manager\BannerController@delete')->name('admin.banner_delete');
    /// static
    Route::get('static', 'Manager\StaticController@listView')->name('admin.static');
    Route::get('static/edit/{id?}', 'Manager\StaticController@getItem')->name('admin.static_edit')->where('id', '[0-9]+');
    Route::post('static/edit/{id?}', 'Manager\StaticController@postItem')->name('admin.static_edit')->where('id', '[0-9]+');
    Route::match(['GET','POST'],'static/delete',  'Manager\StaticController@delete')->name('admin.static_delete');
    /// order
    Route::get('static', 'Manager\StaticController@listView')->name('admin.static');
    Route::get('static/edit/{id?}', 'Manager\StaticController@getItem')->name('admin.static_edit')->where('id', '[0-9]+');
    Route::post('static/edit/{id?}', 'Manager\StaticController@postItem')->name('admin.static_edit')->where('id', '[0-9]+');
    Route::match(['GET','POST'],'static/delete',  'Manager\StaticController@delete')->name('admin.static_delete');

});
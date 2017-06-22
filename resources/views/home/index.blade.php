<?php
/**
 * Created by PhpStorm.
 * User: Bui
 * Date: 15/06/2017
 * Time: 11:18 SA
 */
?>
@extends('layouts.app')
@section('menu')
    @include('layouts.header')
    @endsection
@section('content')
    <div class="container index">
        <div class="col-md-12 index-rows-1">
            <div class="col-md-6 col-sm-6 col-larges">
                <a href="">
                    <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                </a>
            </div>
            <div class="col-md-6 col-sm-6 col-small">
                <div class="col-md-6 col-sm-6 col-xs-6 col-small-1">
                    <a href="">
                        <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                    </a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 col-small-2">
                    <div class="col-md-12 col-sm-12 box-1">
                        <a href="">
                            <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                        </a>
                    </div>
                    <div class="col-md-12 col-sm-12 box-2">
                        <a href="">
                            <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 index-rows-2">
            <h4 class="title-para">chúng tôi có gì khác biệt để bạn lựa chọn</h4>
            <ul>
                <li>
                    <img src="{{asset('resources/assets/media/A1.png')}}">
                    <div>
                        Rẻ nhất thị trường càng mua càng rẻ
                    </div>
                </li>
                <li>
                    <img src="{{asset('resources/assets/media/A2.png')}}">
                    <div>
                        Quà tặng nhiều nhất thị trường
                    </div>
                </li>
                <li>
                    <img src="{{asset('resources/assets/media/A3.png')}}">
                    <div>
                        Giao tận tay trên toàn quốc
                    </div>
                </li>
                <li>
                    <img src="{{asset('resources/assets/media/A4.png')}}">
                    <div>
                        Giao hàng nhanh nhất
                    </div>
                </li>
                <li>
                    <img src="{{asset('resources/assets/media/A5.png')}}">
                    <div>
                        Luôn được kiểm tra hàng trước khi trả tiền
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-12 index-rows-3">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#listprduct1" aria-controls="home" role="tab"
                                                          data-toggle="tab">Rẻ nhất</a></li>
                <li role="presentation"><a href="#listprduct2" aria-controls="profile" role="tab" data-toggle="tab">Quà
                        tặng </a></li>
                <li role="presentation"><a href="#listprduct3" aria-controls="messages" role="tab" data-toggle="tab">Nhiều
                        nhất</a></li>
                <li role="presentation"><a href="#listprduct4" aria-controls="settings" role="tab" data-toggle="tab">Mới
                        Nhất</a></li>
                <li role="presentation"><a href="#listprduct5" aria-controls="messages" role="tab" data-toggle="tab">Mua
                        nhiều nhất</a></li>
                <li role="presentation"><a href="#listprduct6" aria-controls="settings" role="tab" data-toggle="tab">Tốt
                        nhất</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="listprduct1">
                    <ul>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                    </ul>
                    {{--<h3><a class="btn btn-primary">còn nữa xem thêm</a></h3>--}}
                </div>
                <div role="tabpanel" class="tab-pane  fade in " id="listprduct2">
                    <h4>list product 2</h4>
                </div>
                <div role="tabpanel" class="tab-pane fade in " id="listprduct3">
                    <h4>list product 3</h4>
                </div>
                <div role="tabpanel" class="tab-pane fade in " id="listprduct4">
                    <h4>list product 4</h4>
                </div>
                <div role="tabpanel" class="tab-pane fade in " id="listprduct5">
                    <h4>list product 5</h4>
                </div>
                <div role="tabpanel" class="tab-pane fade in " id="listprduct6">
                    <h4>list product 6</h4>
                </div>
            </div>
        </div>
        <div class="col-md-12 index-rows-4">
            <div class="title-row border-green1">
                <div class="title-rows-left">
                    <img class="green1" src="{{asset('resources/assets/media/C8.png')}}">
                    <div class="inner-title">
                        <b>Đồng hồ cặp</b>
                        <span>Chắp cánh cho tình yêu lứa đôi</span>
                    </div>
                </div>
                <a class="btn green1 btn-show-all">Xem tất cả</a>
            </div>
            <div class="product">
                <div class="col-large">
                    <a href="">
                        <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                    </a>
                </div>
                <div class="col-item">
                    <ul>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 index-rows-4">
            <div class="title-row border-yealow1">
                <div class="title-rows-left">
                    <img class="yealow1" src="{{asset('resources/assets/media/C8.png')}}">
                    <div class="inner-title">
                        <b>Đồng hồ nam</b>
                        <span>Thể hiện đẳng cấp của phái mạnh</span>
                    </div>
                </div>
                <a class="btn yealow1 btn-show-all">Xem tất cả</a>
            </div>
            <div class="product">
                <div class="col-item col-item-left">
                    <ul>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-large col-large-right">
                    <a href="">
                        <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12 index-rows-5">
            <h4 class="title-para2">Phản hồi khách hàng</h4>
			<ul>
				<li >
					<a href="javascript:viod(0)">
						<img src="{{asset('resources/assets/media/icon-comment-3.jpg')}}">
						<h4>khách hàng 1</h4>
						<div>nhận xét của khách hàng 1 nhận xét của khách hàng 1 nhận xét của khách hàng 1 nhận xét của khách hàng 1 nhận xét của khách hàng 1 nhận xét của khách hàng 1</div>
					</a>
				</li>
				<li >
					<a href="javascript:viod(0)">
						<img src="{{asset('resources/assets/media/icon-comment-2.png')}}">
						<h4>khách hàng 1</h4>
						<div>nhận xét của khách hàng 1 nhận xét của khách hàng 1 nhận xét của khách hàng 1 nhận xét của khách hàng 1 nhận xét của khách hàng 1 nhận xét của khách hàng 1</div>
					</a>
				</li>
				<li >
					<a href="javascript:viod(0)">
						<img src="{{asset('resources/assets/media/icon-comment-1.png')}}">
						<h4>khách hàng 1</h4>
						<div>nhận xét của khách hàng 1 nhận xét của khách hàng 1 nhận xét của khách hàng 1 nhận xét của khách hàng 1 nhận xét của khách hàng 1 nhận xét của khách hàng 1</div>
					</a>
				</li>
			</ul>
        </div>
        <div class="col-md-12 index-rows-4">
            <div class="title-row border-pink1">
                <div class="title-rows-left">
                    <img class="pink1" src="{{asset('resources/assets/media/C8.png')}}">
                    <div class="inner-title">
                        <b>Đồng hồ nữ</b>
                        <span>Tôn vinh vẻ đẹp người phụ nữ</span>
                    </div>
                </div>
                <a class="btn pink1 btn-show-all">Xem tất cả</a>
            </div>
            <div class="product">
                <div class="col-large">
                    <a href="">
                        <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                    </a>
                </div>
                <div class="col-item">
                    <ul>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 index-rows-4">
            <div class="title-row border-green1">
                <div class="title-rows-left">
                    <img class="green1" src="{{asset('resources/assets/media/C8.png')}}">
                    <div class="inner-title">
                        <b>Đồng hồ đẹp</b>
                        <span>Cho cuộc sống tươi đẹp</span>
                    </div>
                </div>
                <a class="btn green1 btn-show-all">Xem tất cả</a>
            </div>
            <div class="product">
                <div class="col-item col-item-left">
                    <ul>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                                <h5 class="title">Tên sản phẩm Tên sản phẩm Tên sản phẩm</h5>
                                <h5 class="vote"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h5>
                                <h5 class="price">99.000đ</h5>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-large col-large-right">
                    <a href="">
                        <img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}">
                    </a>
                </div>
            </div>
        </div>
    </div>
	<div class="index">
	<div class="index-brand-partner">
		<div class="container">
		<ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#lislogoBrand" aria-controls="home" role="tab"
                                                          data-toggle="tab">Logo thương hiệu đồng hồ</a></li>
                <li role="presentation"><a href="#lislogoPartner" aria-controls="profile" role="tab" data-toggle="tab">ĐỐi tác</a></li>
            </ul>
			<div class="tab-content">
			<div role="tabpanel" class="tab-pane  fade in active" id="lislogoBrand">
				<ul>
					<li><a href=""><img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}"/></a></li>
					<li><a href=""><img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}"/></a></li>
					<li><a href=""><img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}"/></a></li>
					<li><a href=""><img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}"/></a></li>
					<li><a href=""><img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}"/></a></li>
					<li><a href=""><img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}"/></a></li>
					<li><a href=""><img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}"/></a></li>
					<li><a href=""><img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}"/></a></li>
					<li><a href=""><img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}"/></a></li>
					<li><a href=""><img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}"/></a></li>
					<li><a href=""><img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}"/></a></li>
					<li><a href=""><img src="{{asset('resources/assets/media/3129039169_185513348.jpg')}}"/></a></li>
				</ul>
                </div>
                <div role="tabpanel" class="tab-pane fade in " id="lislogoPartner">
                    <h4>list logo partner 3</h4>
                </div>
		</div>
		</div>
		</div>
	</div>
@endsection
@section('footer')
    @include('layouts.footer')
    @endsection
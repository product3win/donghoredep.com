<?php
/**
 * Created by PhpStorm.
 * User: Bui
 * Date: 19/06/2017
 * Time: 1:01 SA
 */
?>
<section class="maps">
	<div class="container">
		<h3>Hệ thống chi nhánh và đại lý</h2>
		<ul class="nav nav-pills" role="tablist">
                <li role="presentation" class="active"><a href="#Maps1" aria-controls="home" role="tab"
                                                          data-toggle="tab">Hà nội</a></li>
                <li role="presentation"><a href="#Maps2" aria-controls="profile" role="tab" data-toggle="tab">Hồ chí minh</a></li>
            </ul>
			<div class="tab-content">
			<div role="tabpanel" class="tab-pane  fade in active" id="Maps1">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7449.059209553717!2d105.83816639999999!3d21.01148500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1497867557402" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div role="tabpanel" class="tab-pane fade in " id="Maps2">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7449.059209553717!2d105.83816639999999!3d21.01148500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1497867557402" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
		</div>
	</div>
</section>
<section class="footer-1">
    <div class="col-md-offset-4 col-md-4 col-sm-offset-2 col-sm-8  box-like-facebook">
        <img src="{{asset('resources/assets/media/box-loke-fb.png')}}" style="width: 100%;height: 100%;">
    </div>
</section>
<section class="footer-2">
    <div class="container">
        <div class="col-md-6 col-sm-4 col-xs-12">
            {!! $footer_left !!}
        </div>
        <div class="col-md-3 col-sm-4">
            <h4 class="title-footer">Hỗ trợ khách hàng</h4>
            <ul>
                @foreach($hotroKH as $item)
                    <li>
                        <a href="{{route('hotrokhachhang',['name'=>$item->category_keyword])}}"
                           title="{{$item->category_title}}">{{$item->category_title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-3 col-sm-4">
            <h4  class="title-footer">Chính sách chung</h4>
            <ul>
                @foreach($chinhsachChung as $item)
                    <li>
                        <a href="{{route('hotrokhachhang',['name'=>$item->category_keyword])}}"
                           title="{{$item->category_title}}">{{$item->category_title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
<section class="footer-3">
    <div class="container">
        <div class="col-md-4 col-sm-5 contact-left">
            Copyright © {{date('Y',time())}} by Đồng Hồ Rẻ Đẹp
        </div>
        <div class="col-md-4 col-sm-3 list-contact">
            <div class="item it-facebook"><a href="#"><i class="fa fa-facebook"></i></a></div>
            <div class="item it-google"><a href="#"><i class="fa fa-google-plus"></i></a></div>
            <div class="item it-youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></div>
        </div>
        <div class="col-md-4 col-sm-4 contact-right">
                <b>Tổng: </b><span id="count-visiting">999999</span>
                <b>Online: </b><span>99</span>
        </div>
    </div>
</section>

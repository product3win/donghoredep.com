<?php
/**
 * Created by PhpStorm.
 * User: Bui
 * Date: 01/06/2017
 * Time: 16:57 CH
 */
?>
@extends('layouts.app')
@section('content')
    <div class="error404">
        <h1>!</h1>
        <h2>Không tìm thấy nội dung bạn yêu cầu</h2>
        <hr>
        <div id="option">
            <a href="" id="goback" title="quay lại"><i class="fa fa-refresh fa-3x"></i></a>
            <a href="{{config('app.url')}}" title="về trang trủ" ><i class="fa fa-home fa-3x"></i></a>
            <a href="#" ><i class="fa fa-envelope-o fa-3x" title="góp ý với quản trị viện"></i></a></li>
        </div>

    </div>
@endsection





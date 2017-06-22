@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            Product3win {{isset($name)?$name:''}}
        </div>
        <div class="links">
            <a href="https://laravel.com/docs">Doc laravel</a>
            <a href="https://laracasts.com">Doc laracsts</a>
            <a href="https://laravel-news.com">Tin tức laravel</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://github.com/laravel/laravel">Tài nguyên laravel</a>
        </div>
    </div>
@endsection
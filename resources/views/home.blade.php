@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    Bạn đã login thành công {{isset($name)?$name:''}}
                    <ul>@foreach($data as $k=>$item)
                            <li>{{$k.'---'}}</li>
                            @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

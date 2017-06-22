<?php
/**
 * Created by PhpStorm.
 * User: Bui
 * Date: 05/06/2017
 * Time: 10:00 SA
 */
?>
@extends('layouts.admin')
@section('content')
    <form action="" class="form-horizontal frmAdd" method="POST" id="frmAdd" name="frmAdd"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group{{isset($errors)&& $errors->has('product_cate_id') ? ' has-error' : '' }}">
            <label for="product_cate_id" class="col-md-2 col-sm-3 control-label">Danh mục sản phẩn</label>
            <div class="col-md-6 col-sm-9">
                <select class="form-control" name="product_cate_id">
                    {!! $optionCate !!}
                </select>
                @if (isset($errors)&&$errors->has('product_cate_id'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('product_cate_id') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{isset($errors)&& $errors->has('product_brand_id') ? ' has-error' : '' }}">
            <label for="product_cate_id" class="col-md-2 col-sm-3 control-label">Nhãn hiệu sản phẩn</label>
            <div class="col-md-6 col-sm-9">
                <select class="form-control" name="product_brand_id">
                    {!! $optionBrand !!}
                </select>
                @if (isset($errors)&&$errors->has('product_brand_id'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('product_brand_id') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{isset($errors)&& $errors->has('product_code') ? ' has-error' : '' }}">
            <label for="category_title" class="col-md-2 col-sm-3 control-label">Mã sản phẩm</label>
            <div class="col-md-6 col-sm-9">
                <input id="product_code" type="text" class="form-control" name="product_code"
                       value="{{isset($data['product_code'])?$data['product_code']: old('product_code') }}" required
                       autofocus>
                @if (isset($errors)&&$errors->has('product_code'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('product_code') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
        <div class="form-group ">
            <label for="product_code_replace" class="col-md-2 col-sm-3 control-label">Mã thay thế <i
                        class="fa fa-plus green fa-admin" id="themMa" title="thêm mã"></i></label>
            <div class="col-md-6 col-sm-9">
                <?php
                $arma = isset($data['product_code_replace']) && $data['product_code_replace'] != '' ? unserialize($data['product_code_replace']) : array();
                ?>
                <ul id="listMa">
                    @if(!empty($arma))
                        @foreach($arma as $v)
                            <li class="col-md-6 col-sm-6">
                                <input class="form-control " type="text" name="product_code_replace[]" value="{{$v}}"><i
                                        class="fa fa-remove fa-admin red" id="xoa-ma"></i>
                            </li>
                        @endforeach
                    @else
                        <li class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" name="product_code_replace[]" value="">
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="form-group{{isset($errors)&& $errors->has('product_title') ? ' has-error' : '' }}">
            <label for="product_title" class="col-md-2 col-sm-3 control-label">Tiêu đề</label>
            <div class="col-md-6 col-sm-9">
                <input id="product_title" type="text" class="form-control" name="product_title"
                       value="{{isset($data['product_title'])?$data['product_title']: old('product_title') }}"
                       required
                       autofocus>
                @if (isset($errors)&&$errors->has('product_title'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('product_title') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
        <div class="form-group ">
            <label for="product_price_input" class="col-md-2 col-sm-3 control-label">Giá nhập</label>
            <div class="col-md-6 col-sm-9">
                <input id="product_price_input" type="number" class="form-control" name="product_price_input"
                       value="{{isset($data['product_price_input'])?$data['product_price_input']: old('product_price_input') }}"
                       autofocus>
            </div>
        </div>
        <div class="form-group{{isset($errors)&& $errors->has('product_price') ? ' has-error' : '' }}">
            <label for="product_price" class="col-md-2 col-sm-3 control-label">Giá bán</label>
            <div class="col-md-6 col-sm-9">
                <input id="product_price" type="number" class="form-control" name="product_price"
                       value="{{isset($data['product_price'])?$data['product_price']: old('product_price') }}" required
                       autofocus>
                @if (isset($errors)&&$errors->has('product_price'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('product_price') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
        <div class="form-group ">
            <label for="product_price_saleof" class="col-md-2 col-sm-3 control-label">Giảm giá</label>
            <div class="col-md-6 col-sm-9">
                <input id="product_price_saleof" type="number" class="form-control" name="product_price_saleof"
                       value="{{isset($data['product_price_saleof'])?$data['product_price_saleof']: old('product_price_saleof') }}"
                       autofocus>
            </div>
        </div>
        <div class="form-group ">
            <label for="product_price_multi" class="col-md-2 col-sm-3 control-label">Giá khác <i
                        class="fa fa-plus green fa-admin" id="themGIa" title="thêm bộ giá"></i></label>
            <div class="col-md-6 col-sm-9">
                <ul id="listGia">
                    <?php
                    $argia = isset($data['product_price_multi']) && $data['product_price_multi'] != '' ? unserialize($data['product_price_multi']) : array();
                    ?>
                    @if(!empty($argia))
                        @foreach($argia as $k=>$v)
                            <li>
                                Giá mua : <input class="form-control level-price" type="number" name="level[]" min="1"
                                                 value="{{$k}}" autofocus> :
                                <input class="form-control price" type="number" name="price[]" min="0" value="{{$v}}"
                                       autofocus>
                            </li>
                        @endforeach
                    @else
                        <li>
                            Giá mua : <input class="form-control level-price" type="number" name="level[]" min="1"
                                             value="1" autofocus> :
                            <input class="form-control price" type="number" name="price[]" min="0" autofocus>
                        </li>
                        <li>
                            Giá mua : <input class="form-control level-price" type="number" name="level[]" min="1"
                                             value="2" autofocus> :
                            <input class="form-control price" type="number" name="price[]" min="0" autofocus>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="form-group">
            <label for="product_media" class="col-md-2 col-sm-3 control-label">Hình ảnh</label>
            <div class="col-md-6 col-sm-9">
                <label class="btn btn-primary" for="product_media">Upload hình ảnh</label> <i id="fileName"></i>
                <input type="file" class="" accept="image/jpg,image/jpeg,image/png" name="product_media"
                       id="product_media" value="" style="display: none">
                <br>
                <div class="col-md-12" id="privewIMG"
                     @if(isset($data['product_media'])&&$data['product_media']!='') rel="1" @else  rel="0" @endif>
                    @if(isset($data['product_media'])&&$data['product_media']!='')
                        <i class="fa fa-remove red" id="xoa-media" title="xóa"></i>
                        <img src="{{ThumbImg::thumbBaseNormal(\App\model\Product::FOLDER,$id,$data['product_media'],400,400,'',true,true,true)}}"
                             width="100%"/>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group{{isset($errors)&& $errors->has('product_video') ? ' has-error' : '' }}">
            <label for="product_video" class="col-md-2 col-sm-3 control-label">Link video</label>
            <div class="col-md-6 col-sm-9">
                <input id="product_video" type="text" class="form-control" name="product_video"
                       value="{{isset($data['product_video'])?$data['product_video']: old('product_video') }}"autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="product_multi_media" class="col-md-2 col-sm-3 control-label">Album ảnh</label>
            <div class="col-md-10 col-sm-9">
                <label class="btn btn-primary" for="product_multi_media">Upload album ảnh</label> <i id="totalList"></i>
                <input type="file" class="" accept="image/jpg,image/jpeg,image/png" multiple name="product_multi_media[]"
                       id="product_multi_media" value="" style="display: none">
                <br>
                <div class="col-md-12" id="showIMG"
                     @if(isset($data['product_multi_media'])&&$data['product_multi_media']!='') rel="1"
                     @else  rel="0" @endif>
                    <ul id="showListIMG">
                        @if(isset($data['product_multi_media'])&&$data['product_multi_media']!='')
                            <?php
                            $ar = isset($data['product_multi_media']) && $data['product_multi_media'] != '' ? unserialize($data['product_multi_media']) : array();
                            ?>
                            @foreach($ar as $k=>$v)
                                <li class="col-md-3 col-sm-4" rel="{{$k}}">
                                    <i class="fa fa-remove red" id="xoa-multi-media" title="xóa" rel="{{$k}}"></i>
                                    <img src="{{ThumbImg::thumbBaseNormal(\App\model\Product::FOLDER,$id,$v,400,400,'',true,true,true)}}"
                                         style=""/>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 btn-option">
                <input type="hidden" id="id_hidden" name="id_hidden" value="{{$id}}"/>
                <input type="hidden" id="remove_media" name="remove_media" value="0"/>
                <input type="hidden" id="remove_multi_media" name="remove_multi_media[]" value="-1"/>
                <button type="submit" name="txtSubmit" id="buttonSubmit" class="btn btn-primary">Lưu lại</button>
                <button type="reset" class="btn" id="goback">Bỏ qua</button>
            </div>
        </div>
    </form>
@endsection

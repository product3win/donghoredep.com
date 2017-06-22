<?php
/**
 * Created by PhpStorm.
 * User: Bui
 * Date: 05/06/2017
 * Time: 10:00 SA
 */
?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <form name="frmSearch" class="frmSearch" id="frmSearch" method="GET">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3">
                    <label class="control-label">Mã sản phẩm</label>
                    <div>
                        <input type="text" class="form-control input-sm" name="product_code"
                               <?php if(isset($search['product_code']) && $search['product_code'] !=''): ?>value="<?php echo e($search['product_code']); ?>"<?php endif; ?>>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3">
                    <label class="control-label">Danh mục sản phẩm</label>
                    <div>
                        <select name="product_cate_id" class="form-control input-sm">
                            <?php echo $optionCate; ?>

                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3">
                    <label class="control-label">Trạng thái</label>
                    <div>
                        <select name="product_status" class="form-control input-sm">
                            <?php echo $optionStatus; ?>

                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3">
                    <label class="control-label">Nhãn hiệu</label>
                    <div>
                        <select name="product_brand_id" class="form-control input-sm">
                            <?php echo $optionBrand; ?>

                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3">
                    <label class="control-label"></label>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="product_cheapest" value="1"
                                   <?php if(isset($search['product_cheapest'])&&$search['product_cheapest']==1): ?> checked <?php endif; ?> />
                            Rẻ nhất
                        </label>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3">
                    <label class="control-label"></label>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="product_gif" value="1"
                                   <?php if(isset($search['product_gif'])&&$search['product_gif']==1): ?> checked <?php endif; ?> />
                            Quà tặng
                        </label>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3">
                    <label class="control-label"></label>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="product_most" value="1"
                                   <?php if(isset($search['product_most'])&&$search['product_most']==1): ?> checked <?php endif; ?> />
                            Nhiều nhất
                        </label>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3">
                    <label class="control-label"></label>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="product_news" value="1"
                                   <?php if(isset($search['product_news'])&&$search['product_news']==1): ?> checked <?php endif; ?> />
                            Mới nhất
                        </label>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3">
                    <label class="control-label"></label>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="product_buy_most" value="1"
                                   <?php if(isset($search['product_buy_most'])&&$search['product_buy_most']==1): ?> checked <?php endif; ?> />
                            Mua nhiều nhất
                        </label>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3">
                    <label class="control-label"></label>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="product_best" value="1"
                                   <?php if(isset($search['product_best'])&&$search['product_best']==1): ?> checked <?php endif; ?> />
                            Tốt nhất
                        </label>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1">
                    <div>
                        <button class="btn" name="submit" value="s" title="tìm kiếm"><i
                                    class="fa fa-search fa-2x"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row menu-option">
        <div class="col-lg-6 col-md-6 col-sm-6"><h5>Quản lý: Sản phẩm [tổng số: <?php echo e($total); ?>]</h5></div>
        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: right">
            <a href="<?php echo e(route('admin.product_edit')); ?>"> <i class="fa fa-plus" title="thêm mới"></i> </a>
            <a href="javascript:void(0)"> <i class="fa fa-trash" id="deleteMoreItem" title="xóa item"></i> </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form action="<?php echo e(route('admin.product_delete')); ?>" id="formListItem" name="formListItem" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="table-responsive ">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th width="1%">STT</th>
                            <th width="1%"><input id="checkAll" type="checkbox"></th>
                            <th width="10%">Mã</th>
                            <th width="20%">Tiêu đề</th>
                            <th width="15%">Danh mục</th>
                            <th width="15%">Nhãn hiệu</th>
                            <th width="10%">Giá bán</th>
                            <th width="10">Thứ tự</th>
                            <th width="10">Ngày tạo</th>
                            <th width="1%"><i class="fa fa-circle fa-admin"></i></th>
                            <th width="1%"><i class="fa fa-edit fa-admin"></i></th>
                        </tr>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($k+1); ?></td>
                                <td><input class="checkItem" name="checkItem[]" type="checkbox"
                                           value="<?php echo e($item->product_id); ?>"></td>
                                <td><?php echo e($item->product_code); ?></td>
                                <td><?php if($item->product_media!=''): ?> <a href="javascript:void(0)" title="<?php echo e($item->product_title); ?>" rel="<?php echo e(ThumbImg::thumbBaseNormal(\App\model\Product::FOLDER,$item->product_id,$item->product_media,800,600,'',true,true,true)); ?>" id="showIMG"> <?php echo e($item->product_title); ?> </a><?php else: ?> <?php echo e($item->product_title); ?> <?php endif; ?></td>
                                <td>
                                    <?php $__currentLoopData = $arCate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->product_cate_id==$k): ?>
                                            <?php echo e($v); ?>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <?php $__currentLoopData = $arBrand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->product_brand_id==$k): ?>
                                            <?php echo e($v); ?>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td><?php echo e(Funclip::numberFormat($item->product_price)); ?>đ</td>
                                <td><?php echo e($item->product_order_no); ?></td>
                                <td><?php echo e(date('d/m/Y',$item->product_created)); ?></td>
                                <td><?php if($item->product_status == CGlobal::status_show): ?>
                                        <i class="fa fa-circle fa-admin green"></i>
                                    <?php else: ?>
                                        <i class="fa fa-circle fa-admin red"></i>
                                    <?php endif; ?>
                                </td>
                                <td><a href="<?php echo e(route('admin.product_edit',['id'=>$item->product_id])); ?>"><i
                                                class="fa fa-edit fa-admin"></i></a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </form>
        </div>
        <?php if(isset($total)&&$total>0): ?>
            <div class="" style="text-align: center;padding: 0px 15px">
                <?php if(isset($paging)): ?>
                    <?php echo $paging; ?>

                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                    <label class="control-label">Từ khóa</label>
                    <div>
                        <input type="text" class="form-control input-sm" name="order_name"
                               <?php if(isset($search['order_name']) && $search['order_name'] !=''): ?>value="<?php echo e($search['order_name']); ?>"<?php endif; ?>>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3">
                    <label class="control-label">Trạng thái</label>
                    <div>
                        <select name="order_status" class="form-control input-sm">
                            <?php echo $optionStatus; ?>

                        </select>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1">
                    <div>
                        <button class="btn" name="submit" value="s" title="tìm kiếm"><i class="fa fa-search fa-2x"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row menu-option">
        <div class="col-lg-6 col-md-6 col-sm-6"><h5>Quản lý: Đơn hàng [tổng số: <?php echo e($total); ?>]</h5></div>
        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: right">
            
            <a href="javascript:void(0)"> <i class="fa fa-trash" id="deleteMoreItem" title="xóa item"></i> </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form action="<?php echo e(route('admin.order_delete')); ?>" id="formListItem" name="formListItem" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="table-responsive ">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th width="1%">STT</th>
                            <th width="1%"><input id="checkAll" type="checkbox"></th>
                            <th width="10%">Tên khách hàng</th>
                            <th width="7%">Số điện thoại</th>
                            <th width="10%">Địa chỉ</th>
                            <th width="10%">Sản phẩm</th>
                            <th width="7%">Tạm tính</th>
                            <th width="8%">Nguồn đơn</th>
                            <th width="6%">Ngày tạo</th>
                            <th width="1%"><i class="fa fa-circle fa-admin"></i></th>
                            <th width="2%">Action</th>
                        </tr>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $arPD = $item->product_infor != '' ? unserialize($item->product_infor) : array();
                            ?>
                            <tr>
                                <td><?php echo e($k+1); ?></td>
                                <td><input class="checkItem" name="checkItem[]" type="checkbox"
                                           value="<?php echo e($item->order_id); ?>"></td>
                                <td><?php echo e($item->order_name); ?></td>
                                <td><?php echo e($item->order_phone); ?></td>
                                <td><?php echo e($item->order_address); ?></td>
                                <td>
                                    <?php if(!empty($arPD)): ?>
                                        <ul>
                                            <?php $__currentLoopData = $arPD; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a><?php echo e($pd['product_code']); ?></a>[<?php echo e($pd['product_number']); ?>][<?php echo e($pd['product_price']); ?>]
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($item->order_total); ?></td>
                                <td><?php echo e($item->order_srouces); ?></td>
                                <td><?php if($item->order_status == CGlobal::status_show): ?>
                                        <i class="fa fa-circle fa-admin green"></i>
                                    <?php else: ?>
                                        <i class="fa fa-circle fa-admin red"></i>
                                    <?php endif; ?>
                                </td>
                                <td><a href="<?php echo e(route('admin.order_edit',['id'=>$item->order_id])); ?>"><i
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
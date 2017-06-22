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
                        <input type="text" class="form-control input-sm" name="trash_title"
                               <?php if(isset($search['trash_title']) && $search['trash_title'] !=''): ?>value="<?php echo e($search['trash_title']); ?>"<?php endif; ?>>
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
        <div class="col-lg-6 col-md-6 col-sm-6"><h5>Quản lý: Thùng rác [tổng số: <?php echo e($total); ?>]</h5></div>
        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: right">
            <a href="javascript:void(0)"> <i class="fa fa-mail-reply" id="restoreMoreItem" title="Khôi phục "></i> </a>
            <a href="javascript:void(0)"> <i class="fa fa-trash" id="deleteMoreItem" title="xóa item"></i> </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form action="<?php echo e(route('admin.trash_delete')); ?>" id="formListItem" name="formListItem" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="table-responsive ">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th width="1%">STT</th>
                            <th width="1%"><input id="checkAll" type="checkbox"></th>
                            <th width="20%">Tiêu đề</th>
                            <th width="5">Id</th>
                            <th width="10%">Lớp</th>
                            <th width="10%">Thư mục</th>
                            <th width="10%">Ngày xóa</th>
                            <th width="1%"><i class="fa fa-edit fa-admin"></i></th>
                        </tr>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($k+1); ?></td>
                                <td><input class="checkItem" name="checkItem[]"  type="checkbox" value="<?php echo e($item->trash_id); ?>"> </td>
                                <td><?php echo e($item->trash_title); ?></td>
                                <td><?php echo e($item->trash_obj_id); ?></td>
                                <td><?php echo e($item->trash_class); ?></td>
                                <td><?php echo e($item->trash_folder_media); ?></td>
                                <td><?php echo e(date('d/m/Y',$item->trash_created)); ?></td>
                                <td><a href="<?php echo e(route('admin.trash_showrestore',['id'=>$item->trash_id])); ?>"><i
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
<?php
/**
 * Created by PhpStorm.
 * User: Bui
 * Date: 05/06/2017
 * Time: 10:00 SA
 */
?>

<?php $__env->startSection('content'); ?>
    <form action="" class="form-horizontal frmAdd" method="POST" id="frmAdd" name="frmAdd" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="form-group<?php echo e(isset($errors)&& $errors->has('category_parent_id') ? ' has-error' : ''); ?>">
            <label for="category_parent_id" class="col-md-2 col-sm-3 control-label">Danh mục cha</label>
            <div class="col-md-6 col-sm-9">
                <select class="form-control" name="category_parent_id">
                    <?php echo $optionParent; ?>

                </select>
                <?php if(isset($errors)&&$errors->has('category_parent_id')): ?>
                    <span class="help-block">
                                        <strong><?php echo e($errors->first('category_parent_id')); ?></strong>
                                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group<?php echo e(isset($errors)&& $errors->has('category_title') ? ' has-error' : ''); ?>">
            <label for="category_title" class="col-md-2 col-sm-3 control-label">Tiêu đề</label>
            <div class="col-md-6 col-sm-9">
                <input id="category_title" type="text" class="form-control" name="category_title"
                       value="<?php echo e(isset($data['category_title'])?$data['category_title']: old('category_title')); ?>" required
                       autofocus>
                <?php if(isset($errors)&&$errors->has('category_title')): ?>
                    <span class="help-block">
                                        <strong><?php echo e($errors->first('category_title')); ?></strong>
                                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group ">
            <label for="category_keyword" class="col-md-2 col-sm-3 control-label">Từ khóa</label>
            <div class="col-md-6 col-sm-9">
                <input id="category_keyword" type="text" class="form-control" name="category_keyword"
                       value="<?php echo e(isset($data['category_keyword'])?$data['category_keyword']: old('category_keyword')); ?>"
                       autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="category_media" class="col-md-2 col-sm-3 control-label">Hình ảnh danh mục</label>
            <div class="col-md-6 col-sm-9">
                <label class="btn btn-primary" for="category_media">Upload hình ảnh</label>  <i id="fileName"></i>
                <input type="file" class="" accept="image/jpg,image/jpeg,image/png" name="category_media" id="category_media" value="" style="display: none">
                <br>
                <div class="col-md-12" id="privewIMG" <?php if(isset($data['category_media'])&&$data['category_media']!=''): ?> rel="1" <?php else: ?>  rel="0"  <?php endif; ?>>
                    <?php if(isset($data['category_media'])&&$data['category_media']!=''): ?>
                        <i class="fa fa-remove red" id="xoa-media" title="xóa"></i>
                        <img src="<?php echo e(ThumbImg::thumbBaseNormal(\App\model\Category::FOLDER,$id,$data['category_media'],400,400,'',true,true,true)); ?>" width="100%"/>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="category_media_banner" class="col-md-2 col-sm-3 control-label">Hình ảnh banner rộng</label>
            <div class="col-md-10 col-sm-9">
                <label class="btn btn-primary" for="category_media_banner">Upload hình ảnh</label>  <i id="fileNameBanner"></i>
                <input type="file" class="" accept="image/jpg,image/jpeg,image/png" name="category_media_banner" id="category_media_banner" value="" style="display: none">
                <br>
                <div class="col-md-12" id="privewIMGBanner" <?php if(isset($data['category_media_banner'])&&$data['category_media_banner']!=''): ?> rel="1" <?php else: ?>  rel="0"  <?php endif; ?> data="category_media_banner">
                    <?php if(isset($data['category_media_banner'])&&$data['category_media_banner']!=''): ?>
                        <i class="fa fa-remove red" id="xoa-media-banner" title="xóa"></i>
                        <img src="<?php echo e(ThumbImg::thumbBaseNormal(\App\model\Category::FOLDER,$id,$data['category_media_banner'],400,800,'',true,true,true)); ?>" width="100%"/>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="category_intro" class="col-md-2 col-sm-3 control-label">Mô tả</label>
            <div class="col-md-10 col-sm-9">
                <textarea id="category_intro" class="form-control" name="category_intro" rows="3" autofocus><?php echo e(isset($data['category_intro'])?$data['category_intro']:old('category_intro')); ?></textarea>
            </div>
        </div>
        <div class="form-group<?php echo e(isset($errors)&& $errors->has('category_status') ? ' has-error' : ''); ?>">
            <label for="category_status" class="col-md-2 col-sm-3 control-label">Trạng thái</label>
            <div class="col-md-6 col-sm-9">
                <select class="form-control" name="category_status">
                    <?php echo $optionStatus; ?>

                </select>
                <?php if(isset($errors)&&$errors->has('category_status')): ?>
                    <span class="help-block">
                                        <strong><?php echo e($errors->first('category_status')); ?></strong>
                                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 col-sm-3 control-label">Hiển thị ở trang trủ</label>
            <div class="col-md-6 col-sm-9">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="horizontal_menu" value="1"
                               <?php if((isset($data['horizontal_menu'])&&$data['horizontal_menu']==1)||old('horizontal_menu')==1): ?> checked <?php endif; ?> />
                        Menu ngang
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="vertical_menu" value="1"
                               <?php if((isset($data['vertical_menu'])&&$data['vertical_menu']==1)||old('vertical_menu')==1): ?> checked <?php endif; ?> />
                        Menu dọc
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="category_order_no" class="col-md-2 col-sm-3 control-label">Thứ tự</label>
            <div class="col-md-6 col-sm-9">
                <input type="number" class="form-control" name="category_order_no" id="category_order_no" min="0"
                       value="<?php echo e(isset($data['category_order_no'])?$data['category_order_no']:old('category_order_no')); ?>">
            </div>
        </div>
        <div class="form-group ">
            <label for="meta_title" class="col-md-2 col-sm-3 control-label">Meta title</label>
            <div class="col-md-10 col-sm-9">
                <input type="text" class="form-control" name="meta_title" id="meta_title"
                       value="<?php echo e(isset($data['meta_title'])?$data['meta_title']:old('meta_title')); ?>">
            </div>
        </div>
        <div class="form-group ">
            <label for="meta_keywords" class="col-md-2 col-sm-3 control-label">Meta keywords</label>
            <div class="col-md-10 col-sm-9">
                <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                       value="<?php echo e(isset($data['meta_keywords'])?$data['meta_keywords']:old('meta_keywords')); ?>">
            </div>
        </div>
        <div class="form-group ">
            <label for="meta_description" class="col-md-2 col-sm-3 control-label">Meta description</label>
            <div class="col-md-10 col-sm-9">
                <input type="text" class="form-control" name="meta_description" id="meta_description"
                       value="<?php echo e(isset($data['meta_description'])?$data['meta_description']:old('meta_description')); ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 btn-option">
                <input type="hidden" id="id_hidden" name="id_hidden" value="<?php echo e($id); ?>"/>
                <input type="hidden" id="remove_media" name="remove_media" value="0"/>
                <input type="hidden" id="remove_media_banner" name="remove_media_banner" value="0"/>
                <button type="submit" name="txtSubmit" id="buttonSubmit" class="btn btn-primary">Lưu lại</button>
                <button type="reset" class="btn" id="goback">Bỏ qua</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
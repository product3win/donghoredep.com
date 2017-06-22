<?php
/**
 * Created by PhpStorm.
 * User: Bui
 * Date: 18/06/2017
 * Time: 23:16 CH
 */
?>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle offcanvas-toggle pull-right" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
                <i class="fa fa-bars fa-2x"></i>
            </button>
            <a class="logo navbar-brand visible-xs" href="<?php echo e(url('/')); ?>" title="<?php echo e(config('app.name')); ?>">
                <img src="<?php echo e(asset('resources/assets/media/logo.png')); ?>">
            </a>
        </div>
        <div class="navbar-offcanvas navbar-offcanvas-touch" id="js-bootstrap-offcanvas">
            <ul class="nav navbar-nav navbar-left ">
                <li class="logocenter hidden-xs hidden-sm hidden-md hidden-lg">
                    <a href="" title="">
                        <img class="icon-zalo" src="<?php echo e(asset('resources/assets/media/logo.png')); ?>"></img>
                    </a>
                </li>
                <li class="hotline"><a href="tel:<?php echo e($hostline); ?>" title="host line">
                       <img class="icon-phone" src="<?php echo e(asset('resources/assets/media/smart2.png')); ?>"></img>
                        <span><b>Hostline</b><br><span><?php echo e(Funclip::formatPhonenumber($hostline)); ?></span></span>
                    </a></li>
                <li class="zalo">
                    <a href="#" title="zalo">
                        <img class="icon-zalo" src="<?php echo e(asset('resources/assets/media/zalo.png')); ?>"></img>
                        <span><b>Zalo</b><br><span><?php echo e(Funclip::formatPhonenumber($zalo)); ?></span></span>
                    </a>
                </li>
                <li class="frmsearch">
                    <form class="navbar-form" method="GET" action="">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" id="search"
                                   placeholder="Nhập tên SP cần tìm ...">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
								tìm kiếm
                                </button>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="logocenter hidden-xs ">
                    <a href="" class="logo" title="">
                        <img class="icon-logo" src="<?php echo e(asset('resources/assets/media/logo.png')); ?>"></img>
                    </a>
                </li>
                <?php echo CGlobal::$textMenu; ?>

            </ul>
        </div>
    </div>
</nav>
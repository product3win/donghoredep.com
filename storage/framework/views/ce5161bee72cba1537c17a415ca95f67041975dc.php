<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo e(asset('resources/assets/media/favicon.ico ')); ?>">
    <title><?php echo e(CGlobal::$title); ?></title>
<?php echo CGlobal::$extraMeta; ?>

<!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Styles -->
    <link href="<?php echo e(asset('resources/assets/focus/css/app.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('resources/assets/focus/css/bootstrap.offcanvas.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('resources/assets/focus/css/reset.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('resources/assets/backend/css/home.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('resources/assets/libs/font-awesome-4.7.0/css/font-awesome.min.css')); ?>" rel="stylesheet">
	
    <script type="text/javascript">
        var BASE_URL = "<?php echo e(config('app.url')); ?>";
    </script>
    <script src="<?php echo e(asset('resources/assets/focus/js/app.js')); ?>"></script>
	 <script src="<?php echo e(asset('resources/assets/focus/js/bootstrap.offcanvas.js')); ?>"></script>
    <script src="<?php echo e(asset('resources/assets/focus/js/reset.js')); ?>"></script>
    <script src="<?php echo e(asset('resources/assets/focus/js/focus.js')); ?>"></script>
    <script src="<?php echo e(asset('resources/assets/backend/js/home.js')); ?>"></script>

    <?php echo CGlobal::$extraHeaderCSS; ?>

    <?php echo CGlobal::$extraHeaderJS; ?>

</head>
<body  class="body-offcanvas">
<div id="app">
    <div class="container-fluid">
        <div class="row menu">
            <?php echo $__env->yieldContent('menu'); ?>
        </div>
        <div class="row content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <div class="row footer">
            <?php echo $__env->yieldContent('footer'); ?>
        </div>
    </div>
    <a class="btn-top" href="javascript:void(0);" title="Top" style="display: none"></a>
</div>

<!-- Scripts -->
<?php echo CGlobal::$extraFooterCSS; ?>

<?php echo CGlobal::$extraFooterJS; ?>

</body>
</html>

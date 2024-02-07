<!DOCTYPE html>
<html>

<head>
    <?php
        $setting = App\Models\Setting::find(1);
    ?>

    <?php echo SEOMeta::generate(); ?>

    <?php echo OpenGraph::generate(); ?>

    <?php echo Twitter::generate(); ?>

    <?php echo JsonLd::generate(); ?>


    <meta name="facebook-domain-verification" content="aiqpa2xtig9zv88qxrk03viz3kl5bv" />


    <meta charset="utf-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="<?php echo e(asset($setting->favicon)); ?>" rel="shortcut icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <link href='https://fonts.googleapis.com/css?family=Baloo Da 2' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="<?php echo e(asset('frontend/assets/css/style.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('frontend/images/apple-touch-icon.png')); ?>" rel="apple-touch-icon" />

    <!-- Custom Css-->
    <link href="<?php echo e(asset('frontend/assets/css/custom.css')); ?>" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
        WebFont.load({
            google: {
                families: ["Baloo Da 2", "Urbanist:300,regular,500,600,700,800,900",
                    "Kumbh Sans:300,regular,500,600,700"
                ]
            }
        });
    </script>

    <div id="fb-root"></div>

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v18.0"nonce="OOOrqTAn"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php echo $__env->make('frontend.layouts.customcss', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('page_style'); ?>

</head>

<body>
    <div class="page-wrapper">

        <?php echo $__env->make('frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('breadcrumb-section'); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <!-- jquery -->
    <script src="<?php echo e(asset('frontend/assets/js/jquery.min.js')); ?>" type="text/javascript"></script>
    <!-- theme -->
    <script src="<?php echo e(asset('frontend/assets/js/theme.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/assets/js/main.js')); ?>" charset="UTF-8"></script>
    <!-- popper -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/assets/js/popper.min.js')); ?>"></script>
    <!-- axios -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/assets/js/axios.min.js')); ?>"></script>

    <!-- custom scripts -->
    <?php echo $__env->make('frontend.layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('page_script'); ?>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\work.kroyhaat.com\resources\views/frontend/layouts/frontend.blade.php ENDPATH**/ ?>
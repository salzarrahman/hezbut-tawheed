<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3 "> <?php echo e(__(Str::ucfirst(Request::segment(1)))); ?></div>
    <div class="ps-3">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb mb-0 p-0">
                <?php if(Request::segment(1)): ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo e(route('admin.home')); ?>">
                        <i class="bx bx-home-alt "></i>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(Request::segment(2)): ?>
                <li class="breadcrumb-item " aria-current="page">
                    <?php echo $__env->yieldContent('breadcrumb_link_one'); ?>
                </li>
                <?php endif; ?>

                <?php if(is_numeric(Request::segment(3))): ?>
                    <li class="breadcrumb-item active " aria-current="page">
                        <?php echo $__env->yieldContent('breadcrumb_link_three'); ?>
                    </li>
                <?php elseif(is_string(Request::segment(3))): ?>
                    <li class="breadcrumb-item active " aria-current="page">
                        <?php echo $__env->yieldContent('breadcrumb_link_two'); ?>
                    </li>
                <?php endif; ?>



            </ol>
        </nav>
    </div>
    <?php echo $__env->yieldContent('breadcrumb_sub_link'); ?>
</div>
<?php /**PATH D:\xampp\htdocs\work.kroyhaat.com\resources\views/backend/components/breadcrumb.blade.php ENDPATH**/ ?>
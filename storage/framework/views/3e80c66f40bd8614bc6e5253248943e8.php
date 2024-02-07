<?php
    $media_partner      = App\Models\MediaPartner::where('status',1)->get();
    $media_partner_desc = App\Models\MediaPartner::where('status',1)->orderBy('id','desc')->get();
?>


<section class="client-logo-section">
    <div class="container w-container">
        <div class="client-logo-wrapper">
            <div class="client-logo-inner">
                <?php $__currentLoopData = $media_partner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="single-logo">
                    <a  target="_blank" href="<?php echo e($item->link); ?>" class="single-client-logo w-inline-block">
                        <img src="<?php echo e(asset($item->image)); ?>"loading="lazy" alt="Client Logo" class="client-logo" />
                    </a>
                    <div class="bottomleft"><?php echo e($item->title); ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="client-logo-inner">
                <?php $__currentLoopData = $media_partner_desc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="single-logo">
                    <a  target="_blank" href="<?php echo e($item->link); ?>" class="single-client-logo w-inline-block">
                        <img src="<?php echo e(asset($item->image)); ?>" loading="lazy" alt="Client Logo" class="client-logo" />
                    </a>
                    <div class="bottomleft"><?php echo e($item->title); ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<!-- end client-logo-section -->
<?php /**PATH D:\xampp\htdocs\work.kroyhaat.com\resources\views/frontend/components/logo.blade.php ENDPATH**/ ?>
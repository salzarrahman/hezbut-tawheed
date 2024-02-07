<?php
    $mission        = App\Models\Mission::find(1);
    $mission_loop   = App\Models\Mission::where('status',1)->limit(7)->get();
?>


<div class="our-mission-section">
    <div class="our-mission-wrapper">
        <div class="our-mission-content-block">
            <div class="join-our-movement-title-block">
                <div class="section-title-block section-block-center">
                    <h2 class="section-title text-white">
                       <?php echo e($mission->title ?? ''); ?>

                    </h2>
                    <p class="section-summary plr-15px">
                        <?php echo e($mission->summary ?? ''); ?>

                    </p>
                </div>
            </div>
            <div class="our-mission-content-wrapper">
                <?php $__currentLoopData = $mission_loop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->first): ?>

                    <?php else: ?>
                    <div class="our-mission-single-content">
                        <div class="our-mission-content-icon-block">
                            <img src="<?php echo e(asset($item->image ?? '')); ?>" loading="lazy" alt="Our Mission Icon" class="our-mission-icon" /></div>
                        <div class="our-mission-single-content-block">
                            <h4 class="our-mission-single-content-title"><?php echo e($item->title ?? ''); ?></h4>
                            <p class="our-mission-single-content-summary">
                                <?php echo e($item->summary ?? ''); ?>

                            </p>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
        <div class="our-mission-image-block">
            <div class="image-wrapper animate-in">
                <div class="image-overlay"></div>
                <img src="<?php echo e(asset($mission->image ?? '')); ?>" loading="lazy" alt="about-image" class="media-fit-image" />
            </div>
        </div>
    </div>
</div>  <!-- end header-top-section -->
<?php /**PATH D:\xampp\htdocs\work.kroyhaat.com\resources\views/frontend/components/mission.blade.php ENDPATH**/ ?>
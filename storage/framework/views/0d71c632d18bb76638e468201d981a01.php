<?php
    $home_about= App\Models\About::where('status',1)->orderBy('id','ASC')->limit(1)->get();
?>



<div class="about-section">
    <div class="container w-container">
        <div class="about-wrapper">

          <?php $__currentLoopData = $home_about; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="about-left-block">
                <div class="image-wrapper animate-in">
                    <div class="image-overlay"></div>
                    <img src="<?php echo e($item->image); ?>" alt="about-image" class="media-fit-image" />
                </div>
            </div>
            <div class="about-right-block">
                <div class="section-title-block">
                    <h2 class="section-title about-title">
                        <?php echo e(__($item->title ?? '#Slider Title' )); ?>


                    </h2>
                </div>
                <div class="about-content-block">
                    <?php echo __($item->summary ?? '#Slider Title'); ?>

                </div><a target=" _blank" href="<?php echo e($item->link); ?>" class="button-primary anotther-button">More About Us</a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div><!-- end header-top-section -->
<?php /**PATH D:\xampp\htdocs\work.kroyhaat.com\resources\views/frontend/components/about.blade.php ENDPATH**/ ?>
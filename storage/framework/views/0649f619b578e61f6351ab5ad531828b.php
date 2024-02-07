
<?php
    foreach ($slider as $key => $item )
?>

<section class="slider-section">

    <div class="container w-container">
        <div class="slider-content-wrapper">
            <div class="slider-content-inner">
                <h1 class="slider-title"  style="font-family: 'Baloo Da 2', sans-serif; ">
                    <?php echo e(__($item->title ?? '#Slider Title' )); ?>

                </h1>
                <p class="slider-summary">
                    <?php echo e(__($item->summary ?? '#Slider Summary' )); ?>

                </p>
                <div class="slider-button-block" >
                    <a href="<?php echo e($item->read_more_link ?? ''); ?>" class="button-primary"><?php echo e(__('translate.read_more')); ?></a>
                </div>
            </div>
            <img src="<?php echo e((!empty($item->image)) ? url($item->image): url('frontend/images/slider/slider-1.png')); ?>" sizes="(max-width: 479px) 75vw, (max-width: 767px) 77vw, (max-width: 991px) 48vw, (max-width: 1279px) 427.796875px, 605px" alt="Slider Image" class="slider-image" />
        </div>
    </div>
    

</section> <!-- end header-top-section -->
<?php /**PATH D:\xampp\htdocs\work.kroyhaat.com\resources\views/frontend/components/slider.blade.php ENDPATH**/ ?>
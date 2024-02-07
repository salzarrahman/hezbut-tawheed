
<?php
    $abilitie     = App\Models\Abilitie::get();

    $feature_left   = App\Models\Abilitie::where('status' , 1)->where('category' , 'Our Modus Operandi')->orderBy('id','desc')->limit(6)->get();
    $feature_right  = App\Models\Abilitie::where('status' , 1)->where('category' , 'Our Policies')->orderBy('id','desc')->limit(6)->get();

    $feature_left_tilte   = App\Models\Abilitie::where('status' , 1)->where('category' , 'left_block_tilte')->orderBy('id','desc')->limit(1)->get();
    $feature_right_tilte  = App\Models\Abilitie::where('status' , 1)->where('category' , 'right_block_tilte')->orderBy('id','desc')->limit(1)->get();
?>



<div class="our-abilities-section">

    <div class="custom__our-abilities-title-block">
        <div class="section-title-block">
            <h2 class="section-title">
                <?php echo e(__($abilitie[0]['title'] ?? '' )); ?>

            </h2>
            <p class="section-summary custom__section-summary ">
                <?php echo e(__($abilitie[0]['summary'] ?? '' )); ?>

            </p>
        </div>
    </div>


    <div class="container w-container">
        <div class="custom__our-abilities-wrapper">
            <div class="our-abilities-left-block">

                <h4 class="our__policy__title section-title-block">Our Modus Operandi</h4>

                <div class="faq-wrapper">
                    <?php $__currentLoopData = $feature_left; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-item-single">
                            <div class="faq-content-block">
                                <div id="q1" class="accordion-hader">
                                    <div class="content-block">
                                        <h4 class="faq-title">
                                            <?php echo e(__($item->title ?? '')); ?>

                                        </h4>
                                        <div class="line-shape"></div>
                                        <div class="line-shape horizontal"></div>
                                    </div>
                                </div>
                                <div class="accordion-body-content">
                                    <p class="accordion-text">
                                        <?php echo e(__($item->summary ?? '' )); ?>

                                    </p>
                                </div>
                                <div class="faq-inner-image">
                                    <img src="<?php echo e(asset($item->image)); ?>" loading="lazy" alt="Our Abilities Image" class="image-cover" />
                                </div>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="our-abilities-right-block">

                <h4 class="our__policy__title section-title-block">Our Policies</h4>

                <div class="faq-wrapper">
                    <?php $__currentLoopData = $feature_right; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-item-single">
                            <div class="faq-content-block">
                                <div id="q1" class="accordion-hader">
                                    <div class="content-block">
                                        <h4 class="faq-title">
                                            <?php echo e(__($item->title ?? '')); ?>

                                        </h4>
                                        <div class="line-shape"></div>
                                        <div class="line-shape horizontal"></div>
                                    </div>
                                </div>
                                <div class="accordion-body-content">
                                    <p class="accordion-text">
                                        <?php echo e(__($item->summary ?? '' )); ?>

                                    </p>
                                </div>
                                <div class="faq-inner-image">
                                    <img src="<?php echo e(asset($item->image)); ?>" loading="lazy" alt="Our Abilities Image" class="image-cover" />
                                </div>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- end header-top-section -->
<?php /**PATH D:\xampp\htdocs\work.kroyhaat.com\resources\views/frontend/components/abilities.blade.php ENDPATH**/ ?>
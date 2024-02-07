<?php
    $setting        = App\Models\Setting::find(1);
    $category       = App\Models\Category::where('category','Press Conference')->pluck('id')->first();
    $press          = App\Models\Blogpost::where('status',1)->where('category_id',$category)->limit(4)->orderBy('id','DESC')->latest()->get();
    $photo_gallery  = App\Models\Gallery::orderBy('id', 'DESC')->limit(6)->get();
?>


<div class="press-tweet-volunteer-section" style="margin-top: 50px;">
    <div class="our-mission-wrapper press-tweets-volunteer">
        <div class="our-mission-content-block press-tweets-volunteer"
            style="background-image: url(<?php echo e(asset($setting->press_tweet_volunteer_right ?? '')); ?>)">

            <div class="image__container">
                <!-- Full-width images with number text -->
                <div class="image__view__container">
                    <?php $__currentLoopData = $photo_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mySlides">
                            <div class="numbertext">1 / 6</div>
                            <img class="slide__img" src="<?php echo e(asset($item->future_images ?? '')); ?>" style="width:100%">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Next and previous buttons -->
                <a class="home__prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="home__next" onclick="plusSlides(1)">&#10095;</a>

                <!-- Image text -->
                <div class="caption-container">
                    <p id="caption"></p>
                </div>

                <!-- Thumbnail images -->
                <div class="row thumrow">

                    <?php $__currentLoopData = $photo_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="column">
                            <img class="demo cursor" src="<?php echo e(asset($item->future_images ?? '')); ?>" onclick="currentSlide(<?php echo e($key); ?>)" alt="<?php echo e($item->title ?? ''); ?>">
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(url('/gallery')); ?>" class="view-all-button photo__more mt-20px">view more</a>
                </div>
            </div>

        </div>

        <div class="our-mission-image-block press-tweet-volunteer">
            <img src="<?php echo e(asset($setting->press_tweet_volunteer_left ?? '')); ?>" alt="Our Mission Image"
                class="our-mission-image" />
            <div class="campaign-donation-content press-tweet-volunteer">
                <h2 class="prass-content-title">Press Conference</h2>
                <?php $__currentLoopData = $press; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div role="listitem" class="confarence-item w-dyn-item">
                    <div class="confarebce-content-block">
                        <a href="<?php echo e(url('blog/details/'.$item->id.'/'.$item->news_title_slug)); ?>"
                            class="confarebce-link-block w-inline-block">
                            <h4 class="confarence-title">
                                <?php echo e($item->news_title ?? ''); ?>

                            </h4>
                        </a>
                        <div class="confarence-date-block">
                            <div class="party-name"><?php echo e($setting->site_title); ?> - </div>
                            <div class="confarence-date">
                                <?php echo e($item->created_at->format(' F d,  Y ')); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <a href="<?php echo e(url('/press-conference')); ?>" class="view-all-button mt-40px">View all</a>

            </div>
        </div>
    </div>
</div>


<?php /**PATH D:\xampp\htdocs\work.kroyhaat.com\resources\views/frontend/components/press-image.blade.php ENDPATH**/ ?>
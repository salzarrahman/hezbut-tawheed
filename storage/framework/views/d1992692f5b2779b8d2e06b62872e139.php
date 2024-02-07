<?php
    $features = App\Models\Feature::where('status', 1)->limit(2)->latest()->get();
?>

<style>
    .feature-section {
        background-color: #16327a;
        padding-top: 135px;
        padding-bottom: 135px;
    }
    .feature-block {
        position: relative;
    }
    .feature_img_block {
        width: 100%;
    }
    .image {
        opacity: 1;
        transition: .8s ease;
    }

    .middle {
        /* transition: .8s ease;
        opacity: 0; */
        position: absolute;
        /* top: 50%; */
        left: 50%;
        bottom: -50px;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .feature_button {
        border: 1px solid;
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: bold;
    }
    .feature_text {
        text-align: center;
    }
</style>

<div class="container w-container feature_section">
    <div class="about-wrapper">
        <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="feature-block">
                <div class="feature_img_block">
                    <img width="100%" src="<?php echo e(asset($feature->image ?? '')); ?>" loading="lazy" alt="about-image" class="image" />
                </div>
                <div class="feature_text">
                    <h4><?php echo e($feature->title ?? ''); ?></h4>
                    <p><?php echo e($feature->summary ?? ''); ?></p>
                </div>
                <div class="middle">
                    <a href="<?php echo e($feature->link ?? ''); ?>" class="feature_button">Learn more</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\work.kroyhaat.com\resources\views/frontend/components/feature.blade.php ENDPATH**/ ?>
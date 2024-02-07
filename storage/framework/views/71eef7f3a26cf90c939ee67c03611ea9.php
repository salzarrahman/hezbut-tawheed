<?php
    $social_media = App\Models\SocialMedia::find(1);
?>

<div class="header-top-section">
    <div class="container w-container custom-w-container-line">
        <div class="header-top-wrapper">

            <!-- Start Translate-->
            <div class="header-top-content-block">
                <div class="header-top-title-text">
                    <?php echo e(__(' Languages:')); ?>

                </div>
                <div class="header-top-text">
                    <select class="form-select changeLang">
                        <option value="en" <?php echo e(session()->get('locale') == 'en' ? 'selected' : ''); ?>>English</option>
                        <option value="ar" <?php echo e(session()->get('locale') == 'ar' ? 'selected' : ''); ?>>Arabic</option>
                        <option value="es" <?php echo e(session()->get('locale') == 'es' ? 'selected' : ''); ?>>Spanish</option>
                        <option value="ru" <?php echo e(session()->get('locale') == 'ru' ? 'selected' : ''); ?>>Russian</option>
                        <option value="hi" <?php echo e(session()->get('locale') == 'hi' ? 'selected' : ''); ?>>Hindi</option>
                        <option value="fr" <?php echo e(session()->get('locale') == 'fr' ? 'selected' : ''); ?>>French</option>
                        <option value="bn" <?php echo e(session()->get('locale') == 'bn' ? 'selected' : ''); ?>>Bangla</option>
                        <option value="zh-CN" <?php echo e(session()->get('locale') == 'zh-CN' ? 'selected' :''); ?>>Chinese</option>
                        <option value="ja" <?php echo e(session()->get('locale') == 'ja' ? 'selected' : ''); ?>>Japanese</option>
                    </select>
                </div>
            </div>
            <!-- End Translate-->


            <div class="header-top-right-block ">
                <div class="header-top-social-inner">

                    <!-- Start search-->
                        <div class="search-box">
                            <form class="header-search" action="<?php echo e(route('search')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input class="input-search" type="text" name="search" placeholder="Type to Search... "
                                    required="">
                                <button class="btn-search" type="submit" value="Search">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    <!-- End search-->

                    <a href="<?php echo e($social_media->facebook ?? ''); ?>" class="header-top-single-social-item w-inline-block">
                        <img src="<?php echo e(asset('frontend/images/facebook-2.svg')); ?>" loading="lazy"
                            alt="Header Top Single Social Icon" height="15"
                            class="header-top-single-social-image-white" />
                    </a>
                    <a href="<?php echo e($social_media->twitter ?? ''); ?>" class="header-top-single-social-item w-inline-block">
                        <img src="<?php echo e(asset('frontend/images/twitter-2.svg')); ?>" loading="lazy"
                            alt="Header Top Single Social Icon" class="header-top-single-social-image-white" />
                    </a>
                    <a href="<?php echo e($social_media->instagram ?? ''); ?>"
                        class="header-top-single-social-item w-inline-block">
                        <img src="<?php echo e(asset('frontend/images/instagram-2.svg')); ?>" loading="lazy"
                            alt="Header Top Single Social Icon" class="header-top-single-social-image-white" />
                    </a>
                    <a href="<?php echo e($social_media->v ?? ''); ?>" class="header-top-single-social-item w-inline-block">
                        <img src="<?php echo e(asset('frontend/images/linkedin-2.svg')); ?>" loading="lazy"
                            alt="Header Top Single Social Icon" class="header-top-single-social-image-white" />
                    </a>

                    <div class="login-register-link">
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('users.logout')); ?>" class="footer-bottom-link">
                                <?php echo e(__('Logout')); ?>

                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="footer-bottom-link">
                                <?php echo e(__('Login')); ?>

                            </a>
                            <span></span>
                            <a href="<?php echo e(route('register')); ?>" class="footer-bottom-link">
                                <?php echo e(__('Register')); ?>

                            </a>
                        <?php endif; ?>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div> <!-- end header-top-section -->

<?php /**PATH D:\xampp\htdocs\work.kroyhaat.com\resources\views/frontend/layouts/header.blade.php ENDPATH**/ ?>
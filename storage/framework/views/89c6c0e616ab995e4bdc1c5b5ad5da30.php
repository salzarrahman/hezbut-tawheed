<?php
    $setting = App\Models\Setting::find(1);
    $nevigation = App\Models\ActiveMenu::where('status', 1)->where('title','Footer Nevigation')->get();
    $important = App\Models\ActiveMenu::where('status', 1)->where('title','Footer Important')->get();
?>


<footer class="footer">
    <div class="footer-inner">
        <div class="container w-container">
            <div class="footer-wrapper">
                <div class="footer-logo-block">
                    <div class="footer-title left-title"><?php echo e(__('translate.newsletter')); ?></div>
                    <p class="footer-text"><?php echo e(__('translate.inbox')); ?></p>
                    <span class="successmessage"> </span>
                    <div class="footer-form w-form">
                        <input id="SubscribeEmailId" type="email" class="form-control  w-100" placeholder="email ">
                        <button id="SubscribeBtnId"  class="btn btn-block normal-btn w-100"><?php echo e(__('translate.subscribe')); ?> </button>
                    </div>
                    <div class="footer-bottom-text">
                        Powered by <a href="/" target="_blank" class="bottom-link"> <?php echo e($setting->site_title ?? ''); ?> </a>
                    </div>
                </div>
                <div class="footer-content-block">
                    <div class="footer-block">
                        <div class="footer-title"><?php echo e(__('translate.nevigation')); ?></div>
                        <?php $__currentLoopData = $nevigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $item->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($value->id); ?>" class="footer-link">
                            <?php echo e($value->category); ?>

                            
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <div class="footer-block">
                        <div class="footer-title"><?php echo e(__('translate.important')); ?></div>

                        <?php $__currentLoopData = $important; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $item->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($value->id); ?>" class="footer-link">
                            <?php echo e($value->category); ?>

                            
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <div class="footer-block">
                        <div class="footer-title"><?php echo e(__('translate.contact_info')); ?></div>
                        <div class="contact-number-block">
                            <address class="address-block">
                                <div class="footer-subtitle"><?php echo e(__('translate.head_quater')); ?></div>
                                <div class="footer-address-text">
                                    <?php echo e($setting->address ?? ''); ?>

                                </div>
                            </address>
                            <div class="mail-address-block">
                                <div class="footer-subtitle"><?php echo e(__('translate.web_info')); ?></div>
                                <a href="mailto:<?php echo e($setting->email ?? ''); ?>?subject=webflow%20mail" class="mail-address">
                                    <?php echo e($setting->email ?? ''); ?>

                                </a>
                                <a href="<?php echo e($setting->web ?? ''); ?>" target="_blank" class="website-link"><?php echo e($setting->web
                                    ?? ''); ?></a>
                            </div>
                            <div class="phone-block">
                                <div class="footer-subtitle"><?php echo e(__('translate.phone_number')); ?></div>
                                <div class="number-block">
                                    <a href="tel:<?php echo e($setting->phone_number ?? ''); ?>"
                                        class="phone-number"><?php echo e($setting->phone_number ?? ''); ?></a>
                                    <div class="number-text">/</div>
                                    <a href="tel:<?php echo e($setting->phone_number ?? ''); ?>"
                                        class="phone-number"><?php echo e($setting->phone_number_2 ?? ''); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-copyright">©
                    <?php echo date("Y"); ?>
                    <a href="<?php echo e($setting->web ?? ''); ?>" target="_blank" class="company-link"><?php echo e($setting->site_title ??
                        ''); ?></a>
                    . All rights reserved
                </div>
                <div class="footer-social-block-two">
                    <a href="/login" class="footer-bottom-link">Login</a>
                    <a href="/register" class="footer-bottom-link">Register</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php /**PATH D:\xampp\htdocs\work.kroyhaat.com\resources\views/frontend/layouts/footer.blade.php ENDPATH**/ ?>
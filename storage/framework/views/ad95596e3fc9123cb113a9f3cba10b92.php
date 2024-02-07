<div class="navigation-section" id="navbar">
    <div data-animation="over-left" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease"
        role="banner" class="navbar-logo-left-container shadow-three w-nav nav">
        <div class="container">
            <div class="navbar-wrapper">

                <a href="/" aria-current="page" class="navbar-brand w-nav-brand w--current">
                    <img src="<?php echo e((!empty($setting->logo)) ? asset($setting->logo): url('upload/11.jpg')); ?>"oading="lazy" alt="Logo Image" class="logo-image" />
                </a>

                <nav role="navigation" class="nav-menu-wrapper w-nav-menu">
                    <ul role="list" class="nav-menu-two w-list-unstyled">


                        <li class="nav-item-list">
                            <a href="/" class="nav-link">
                                <?php echo e(__('navigation.home')); ?>

                            </a>
                        </li>
                        <li class="nav-item-list">
                            <a href="/about" class="nav-link">
                                <?php echo e(__('navigation.about')); ?>

                            </a>
                        </li>

                        <li class="nav-item-list">
                            <a href="/ideology" class="nav-link">
                                <?php echo e(__('navigation.ideology')); ?>


                            </a>
                        </li>

                        <li class="nav-item-list">
                            <a href="/issues" class="nav-link">
                                <?php echo e(__('navigation.issues')); ?>


                            </a>
                        </li>

                        <li class="nav-item-list">
                            <a href="/campaign" class="nav-link">
                                <?php echo e(__('navigation.campaign')); ?>

                            </a>
                        </li>

                        <li class="nav-item-list">
                            <a href="/blog" class="nav-link">
                                <?php echo e(__('navigation.blog')); ?>

                            </a>
                        </li>
                        <li class="nav-item-list">
                            <a href="/gallery " class="nav-link">
                                <?php echo e(__('navigation.gallery')); ?>

                            </a>
                        </li>
                        <li class="nav-item-list">
                            <a href="/video" class="nav-link">
                                <?php echo e(__('navigation.video')); ?>

                            </a>
                        </li>

                        <li class="nav-item-list">
                            <a href="/books" class="nav-link">
                                <?php echo e(__('navigation.books')); ?>

                            </a>
                        </li>

                        <li class="nav-item-list">
                            <a href="/contact" class="nav-link">
                                <?php echo e(__('navigation.contact')); ?>

                            </a>
                        </li>



                        <li class="mobile-margin-top-10">
                            <a href="/joining" class="button-primary donate-button w-button">
                                <?php echo e(__('navigation.join')); ?>

                            </a>
                        </li>

                    </ul>
                </nav>
                <div class="menu-button w-nav-button">
                    <div class="w-icon-nav-menu"></div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end navigation-section -->



<?php /**PATH D:\xampp\htdocs\work.kroyhaat.com\resources\views/frontend/layouts/navigation.blade.php ENDPATH**/ ?>
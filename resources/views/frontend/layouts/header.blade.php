@php
    $social_media = App\Models\SocialMedia::find(1);
@endphp

<div class="header-top-section">
    <div class="container w-container custom-w-container-line">
        <div class="header-top-wrapper">

            <!-- Start Translate-->
            <div class="header-top-content-block">
                <div class="header-top-title-text">
                    {{ __(' Languages:') }}
                </div>
                <div class="header-top-text">
                    <select class="form-select changeLang">
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabic</option>
                        <option value="es" {{ session()->get('locale') == 'es' ? 'selected' : '' }}>Spanish</option>
                        <option value="ru" {{ session()->get('locale') == 'ru' ? 'selected' : '' }}>Russian</option>
                        <option value="hi" {{ session()->get('locale') == 'hi' ? 'selected' : '' }}>Hindi</option>
                        <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>French</option>
                        <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}>Bangla</option>
                        <option value="zh-CN" {{ session()->get('locale') == 'zh-CN' ? 'selected' :''}}>Chinese</option>
                        <option value="ja" {{ session()->get('locale') == 'ja' ? 'selected' : '' }}>Japanese</option>
                    </select>
                </div>
            </div>
            <!-- End Translate-->


            <div class="header-top-right-block ">
                <div class="header-top-social-inner">

                    <!-- Start search-->
                        <div class="search-box">
                            <form class="header-search" action="{{ route('search') }}" method="post">
                                @csrf
                                <input class="input-search" type="text" name="search" placeholder="Type to Search... "
                                    required="">
                                <button class="btn-search" type="submit" value="Search">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    <!-- End search-->

                    <a href="{{ $social_media->facebook ?? '' }}" class="header-top-single-social-item w-inline-block">
                        <img src="{{ asset('frontend/images/facebook-2.svg') }}" loading="lazy"
                            alt="Header Top Single Social Icon" height="15"
                            class="header-top-single-social-image-white" />
                    </a>
                    <a href="{{ $social_media->twitter ?? '' }}" class="header-top-single-social-item w-inline-block">
                        <img src="{{ asset('frontend/images/twitter-2.svg') }}" loading="lazy"
                            alt="Header Top Single Social Icon" class="header-top-single-social-image-white" />
                    </a>
                    <a href="{{ $social_media->instagram ?? '' }}"
                        class="header-top-single-social-item w-inline-block">
                        <img src="{{ asset('frontend/images/instagram-2.svg') }}" loading="lazy"
                            alt="Header Top Single Social Icon" class="header-top-single-social-image-white" />
                    </a>
                    <a href="{{ $social_media->v ?? '' }}" class="header-top-single-social-item w-inline-block">
                        <img src="{{ asset('frontend/images/linkedin-2.svg') }}" loading="lazy"
                            alt="Header Top Single Social Icon" class="header-top-single-social-image-white" />
                    </a>

                    <div class="login-register-link">
                        @auth
                            <a href="{{ route('users.logout') }}" class="footer-bottom-link">
                                {{ __('Logout') }}
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="footer-bottom-link">
                                {{ __('Login') }}
                            </a>
                            <span></span>
                            <a href="{{ route('register') }}" class="footer-bottom-link">
                                {{ __('Register') }}
                            </a>
                        @endauth
                    </div>


                </div>
            </div>
        </div>
    </div>
</div> <!-- end header-top-section -->


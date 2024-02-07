@extends('frontend.layouts.frontend')

@section('title', 'Register')

@section('page_style')

@endsection

@section('content')

<style>
    .custom-field-style {
        width: 100%;
        min-height: 50px;
        padding-left: 15px;
    }
    .custom-field-style:focus {
        border-color: #16327a;
        box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.1);
    }
    .custom-button-block {
        margin-bottom: 20px;
    }

</style>

{{-- <div class="breadcrumb-section wf-section">
    <div class="container w-container">
        <div class="breadcrumb-wrapper"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <h1 class="breadcrumb-title">Register</h1>
            <div class="breadcrumb-link-block"><a href="/" class="breadcrumb-backlink">Home</a>
                <div class="breadcrunb-slach">/</div>
                <div class="current-page-name">Register</div>
            </div>
        </div>
    </div>
</div> --}}

<div class="blog-section wf-section">
    <div class="container w-container">
        <div class="login-wrapper">
            <div class="login-left-side">
                <div class="login-top">
                    <h2 class="login-title"
                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        Create Account</h2>
                    <p data-w-id="f0e5e25e-c1e5-8804-3a16-39e7357843c6"
                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                        class="login-details">Human right is the most important factor for all the peoploe than leaves
                        in the Country and make the most common problems now a days<br></p>
                </div>
                <div class="login-form-block">
                    <div class="form-block-2 w-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="login-form" >
                                <input class="@error('name') is-invalid @enderror  form-conterler custom-field-style" type="text"  name="name" placeholder="Name" id="name">
                                <input class="@error('username') is-invalid @enderror  form-conterler custom-field-style" type="text" name="username" placeholder="User Name" id="username" >
                                <input class="@error('email') is-invalid @enderror  form-conterler custom-field-style" type="emai" name="email" placeholder="Email" id="email" >
                                <input class="@error('password') is-invalid @enderror  form-conterler custom-field-style" type="password" name="password" id="password" >
                                <input class="@error('password_confirmation') is-invalid @enderror  form-conterler custom-field-style" type="password" name="password_confirmation" id="password_confirmation" >

                                <div class="forget-password-block register-block" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                    <label class="w-checkbox form-checkbox login-page">
                                        <input type="checkbox" name="ceckbox" id="ceckbox"   class="w-checkbox-input checkbox">
                                            <span class="checkbox-label w-form-label"  for="Checkbox">I agree with the</span></label>
                                            <a href="{{ route('terms-conditions') }}"class="forget-password register-page">Terms &amp; Conditions</a>
                                </div>
                                <div class="button-block register-page custom-button-block" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">

                                    <input type="submit" value="Register" data-wait="Please wait..." class="button-primary anotther-button w-button">
                                    <div class="already-account">Already have an Account?</div>
                                    <a href="{{ route('login') }}" class="register-link register-page">Login</a>
                                </div>
                            </div>
                    </form>

                    </div>
                </div>
            </div>
            <div class="login-right-side">
                <div class="banner-block-right">
                    <div class="image-wrapper animate-in">
                        <div class="image-overlay"
                            style="display: none; transform: translate3d(-100%, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        </div><img
                            src="https://assets.website-files.com/63d5ec95050b76dc48ad34fd/63d8a0cf7bb29b4938ea1ede_our-mission-image.jpg"
                            loading="lazy"
                            sizes="(max-width: 479px) 100vw, (max-width: 991px) 72vw, (max-width: 1279px) 455.6875px, 573.296875px"
                            srcset="https://assets.website-files.com/63d5ec95050b76dc48ad34fd/63d8a0cf7bb29b4938ea1ede_our-mission-image-p-500.jpg 500w, https://assets.website-files.com/63d5ec95050b76dc48ad34fd/63d8a0cf7bb29b4938ea1ede_our-mission-image.jpg 637w"
                            alt="about-image" class="media-fit-image"
                            style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

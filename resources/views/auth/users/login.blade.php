@extends('frontend.layouts.frontend')

@section('title','Login')



@section('page_style')
<style>
    .custom-contact-title {
        padding: 20px 0 5px 0;
    }
    .custom-field-style {
        width: 100%;
        min-height: 50px;
        padding-left: 15px;
    }
    ..custom-field-style:focus {
        border-color: #16327a;
        box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.1);
    }
    .custom-contact-btn {
        margin-top: 20px
    }

</style>
@endsection

@section('content')

<div class="breadcrumb-section wf-section">
    <div class="container w-container">
        <div class="breadcrumb-wrapper">
            <h1 class="breadcrumb-title">Login</h1>
            <div class="breadcrumb-link-block">
                <a href="/" class="breadcrumb-backlink">Home</a>
                <div class="breadcrunb-slach">/</div>
                <div class="current-page-name">Login</div>
            </div>
        </div>
    </div>
</div>

<div class="blog-section wf-section">
    <div class="container w-container">
        <div class="login-wrapper">
            <div class="login-left-side">
                <div class="login-top">
                    <h2 class="login-title">Login</h2>
                </div>
                <div class="login-form-block">
                    <div class="form-block w-form">
                    <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div style="display: none;"></div>
                            <div class="main_section">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="contact-title custom-contact-title"> Email *</div>
                                        <div class="contact-form">
                                            <span class="wpcf7-form-control-wrap sub_title">
                                                <input type="email" name="email" id="email" value="" class="wpcf7-form-control wpcf7-text custom-field-style" aria-invalid="false" placeholder="Email">
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <div class="contact-title custom-contact-title"> Password * </div>
                                        <div class="contact-form">
                                            <span class="wpcf7-form-control-wrap sub_title">
                                                <input type="text" name="password" id="password" value="" class="wpcf7-form-control wpcf7-text custom-field-style" aria-invalid="false" placeholder="Password">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="contact-btn custom-contact-btn">
                                            <input type="submit" value="Login Now" class="wpcf7-form-control has-spinner wpcf7-submit button-primary anotther-button" style="border: none;">
                                            <span class="wpcf7-spinner"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <div class="w-form-done">
                            <div>Thank you! Your submission has been received!</div>
                        </div>
                        <div class="w-form-fail">
                            <div>Oops! Something went wrong while submitting the form.</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="login-right-side">
                <div class="banner-block-right">
                    <div class="image-wrapper animate-in">
                        <div class="image-overlay"></div><img
                            src="https://assets.website-files.com/63d5ec95050b76dc48ad34fd/63d8a0cf7bb29b4938ea1ede_our-mission-image.jpg"
                            loading="lazy"
                            sizes="(max-width: 479px) 94vw, (max-width: 991px) 72vw, (max-width: 1279px) 455.6875px, 573.296875px"
                            srcset="https://assets.website-files.com/63d5ec95050b76dc48ad34fd/63d8a0cf7bb29b4938ea1ede_our-mission-image-p-500.jpg 500w, https://assets.website-files.com/63d5ec95050b76dc48ad34fd/63d8a0cf7bb29b4938ea1ede_our-mission-image.jpg 637w"
                            alt="about-image" class="media-fit-image" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.components.logo')

@endsection

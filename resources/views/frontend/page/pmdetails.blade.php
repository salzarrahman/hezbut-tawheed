@extends('frontend.layouts.frontend')


@section('breadcrumb-section')
<div class="breadcrumb-section">
    <div class="container w-container">
        <div class="breadcrumb-wrapper"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <h1 class="breadcrumb-title">{{ __($party_member[0]['name'] ?? '') }}</h1>
            <div class="breadcrumb-link-block">
                <a href="#" class="breadcrumb-backlink">Home</a>
                <div class="breadcrunb-slach">/</div>
                <a href="/party-member" class="breadcrumb-backlink">
                    {{ __('navigation.party_members') }}
                </a>
                <div class="breadcrunb-slach">/</div>
                <div class="current-page-name">{{ __($party_member[0]['name'] ?? '') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('content')

<style>
    .political-career-activities {
        display: -ms-grid;
        display: block;
    }

    .form-column{
        grid-column-start: span 2;
    }
    input{
        opacity: 1;
        transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
        transform-style: preserve-3d;
    }

</style>

<div class="party-member-section">
    <div class="container w-container">
        <div class="single-party-member">
            <div data-w-id="f24bf51f-c017-bc8c-3d4a-3d260df68b6b" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                class="single-party-member-image-block">
                <div class="single-party-member-image-inner">
                    <div class="image-wrapper animate-in">
                        <div class="image-overlay"  style="display: none; transform: translate3d(-100%, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        </div>
                        <img loading="lazy"src="{{ asset($party_member[0]['image'] ?? '') }}"alt="about-image"
                            sizes="(max-width: 767px) 94vw, (max-width: 991px) 545px, (max-width: 1279px) 390px, 534px" class="media-fit-image"
                            style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    </div>
                </div>
            </div>
            <div class="single-party-member-content"
                style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                <h2 class="single-party-member-name">{{ $party_member[0]['name'] ?? ''}}</h2>
                <div class="single-party-member-position">{{ $party_member[0]['designation'] ?? '' }}</div>
                <p class="single-party-member-summary">
                    {{ $party_member[0]['about_me'] ?? ''}}
                </p>
                <br>
                <div class="single-party-member-info-block">
                    <div class="single-party-member-single-info-block">
                        <div class="single-party-member-info-text">{{ __('translate.address') }}:</div>
                        <div class="single-party-member-info-content"> {{ $party_member[0]['address'] ?? '' }} </div>
                    </div>
                    <div class="single-party-member-single-info-block">
                        <div class="single-party-member-info-text">{{ __('translate.phone_number') }}:</div>
                        <div class="single-party-member-info-content">{{ $party_member[0]['phone'] ?? '' }}</div>
                    </div>
                    <div class="single-party-member-single-info-block">
                        <div class="single-party-member-info-text">{{ __('translate.email') }}:</div>
                        <div class="single-party-member-info-content">{{ $party_member[0]['email'] ?? ''}}</div>
                    </div>
                </div>
                <div class="team-social-block">
                    <div class="footer-social-block">
                        <a href="{{ $party_member[0]['facebook'] ?? '' }}" target="_blank" class="social-icon-link-block w-inline-block">
                            <img  src="{{ asset('frontend/images/social_icon/facebook.svg') }}" loading="lazy" alt="Social Icon Link Image" class="social-icon-link-image">
                        </a>
                        <a href="{{ $party_member[0]['twitter'] ?? '' }}" target="_blank" class="social-icon-link-block w-inline-block">
                            <img src="{{ asset('frontend/images/social_icon/twitterx.svg') }}" loading="lazy" alt="Social Icon Link Image" class="social-icon-link-image">
                        </a>
                        <a href="{{ $party_member[0]['instagram'] ?? '' }}" target="_blank" class="social-icon-link-block w-inline-block">
                            <img src="{{ asset('frontend/images/social_icon/instagram.svg') }}"  loading="lazy" alt="Social Icon Link Image" class="social-icon-link-image">
                        </a>
                        <a href="{{ $party_member[0]['linkedin'] ?? '' }}" target="_blank" class="social-icon-link-block w-inline-block">
                            <img src="{{ asset('frontend/images/social_icon/linkedin.svg') }}"  loading="lazy" alt="Social Icon Link Image" class="social-icon-link-image">
                        </a>
                        <a href="{{ $party_member[0]['skype'] ?? '' }}" target="_blank" class="social-icon-link-block w-inline-block">
                            <img src="{{ asset('frontend/images/social_icon/skype.svg') }}"  loading="lazy" alt="Social Icon Link Image" class="social-icon-link-image">
                        </a>
                        <a href="{{ $party_member[0]['whatsapps'] ?? '' }}" target="_blank" class="social-icon-link-block w-inline-block">
                            <img src="{{ asset('frontend/images/social_icon/whatsapp.svg') }}"  loading="lazy" alt="Social Icon Link Image" class="social-icon-link-image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="political-career-wrapper single-party-member">
            <div class="political-career-left-content-block"
                style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                <div class="political-career-title-block">
                    <div class="section-title-block"
                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        <h2 class="section-title political-career-title">
                           {{__('translate.movement_career')}}
                        </h2>
                        <p class="section-summary">
                            {{ $party_member[0]['movement_life'] ?? '' }}

                        </p>
                    </div>
                </div>
                <div class="political-career-activities">
                    {!! $party_member[0]['achievement'] ?? '' !!}
                </div>
            </div>
            <div class="political-career-thumb-block party-mermber-page">
                <div class="political-career-title-block party-mermber-page">
                    <div class="section-title-block"
                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        <h2 class="section-title political-career-title">
                            Send Message
                        </h2>
                        <p class="section-summary">
                            To make sure all Citizen rights, you have to work better country for
                            our child. So we initiative
                        </p>
                    </div>
                    <div class="contact-wrapper-block party-mermber-page">
                        <div class="form-block w-form" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">

                            <input hidden type="text"  name="contact_to" id=""  value=" {{ $party_member[0]['name'] ?? '' }}" >

                            <div class="form" >
                                <div class="contact-form-grid">

                                    <div class="form-column">
                                        <input type="text"  name="name" id="nameId"  class="form-input-field contact-form-field w-input"placeholder="Name *" >
                                    </div>
                                    <div class="form-column">
                                        <input type="number" name="email" id="emailId"  class="form-input-field contact-form-field w-input"placeholder="Phone no *" >
                                    </div>

                                    <div class="form-column">
                                        <input type="email" name="mobile_no" id="mobile_noId"  class="form-input-field contact-form-field w-input"placeholder="Email *" >
                                    </div>

                                    <div class="form-column">
                                        <input type="text" name="subject" id="subjectId"  class="form-input-field contact-form-field w-input"placeholder="Sybjet *" >
                                    </div>

                                    <div  class="form-column">
                                        <textarea  name="message" id="messageId" maxlength="5000" placeholder="Write some message here" class="form-textarea party-member-text-area w-input"></textarea>
                                    </div>
                                </div>

                                <button id="MemberSend" class="custom-submit-button submit-button w-button">{{ __('Send Message')}}</button>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.components.logo')

@endsection

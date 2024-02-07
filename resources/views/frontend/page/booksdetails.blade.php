@php
    $party_member       =  App\Models\PartyMember::limit(4)->get();
    $mission            = App\Models\Mission::find(1);
    $mission_loop       = App\Models\Mission::where('status',1)->limit(7)->get();
@endphp

@extends('frontend.layouts.frontend')

@section('breadcrumb-section')
<div class="breadcrumb-section">
    <div class="container w-container">
        <div class="breadcrumb-wrapper"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <h1 class="breadcrumb-title">{{ $books->title }}</h1>
            <div class="breadcrumb-link-block"><a href="#" class="breadcrumb-backlink">Home</a>
                <div class="breadcrunb-slach">/</div>
                <a href="/books" class="breadcrumb-backlink">
                    Books
                </a>
                <div class="breadcrunb-slach">/</div>
                <div class="current-page-name">{{ $books->title }}</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_style')
<style>
    .media-fit-image {
        width: 400px;
    }
</style>
@endsection

@section('content')
<div class="party-member-section">
    <div class="container w-container">
        <div class="single-party-member">
            <div data-w-id="f24bf51f-c017-bc8c-3d4a-3d260df68b6b" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;" class="single-party-member-image-block">
                <div class="single-party-member-image-inner">
                    <div class="image-wrapper animate-in">
                        <div class="image-overlay" style="display: none; transform: translate3d(-100%, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        </div>
                        <img loading="lazy" src="{{ asset($books->cover_image) }}" alt="about-image" sizes="(max-width: 767px) 94vw, (max-width: 991px) 545px, (max-width: 1279px) 390px, 534px" class="media-fit-image"  style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    </div>
                </div>
            </div>
            <div class="single-party-member-content"
                style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                <h2 class="single-party-member-name">{{ $books->title }}</h2>
                <div class="single-party-member-position">
                    {{ $books->authors }}
                    <hr>
                </div>
                <p class="single-party-member-summary">
                  {!! $books->description !!}
                </p>
                <hr>
                <div class="single-party-member-info-block">

                    <div class="single-party-member-single-info-block">
                        <div class="single-party-member-info-text">Price:</div>
                        <div class="single-party-member-info-content"><b>{{ $books->price }} $ </b>  </div>
                    </div>
                    <div class="single-party-member-single-info-block">
                        <div class="single-party-member-info-text">Publisher:</div>
                        <div class="single-party-member-info-content"><b> {{ $books->publisher_name }}</b> </div>
                    </div>

                    <div class="single-party-member-single-info-block">
                        <div class="single-party-member-info-text">Publication:</div>
                        <div class="single-party-member-info-content"> <b>{{ $books->publication_year }} </b></div>
                    </div>
                    <div class="single-party-member-single-info-block">
                        <div class="single-party-member-info-text">ISBN:</div>
                        <div class="single-party-member-info-content"> <b> {{ $books->isbn_number }} </b></div>
                    </div>
                </div>
                <div class="team-social-block">
                    <div class="footer-social-block">
                        @include('vendor.share.socialshare')
                    </div>
                </div>
            </div>
        </div>
        <div class="political-career-wrapper single-party-member">
            <div class="political-career-left-content-block" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                <div class="political-career-title-block">
                    <div class="section-title-block"style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        <h2 class="section-title political-career-title">Read book pdf</h2>
                      
                        <div style="text-align:center">
                            <embed src="{{ asset($books->pdf_file) }}" frameborder="0" height="600px" width="100%"></embed>
                        </div>
                    </div>
                </div>

            </div>
            <div class="political-career-thumb-block party-mermber-page">
                <div class="political-career-title-block party-mermber-page">
                    <div class="section-title-block"
                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        <h2 class="section-title political-career-title">Send Message</h2>
                        <p class="section-summary">To make sure all Citizen rights, you have to work better country for
                            our child. So we initiative</p>
                    </div>
                    <div class="contact-wrapper-block party-mermber-page">
                        <div class="form-block w-form"
                            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                            <form id="wf-form-Contact-Form" name="wf-form-Contact-Form" data-name="Wf Form Contact Form"
                                method="get" class="form" data-wf-page-id="63de25b9c6567a3aec2cb5b0"
                                data-wf-element-id="9dc36966-305e-8d33-917d-2dca15cf7088"
                                aria-label="Wf Form Contact Form">
                                <div class="contact-form-grid">
                                    <div id="w-node-_9dc36966-305e-8d33-917d-2dca15cf708a-ec2cb5b0" class="form-column">
                                        <input class="form-input-field contact-form-field w-input" maxlength="256"
                                            name="First-Name" data-name="First Name" placeholder="Name *" type="text"
                                            id="First-Name" required=""
                                            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                    </div>
                                    <div id="w-node-_9dc36966-305e-8d33-917d-2dca15cf708e-ec2cb5b0" class="form-column">
                                        <input class="form-input-field contact-form-field w-input" maxlength="256"
                                            name="Last-Name" data-name="Last Name" placeholder="Phone no.*" type="tel"
                                            id="Last-Name" required="" style="opacity: 0;"></div>
                                    <div id="w-node-_9dc36966-305e-8d33-917d-2dca15cf7090-ec2cb5b0" class="form-column">
                                        <input class="form-input-field contact-form-field w-input" maxlength="256"
                                            name="Subject" data-name="Subject" placeholder="Subject" type="text"
                                            id="Subject" style="opacity: 0;"></div>
                                    <div id="w-node-_9dc36966-305e-8d33-917d-2dca15cf7092-ec2cb5b0" class="form-column">
                                        <textarea data-name="Message" maxlength="5000" id="Message" name="Message"
                                            placeholder="Write some message here"
                                            class="form-textarea party-member-text-area w-input"></textarea></div>
                                </div><input type="submit" data-wait="Please wait..."
                                    class="button-primary anotther-button party-member-page w-button"
                                    value="Send Message">
                            </form>
                            <div class="w-form-done" tabindex="-1" role="region"
                                aria-label="Wf Form Contact Form success">
                                <div>Thank you! Your submission has been received!</div>
                            </div>
                            <div class="w-form-fail" tabindex="-1" role="region"
                                aria-label="Wf Form Contact Form failure">
                                <div>Oops! Something went wrong while submitting the form.</div>
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

@section('page_script')
<script>

</script>
@endsection

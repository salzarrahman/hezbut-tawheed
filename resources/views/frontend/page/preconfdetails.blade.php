
@extends('frontend.layouts.frontend')
@section('link', 'press-conference')
@section('title', __('Press Conference'))
@section('path', __('Details'))
@section('details', __($preconfdetails->news_title ?? ''))

@section('breadcrumb-section')
<div class="breadcrumb-section">
    <div class="container w-container">
        <div class="breadcrumb-wrapper"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <h1 class="breadcrumb-title">
                {{ __($preconfdetails->news_title ?? '') }}
            </h1>
            <div class="breadcrumb-link-block">
                <a href="/" class="breadcrumb-backlink">Home</a>
                <div class="breadcrunb-slach">/</div>
                <a href="/press-conference" class="breadcrumb-backlink">
                    {{ $preconfdetails['category']['category'] }}
                </a>
                <div class="breadcrunb-slach">/</div>
                <div class="current-page-name">Press Details</div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('content')
<section class="press-conference-section">
    <div class="container w-container">
        <div class="conference-details-wrapper" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <div class="conference-video-block">
                <a href="#" class="conference-video-link w-inline-block w-lightbox" aria-label="open lightbox" aria-haspopup="dialog">
                    <img src="{{ asset($preconfdetails->image ?? '') }}" loading="lazy" alt="" sizes="(max-width: 479px) 100vw, (max-width: 991px) 96vw, (max-width: 1279px) 930px, 1170px" class="conference-video-thumbnail">

                </a>
            </div>

            <div class="conference-details-info-block">
                <div class="conference-details-single-info-block">
                    <div class="info-text">Event Date:</div>
                    <div class="info-value">
                        @php
                            $date = date_format(date_create($blogpost->date ?? ''), 'M d, Y');
                        @endphp
                            {{ $date ?? '' }}
                    </div>
                </div>
                <div class="conference-details-single-info-block">
                    <div class="info-text">{{ __('translate.venu') }}</div>
                    <div class="info-value">{{ $preconfdetails->venue ?? '' }}</div>
                </div>


            </div>
            <div class="conference-richtext-block">
                <div class="conference-richtext w-richtext">
                    <h2>{{ $preconfdetails->news_title ?? '' }}</h2>
                    <p>{!! $preconfdetails->news_details ?? '' !!} </p>
                </div>
            </div>
        </div>

        <div class="blog-details-bottom-block">
            <h4 class="blog-sidebar-title">Comment</h4>
        </div>
        <div class="blog-details-bottom-block">
            @include('frontend.page.comments', ['comments' => $preconfdetails->comments, 'blogpost_id' => $preconfdetails->id])
        </div>
        <div class="contact-wrapper-block">
            <div class="form-block w-form" >
                        @guest
                        <form method="post" action="{{ route('comments.store')}}">
                            @csrf
                            <div class="" >
                                <div class="">
                                    <div class="form-column custom-form-column">
                                        <input type="hidden"class="" name="blogpost_id"  id="name"  value="{{ $preconfdetails->id }}" />
                                        <input type="text" class="custom-form-column-inner"  name="name"  id="name"  placeholder="Name *"  >
                                        <input type="email" class="custom-form-column-inner" name="email" id="email" placeholder="Email *" >
                                        <input type="tel" class="custom-form-column-inner"   name="phone" id="phone" placeholder="Phone no.*">
                                    </div>
                                    <div id="" class="form-column">
                                        <textarea id="body" name="body"placeholder="Write Comment here" class="custom-form-column-textarea"></textarea>
                                    </div>
                                </div>
                                <input style="margin-top: 0;" type="submit" class="button-primary anotther-button form-submit-button w-button" value="Add Comment">
                            </div>
                        </form>
                        @else

                        <form method="post" action="{{ route('comments.store')}}">
                            @csrf
                            <div class="" >
                                <div class="contact-form-grid">
                                    <input type="hidden"class="" name="blogpost_id"  id="name"  value="{{ $preconfdetails->id }}" />
                                    <div id="" class="form-column">
                                        <textarea id="body" name="body"placeholder="Write Comment here" class=""></textarea>
                                    </div>
                                </div>
                                <input type="submit" class="button-primary anotther-button form-submit-button w-button" value="Add Comment">
                            </div>
                        </form>
                        @endif
            </div>
        </div> <!-- End Comment -->

    </div>
</section>




<section class="client-logo-section">
    <div class="container w-container">
        <div class="conference-richtext-block">
            <div class="conference-richtext w-richtext">
                <h2> {{ __('translate.related_post') }}</h2>
            </div>
        </div>
        <div class="client-logo-wrapper">
            <div class="client-logo-inner">
                @foreach($related_post as $key => $item)
                <div class="single-logo">
                    <a  target="_blank" href="{{ $item->link }}" class="single-client-logo w-inline-block">
                        <img src="{{ asset($item->image) }}"loading="lazy" alt="Client Logo" class="client-logo" />
                    </a>
                    <div class="bottomleft">{{ $item->title }}</div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>
<!-- end header-top-section -->


@endsection

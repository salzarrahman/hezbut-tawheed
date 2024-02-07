@extends('frontend.layouts.frontend')

@section('breadcrumb-section')
<div class="breadcrumb-section">
    <div class="container w-container">
        <div class="breadcrumb-wrapper"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <h1 class="breadcrumb-title"> {{ $gallerydetails->title ?? '' }}</h1>
            <div class="breadcrumb-link-block">
                <a href="/" class="breadcrumb-backlink">Home</a>
                <div class="breadcrunb-slach">/</div>
                <a href="/gallery" class="breadcrumb-backlink">Gallery</a>
                <div class="breadcrunb-slach">/</div>
                <div class="current-page-name">Details</div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('content')

<div class="manifesto-section wf-section">
    <div class="container w-container">
        <div class="manifesto-wrapper-block">
            <div class="manifesto-image-block">
                <div class="image-wrapper animate-in">
                    <div class="image-overlay"
                        style="display: none; transform: translate3d(-100%, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    </div>
                    <img src="{{ asset($gallerydetails->future_images ?? '') }}" loading="lazy"
                        sizes="(max-width: 479px) 94vw, (max-width: 991px) 96vw, (max-width: 1279px) 930px, 1170px"
                        alt="about-image" class="media-fit-image"
                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                </div>
                <h4 class="first-block-title">
                    {{ $gallerydetails->title ?? '' }}
                </h4>
                @php
                    $times = date_format(date_create( $gallerydetails->date), 'd M Y');
                @endphp
                <span> venue: {{ $gallerydetails->venue ?? '' }}  {{ $times }}</span>
            </div>

            <div data-current="Tab 10" data-easing="ease" data-duration-in="300" data-duration-out="100"
                class="manifesto-tabs w-tabs">
                <div class="manifesto-tabs-content w-tab-content" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    @foreach($gallerydetails->imagess  as $key => $image)
                        <div data-w-tab="Tab {{$key}}" class="manifesto-tab-pane w-tab-pane w--tab-active" id="w-tabs-0-data-w-pane-{{$key}}"
                            role="tabpanel" aria-labelledby="w-tabs-0-data-w-tab-0">
                            <div class="manifesto-content-wrapper">
                                <div class="manifesto-first-content-block">
                                    <h4 class="first-block-title">
                                        {{ $image->captions ?? '' }}
                                    </h4>
                                    <img src="{{ asset($image->images ?? '') }}" alt="">
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

                <div class="manifesto-tabs-menu w-tab-menu" role="tablist" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    @foreach($gallerydetails->imagess  as $key => $image)
                        <a data-w-tab="Tab {{$key}}" class="manifesto-tab-link border-top-0px w-inline-block w-tab-link"
                            tabindex="-1" id="w-tabs-0-data-w-tab-{{$key}}"
                            href="#w-tabs-0-data-w-pane-{{$key}}" role="tab"
                            aria-controls="w-tabs-0-data-w-pane-{{$key}}" aria-selected="false">
                            <div class="manifesto-tab-text"> {{ $image->captions ?? '' }}</div>
                        </a>
                    {{-- <img src="{{ asset($image->images ?? '') }}" alt=""> <br>
                    {{ $image->captions ?? '' }} <br> --}}
                    @endforeach




                </div>
            </div>



        </div>

    </div>
</div>
@include('frontend.components.logo')
@endsection

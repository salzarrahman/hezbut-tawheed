@extends('frontend.layouts.frontend')

@section('title', __('navigation.gallery') )

@section('breadcrumb-section')
<div class="breadcrumb-section">
    <div class="container w-container">
        <div class="breadcrumb-wrapper"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <h1 class="breadcrumb-title">Blog Page</h1>
            <div class="breadcrumb-link-block"><a href="/" class="breadcrumb-backlink">Home</a>
                <div class="breadcrunb-slach">/</div>
                <div class="current-page-name">Blog</div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('content')
<div class="campaign-section">
    <div class="container w-container">
        <div class="campaign-list-wrapper w-dyn-list">
            <div role="list" class="campaign-list campaign-page w-dyn-items">

                @foreach ($photo_gallery as $key => $item)
                    <div role="listitem" class="campaign-item w-dyn-item">
                        <div class="upcoming-campaign-single-content campaign-page" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                            <div class="upcoming-campaign-thumbnail-block campaign-page">
                                <a href="{{ url('gallery/details/'.$item->id.'/'.$item->title) }}" class="campaign-thumb-link-block w-inline-block">
                                    <img alt="Upcoming Campaign Thumb Image" loading="lazy"
                                    src="{{ asset($item->future_images) ?? '' }}" class="upcoming-campaign-thumbnail-image" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"></a>
                            </div>
                            <div class="upcoming-campaign-single-info-block campaign-page">
                                <div class="campaign-date-title-block campaign-page">
                                    <div class="campaign-title-venue-block">
                                        <a href="{{ url('gallery/details/'.$item->id.'/'.$item->title) }}" class="campaign-title-link-block w-inline-block">
                                            <h4 class="campaign-title" style="color: rgb(51, 51, 51);">
                                               {{$item->title ?? '' }}
                                            </h4>
                                        </a>
                                        <div class="campaign-venue-block">
                                            <div class="campaign-venue-text">{{ __('translate.venue') }}</div>
                                            <div class="campaign-venue-name">
                                                {{ $item->venue ?? '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Pagination Links -->
<div class="d-flex">
    {{ $photo_gallery->links('pagination::coustom') }}
</div>
<!-- End Pagination Links  -->


@include('frontend.components.logo')
@endsection

@extends('frontend.layouts.frontend')

@section('title',  __('navigation.campaign') )


@section('breadcrumb-section')
    <div class="breadcrumb-section">
        <div class="container w-container">
            <div class="breadcrumb-wrapper"style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                <h1 class="breadcrumb-title">Campaign</h1>
                <div class="breadcrumb-link-block">
                    <a href="/" class="breadcrumb-backlink">Home</a>
                    <div class="breadcrunb-slach">/</div>
                    <div class="current-page-name">Campaign</div>
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

        @foreach($campaign as $key => $item)
            <div role="listitem" class="campaign-item w-dyn-item">
                <div class="upcoming-campaign-single-content campaign-page" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    <div class="upcoming-campaign-thumbnail-block campaign-page">
                        <a href="{{ url('blog/details/'.$item->id.'/'.$item->news_title_slug) }}" class="campaign-thumb-link-block w-inline-block">
                            <img src="{{ asset($item->image) }}" alt="  {{ $item->news_title ?? '' }}" loading="lazy"class="upcoming-campaign-thumbnail-image" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        </a>
                    </div>
                    <div class="upcoming-campaign-single-info-block campaign-page">
                        <div class="campaign-date-title-block campaign-page">
                            <div class="campaign-date-block">
                                @php
                                    $times = date_format(date_create($item->date), 'M d');
                                @endphp

                                <div class="campaign-date">{{ $times }}</div>
                            </div>
                            <div class="campaign-title-venue-block">
                                <a href="{{ url('blog/details/'.$item->id.'/'.$item->news_title_slug) }}"
                                    class="campaign-title-link-block w-inline-block">
                                    <h4 class="campaign-title" style="color: rgb(51, 51, 51);">
                                        {{ $item->news_title ?? '' }}
                                    </h4>
                                </a>
                                <div class="campaign-venue-block">
                                    <div class="campaign-venue-text">  {{ __('translate.venue') }} </div>
                                    <div class="campaign-venue-name"> {{ $item->venue ?? '' }}</div>
                                </div>
                            </div>
                        </div>
                        <p class="campaign-summary">
                             {!! (Str::limit($item->news_details ?? '',190)) !!}
                        </p>
                        <a href="{{ url('blog/details/'.$item->id.'/'.$item->news_title_slug) }}" class="single-blog-read-more-button">Read more</a>

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
    {{ $campaign->links('pagination::coustom') }}
</div>
<!-- End Pagination Links  -->
@include('frontend.components.logo')
@endsection
@section('scripts')
@parent



@endsection



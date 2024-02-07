@extends('frontend.layouts.frontend')

@section('breadcrumb-section')
    <div class="breadcrumb-section">
        <div class="container w-container">
            <div class="breadcrumb-wrapper"style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                <h1 class="breadcrumb-title">Issues</h1>
                <div class="breadcrumb-link-block">
                    <a href="/" class="breadcrumb-backlink">Home</a>
                    <div class="breadcrunb-slach">/</div>
                    <div class="current-page-name">Issues</div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')

<div class="issues-section">
    <div class="container w-container">
        <div class="issues-list-wrapper w-dyn-list">
            <div role="list" class="issues-list w-dyn-items">

                @foreach($issues as $key => $item)
                    <div role="listitem" class="issues-item w-dyn-item">
                        <div class="single-issues-wrapper" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                            <div class="issues-thumbnail-block">
                                <a href="{{ url('blog/details/'.$item->id.'/'.$item->news_title_slug) }}" class="issues-thumbnail-link-block w-inline-block">
                                    <img  src="{{ asset($item->image) }}"  alt="Issues Thumbnail Image" loading="lazy" class="issues-thumbnail-image" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"></a>
                            </div>
                            <div class="issues-content-block">
                                <a href="{{ url('blog/details/'.$item->id.'/'.$item->news_title_slug) }}" class="issues-title-link-block w-inline-block">
                                    <h4 class="issues-title" style="color: rgb(51, 51, 51);">
                                        {{ $item->news_title }}
                                    </h4>
                                </a>
                                <p class="issues-summary">
                                    {!! (Str::limit($item->news_details ?? '',150)) !!}
                                </p>
                                <a href="{{ url('blog/details/'.$item->id.'/'.$item->news_title_slug) }}" class="issues-details-link">Read more</a>
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
    {{ $issues->links('pagination::coustom') }}
</div>
<!-- End Pagination Links  -->
@include('frontend.components.logo')

@endsection

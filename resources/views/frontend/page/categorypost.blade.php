@extends('frontend.layouts.frontend')

@section('breadcrumb-section')
<div class="breadcrumb-section">
    <div class="container w-container">
        <div class="breadcrumb-wrapper"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <h1 class="breadcrumb-title">{{ $breadcat->category ?? '' }}</h1>
            <div class="breadcrumb-link-block">
                <a href="/" class="breadcrumb-backlink">Home</a>
                <div class="breadcrunb-slach">/</div>
                <a href="/blog" class="breadcrumb-backlink">Blog</a>
                <div class="breadcrunb-slach">/</div>
                <div class="current-page-name">{{ $breadcat->category ?? '' }}</div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('content')
<div class="blog-section">
    <div class="container w-container">
        <div class="blog-collection-wrapper w-dyn-list">
            <div role="list" class="blog-collection-list w-dyn-items">
                @foreach($categorypost as $key => $item)
                <div role="listitem" class="blog-collection-item w-dyn-item">
                    <div class="single-blog-wrapper"
                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        <div class="single-blog-thumb-block">
                            <a href="{{ url('blog/details/'.$item->id.'/'.$item->news_title_slug) }}"
                                class="single-blog-link-block w-inline-block">
                                <img src="{{ asset($item->image) }}" alt=" Thumbnail " loading="lazy" class="single-blog-thumbnail-image"
                                    style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"></a>
                        </div>
                        <div class="single-blog-content">
                            <div class="single-blog-meta-block">
                                <div class="author-block">
                                    <div class="blog-author-text">
                                        {{ __('translate.author') }}
                                    </div>
                                    <a href="#" class="author-name">
                                        {{ $item['user']['name'] ?? '' }}
                                    </a>
                                </div>
                                <div class="highpen-block"></div>
                                <div class="blog-date">
                                    @php
                                        $date = date_format(date_create($item->date), 'M d, Y');
                                    @endphp
                                    {{ $date ?? '' }}
                                </div>

                            </div>
                            <a href="{{ url('blog/details/'.$item->id.'/'.$item->news_title_slug) }}"
                                class="single-blog-title-link-block w-inline-block">
                                <h4 class="single-blog-title" style="color: rgb(51, 51, 51);">
                                    {{ $item->news_title ?? '' }}
                                </h4>
                            </a>
                            <a href="{{ url('blog/details/'.$item->id.'/'.$item->news_title_slug) }}"
                                class="single-blog-read-more-button">Read more</a>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>




@include('frontend.components.logo')

@endsection

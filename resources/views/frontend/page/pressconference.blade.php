@php
    $setting    = App\Models\Setting::find(1);
    $category           = App\Models\Category::where('category','Press Conference')->pluck('id')->first();
    $press_coference   =  App\Models\Blogpost::where('status',1)->where('category_id', $category)->orderBy('id', 'DESC')->paginate(3);
@endphp


@extends('frontend.layouts.frontend')

@section('breadcrumb-section')
<div class="breadcrumb-section">
    <div class="container w-container">
        <div class="breadcrumb-wrapper"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <h1 class="breadcrumb-title">{{ __('navigation.press_coference') }}</h1>
            <div class="breadcrumb-link-block">
                <a href="/" class="breadcrumb-backlink">Home</a>
                <div class="breadcrunb-slach">/</div>
                <div class="current-page-name">{{ __('navigation.press_coference') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('content')
<section class="press-conference-section">
    <div class="container w-container">
        <div class="conference-details-wrapper" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <div class="press-conference-list-wrapper w-dyn-list">
                <div role="list" class="press-conference-list press-conference-page w-dyn-items">

                @foreach($press_coference as $key => $item)
                    <div role="listitem" class="press-conference-item w-dyn-item">

                        <div class="">
                            <a href="{{ url('press-conference/details/'.$item->id.'/'.$item->news_title_slug) }}"
                                class="single-blog-link-block w-inline-block">
                                <img alt=" Thumbnail " loading="lazy" src="{{ asset($item->image) }}" class="single-blog-thumbnail-image"
                                    style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"></a>
                        </div>

                        <div class="press-conference-inner" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                            <a href="{{ url('press-conference/details/'.$item->id.'/'.$item->news_title_slug) }}"  class="confarebce-link-block press-conference-page w-inline-block">
                                <h4 class="confarence-title press-conference-page" style="color: rgb(51, 51, 51);">
                                    {{ $item->news_title  ?? ''}}
                                 </h4>
                            </a>

                            <div class="confarence-date-block press-conference-page">
                                <div class="party-name press-conference-page">{{ $setting->site_title ?? '' }} </div>
                                <div class="confarence-date press-conference-page">
                                    @php
                                        $date = date_format(date_create($item->date), 'F d, Y');
                                    @endphp

                                    {{ $date ?? '' }}

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pagination Links -->
<div class="d-flex" style="margin-top: 50px;">
    {{ $press_coference->links('pagination::coustom') }}
</div>
<!-- End Pagination Links  -->


@include('frontend.components.logo')

@endsection

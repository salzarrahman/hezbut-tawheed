@extends('frontend.layouts.frontend')


<style>
    .column1 {
        width: 70%;
        float: left;
    }

    .column2 {
        width: 30%;
        float: right;
        margin: 0%;
    }

    .search-result-wrapper {
        margin-top: 0px;
    }
</style>


@section('breadcrumb-section')
<div class="breadcrumb-section">
    <div class="container w-container">
        <div class="breadcrumb-wrapper"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <h1 class="breadcrumb-title">Search results</h1>
            <div class="breadcrumb-link-block">
                <a href="/" class="breadcrumb-backlink">Home</a>
                <div class="breadcrunb-slach">/</div>
                <div class="current-page-name">Search results</div>
            </div>
            <div class="blog-sidebar-content">
                <form action="/search" class="blog-sidebar-search-wrapper w-form">
                    <input class="blog-sidebar-input-field w-input" maxlength="256" name="query"
                        placeholder="Keywords here" type="search" id="search" required="">
                    <input type="submit" class="blog-sidebar-search-button w-button" value="Search">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="search-section">
    <div class="container w-container">
        <div class="column1"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <div class="search-result-wrapper">
                <div class="search-result-list search-result-items">
                    @foreach($search as $item)
                    <div
                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        <h4>
                            <a href="{{ url('blog/details/'.$item->id.'/'.$item->news_title_slug) }}"
                                class="search-result-link">
                                {{ GoogleTranslate::trans($item->news_title, app()->getLocale() ) }}
                            </a>
                        </h4>

                        <div> Category:
                            <a href="{{ url('/blog/category/' . $item['category']['id'] . '/' . $item['category']['category_slug']) }}"
                                class="author-name">
                                {{ $item['category']['category'] }}
                            </a>

                            @if ($item->subcategory_id == null)
                            <a href=" "></a>
                            @else
                            Subcategory:

                            <a
                                href="{{ url('/blog/subcategory/' . $item['subcategory']['id'] . '/' . $item['subcategory']['slug']) }}">
                                / {{ $item['subcategory']['name'] ?? '' }}
                            </a>
                            @endif
                        </div>
                        <p>
                            {!! (Str::limit($item->news_details ?? '',220)) !!}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="column2"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <span>Popular post</span>
            <hr>
            @foreach ($searchpopular as $key => $item)

            @endforeach
            <hr>
            <span>Category</span>
            <hr>
            @foreach ($categorys as $key => $item)

            @endforeach
            <hr>
        </div>

    </div>
</div>


@include('frontend.components.logo')

@endsection

@extends('frontend.layouts.frontend')

@section('breadcrumb-section')
    <div class="breadcrumb-section">
        <div class="container w-container">
            <div class="breadcrumb-wrapper"
                style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                <h1 class="breadcrumb-title"> {{ $blogpost->news_title }}</h1>
                <div class="breadcrumb-link-block">
                    <a href="/" class="breadcrumb-backlink">Home</a>
                    <div class="breadcrunb-slach">/</div>
                    <a href="/blog" class="breadcrumb-backlink">Blog</a>
                    <div class="breadcrunb-slach">/</div>
                    <div class="current-page-name">Details</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_style')
    @include('frontend.layouts.pagecss')
@endsection


@section('content')



    <div class="blog-section">
        <div class="container w-container">
            <div class="blog-details-wrapper">
                <div class="blog-details-content-block"
                    style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotate(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">

                    <div class="custom_category">
                        <div class="custom-category-style">{{ __('translate.category') }}</div>
                        <a href="{{ url('/blog/category/' . $blogpost['category']['id'] . '/' . $blogpost['category']['category_slug']) }}"
                            class="author-name">
                            {{ $blogpost['category']['category'] }}
                        </a>
                        @if ($blogpost->subcategory_id == null)
                            <a href=" "></a>
                        @else
                            <a
                                href="{{ url('/blog/subcategory/' . $blogpost['subcategory']['id'] . '/' . $blogpost['subcategory']['slug']) }}">
                                / {{ $blogpost['subcategory']['name'] ?? '' }}
                            </a>
                        @endif
                    </div> <!-- End Custom category -->

                    <div class="blog-details-image-block">
                        <div class="image-wrapper animate-in">
                            <div class="image-overlay"
                                style="display: none; transform: translate3d(-100%, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                            </div>
                            <img loading="lazy" src="{{ asset($blogpost->image ?? '') }}" alt="about-image"
                                sizes="(max-width: 479px) 100vw, (max-width: 991px) 96vw, (max-width: 1279px) 530px, 750px"
                                class="media-fit-image"
                                style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        </div>
                    </div>
                    <div class="single-blog-meta-block blog-details-meta">
                        <div class="author-block">
                            <div class="blog-author-text">{{ __('translate.author') }}</div>
                            <a href="#" class="author-name">
                                {{ $blogpost['user']['name'] ?? '' }}
                            </a>
                        </div>

                        <div class="highpen-block"></div>
                        <div class="blog-date">
                            @php
                                $date = date_format(date_create($blogpost->date ?? ''), 'M d, Y');
                            @endphp
                            {{ $date ?? '' }}
                        </div>

                        <span class="material-symbols-outlined read-count">
                            visibility
                        </span class="">
                        {{ $blogpost->view_count }} Read

                    </div>

                    <button id="btn-decrease" type="button" value="decrease" class="decreaseFont custom-font-size"> -
                    </button>
                    <button id="btn-orig" type="button" value="increase" class="increaseFont custom-font-size"> A
                    </button>
                    <button id="btn-increase" type="button" value="increase" class="increaseFont custom-font-size"> +
                    </button>

                    <div class="custom-post-pera">
                        {!! $blogpost->news_details ?? '' !!}
                    </div>

                    <div class="blog-details-bottom-block custom-tag-section">
                        <div class="blog-details-tag-block">
                            <div class="blog-details-bottom-title">Tag:</div>
                            <div class="blog-details-tag-list-wrapper w-dyn-list">
                                <div role="list" class="blog-details-tag-list w-dyn-items">
                                    @foreach ($tagss as $key => $item)
                                        <div role="listitem" class="blog-details-tag-list-item w-dyn-item">
                                            <a href="#" class="tag-link">{{ ucwords($item) }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="blog-details-social-block">
                            <div class="blog-details-social-list">

                                @include('vendor.share.socialshare')

                            </div>
                        </div>
                    </div>

                    <div class="blog-details-bottom-block">
                        <h4 class="blog-sidebar-title">Comment</h4>
                    </div>

                    <div class="blog-details-bottom-block">
                        @include('frontend.page.comments', [
                            'comments' => $blogpost->comments,
                            'blogpost_id' => $blogpost->id,
                        ])
                    </div>

                    <div class="contact-wrapper-block">
                        <div class="form-block w-form">
                            @guest
                                <form method="post" action="{{ route('comments.store') }}">
                                    @csrf
                                    <div class="">
                                        <div class="">
                                            <div class="form-column custom-form-column">
                                                <input type="hidden"class="" name="blogpost_id" id="name"
                                                    value="{{ $blogpost->id }}" />
                                                <input type="text" class="custom-form-column-inner" name="name"
                                                    id="name" placeholder="Name *">
                                                <input type="email" class="custom-form-column-inner" name="email"
                                                    id="email" placeholder="Email *">
                                                <input type="tel" class="custom-form-column-inner" name="phone"
                                                    id="phone" placeholder="Phone no.*">
                                            </div>
                                            <div id="" class="form-column">
                                                <textarea id="body" name="body"placeholder="Write Comment here" class="custom-form-column-textarea"></textarea>
                                            </div>
                                        </div>
                                        <input style="margin-top: 0;" type="submit"
                                            class="button-primary anotther-button form-submit-button w-button"
                                            value="Add Comment">
                                    </div>
                                </form>
                            @else
                                <form method="post" action="{{ route('comments.store') }}">
                                    @csrf
                                    <div class="">
                                        <div class="contact-form-grid">
                                            <input type="hidden"class="" name="blogpost_id" id="name"
                                                value="{{ $blogpost->id }}" />
                                            <div id="" class="form-column">
                                                <textarea id="body" name="body"placeholder="Write Comment here" class=""></textarea>
                                            </div>
                                        </div>
                                        <input type="submit"
                                            class="button-primary anotther-button form-submit-button w-button"
                                            value="Add Comment">
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div> <!-- End Comment -->

                        <div class="blog-details-bottom-block" style="border: none;">
                            <div class="agenda-schedule-block">
                                <h2 class="agenda-schedule-title">{{ __('translate.related_post') }}</h2>
                                <div class="agenda-wrapper-details">

                                    @foreach ($related_post as $key => $item)
                                        <div class="agenda-schedule-single-block">
                                            <div class="spaker-thumb-block">
                                                <img alt="Speaker Image " loading="lazy"
                                                    src="{{ asset($item->image ?? '') }}">
                                            </div>
                                            <div class="speaker-details-block">
                                                <a href="{{ url('blog/details/' . $item->id . '/' . $item->news_title_slug) }}">
                                                    <h4 class="agenda-title">
                                                        {{ $item->news_title ?? '' }}
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="blog-details-sidebar"
                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">

                        <div class="single-sidebar-block">
                            <div class="blog-sidebar-title-block">
                                <h4 class="blog-sidebar-title">Search</h4>
                                <div class="blog-title-bottom-border"></div>
                            </div>
                            <div class="blog-sidebar-content">
                                <form method="post" action="{{ route('search.results') }}"
                                    class="blog-sidebar-search-wrapper w-form">
                                    @csrf
                                    <input class="blog-sidebar-input-field w-input" maxlength="256" name="search"
                                        placeholder="Type to Search..." type="search" id="search" required="">
                                    <button type="submit" class="blog-sidebar-search-button w-button"> Search</button>
                                </form>
                            </div>
                        </div>

                        <div class="single-sidebar-block">
                            <div class="blog-sidebar-title-block">
                                <h4 class="blog-sidebar-title">Categories</h4>
                                <div class="blog-title-bottom-border"></div>
                            </div>
                            <div class="blog-sidebar-content">
                                <div class="blog-details-category-wrapper w-dyn-list">
                                    <div role="list" class="blog-details-category-list w-dyn-items">
                                        @foreach ($categorys as $key => $item)
                                            <div role="listitem" class="blog-details-category-item w-dyn-item">
                                                <a href="{{ url('/blog/category/' . $item->id . '/' . $item->category_slug) }}"
                                                    class="blog-details-category-link">
                                                    {{ $item->category }}
                                                </a>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="single-sidebar-block">
                            <div class="blog-sidebar-title-block">
                                <h4 class="blog-sidebar-title">Popular Post</h4>
                                <div class="blog-title-bottom-border"></div>
                            </div>
                            <div class="blog-sidebar-content">
                                @foreach ($newspopular as $key => $item)
                                    <div class="popular__post">
                                        <div class="popular__post__img ">
                                            <img width="100%" src="{{ asset($item->image ?? '') }}" alt="">
                                        </div>
                                        <div class="">
                                            <a href="{{ url('blog/details/' . $item->id . '/' . $item->news_title_slug) }}"
                                                class="blog-sidebar-post-link-block w-inline-block">
                                                <h4 class="blog-sidebar-post-title side-post-link">
                                                    {{ $item->news_title ?? '' }}
                                                </h4>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="single-sidebar-block">
                            <div class="blog-sidebar-title-block">
                                <h4 class="blog-sidebar-title">Recent Post</h4>
                                <div class="blog-title-bottom-border"></div>
                            </div>
                            <div class="blog-sidebar-content">
                                <div class="w-dyn-list">
                                    <div role="list" class="blog-sidebar-content-post-list w-dyn-items">

                                        @foreach ($recent_post as $key => $item)
                                            <div role="listitem" class="w-dyn-item">
                                                <div class="blog-sidebar-post-wrapper side-post-link">
                                                    <div class="blog-sidebar-post-date">
                                                        <div class="blog-sidebar-post-date-text">
                                                            @php
                                                                $date = date_format(date_create($item->date), 'M d');
                                                            @endphp
                                                            {{ $date ?? '' }}
                                                        </div>
                                                    </div>
                                                    <a href="{{ url('blog/details/' . $item->id . '/' . $item->news_title_slug) }}"
                                                        class="blog-sidebar-post-link-block w-inline-block">
                                                        <h4 class="blog-sidebar-post-title">
                                                            {{ $item->news_title ?? '' }}
                                                        </h4>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="single-sidebar-block">
                            <div class="blog-sidebar-title-block">
                                <h4 class="blog-sidebar-title">Tags</h4>
                                <div class="blog-title-bottom-border"></div>
                            </div>
                            <div class="blog-sidebar-content">
                                <div class="sidebar-tag-wrapper w-dyn-list">
                                    <div role="list" class="sidebar-tag-list w-dyn-items">

                                        @foreach ($blogpost as $key => $item)
                                            <div role="listitem" class="sidebar-tag-item w-dyn-item">
                                                <a href="#" class="sidebar-tag-link">{{ ucwords($item) }}</a>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script>
            var affectedElements = document.querySelectorAll("p, h1, h2, h3, h4, h5, h6");

            // Storing the original size in a data attribute so size can be reset
            affectedElements.forEach(function(element) {
                element.dataset.origSize = window.getComputedStyle(element).fontSize;
            });

            // Increase Font Size Button
            document.getElementById("btn-increase").addEventListener("click", function() {
                changeFontSize(1);
            });

            // Decrease Font Size Button
            document.getElementById("btn-decrease").addEventListener("click", function() {
                changeFontSize(-1);
            });

            // Reset Font Size Button
            document.getElementById("btn-orig").addEventListener("click", function() {
                affectedElements.forEach(function(element) {
                    element.style.fontSize = element.dataset.origSize;
                });
            });

            // Change Font Size Function
            function changeFontSize(direction) {
                affectedElements.forEach(function(element) {
                    var currentSize = parseFloat(window.getComputedStyle(element).fontSize);
                    element.style.fontSize = currentSize + direction + "px";
                });
            }
        </script>


        @include('frontend.components.logo')
    @endsection

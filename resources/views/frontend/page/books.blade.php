@php
    $party_member       =  App\Models\PartyMember::limit(4)->get();
    $mission            = App\Models\Mission::find(1);
    $mission_loop       = App\Models\Mission::where('status',1)->limit(7)->get();
@endphp

@extends('frontend.layouts.frontend')

@section('breadcrumb-section')
    <div class="breadcrumb-section">
        <div class="container w-container">
            <div class="breadcrumb-wrapper"style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                <h1 class="breadcrumb-title">Books </h1>
                <div class="breadcrumb-link-block">
                    <a href="/" class="breadcrumb-backlink">Home</a>
                    <div class="breadcrunb-slach">/</div>
                    <div class="current-page-name">Books</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_style')
    @include('frontend.layouts.pagecss')
@endsection

@section('content')


<div class="party-member-section">
    <div class="container w-container">
        <div class="party-member-list-wrapper w-dyn-list">
            <div role="list" class="party-member-list w-dyn-items">

            @foreach ($books as $key => $item)
                <div role="listitem" class="party-member-item w-dyn-item">
                    <div class="single-party-member-wrapper" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        <div class="party-member-thumbnail-block">
                            <img src="{{ asset($item->cover_image) }}" loading="lazy" alt="" class="party-member-thumb" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        </div>
                        <div class="party-member-content-block">
                            <div class="party-member-content"
                                style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; opacity: 1;">
                                <a href="{{ url('books/details/'.$item->id.'/'.$item->title_slug) }}" class="party-member-link-block w-inline-block">
                                    <h4 class="party-member-title">{{ $item->title }}</h4>
                                </a>
                                <div class="party-member-position-text">{{ $item->authors }}</div>
                            </div>
                            <a href="{{ url('books/details/'.$item->id.'/'.$item->title_slug) }}" class="button-primary party-member-button" style="opacity: 0; transform: translate3d(0px, 100%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">View
                                Books</a>
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

@section('page_script')
<script>

</script>
@endsection

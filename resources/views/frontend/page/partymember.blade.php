
@extends('frontend.layouts.frontend')


@section('breadcrumb-section')
<div class="breadcrumb-section">
    <div class="container w-container">
        <div class="breadcrumb-wrapper"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <h1 class="breadcrumb-title">{{ __('navigation.party_members') }}</h1>
            <div class="breadcrumb-link-block">
                <a href="/" class="breadcrumb-backlink">Home</a>
                <div class="breadcrunb-slach">/</div>
                <div class="current-page-name">{{ __('navigation.party_members') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('content')

<div class="party-member-section">
    <div class="container w-container">
        <div class="party-member-list-wrapper w-dyn-list">
            <div role="list" class="party-member-list w-dyn-items">

            @foreach ($party_member as $key => $item)
                <div role="listitem" class="party-member-item w-dyn-item">
                    <div class="single-party-member-wrapper" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        <div class="party-member-thumbnail-block">
                            <img src="{{ asset($item->image) }}" loading="lazy" alt="" class="party-member-thumb" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        </div>
                        <div class="party-member-content-block">
                            <div class="party-member-content"
                                style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; opacity: 1;">
                                <a href="{{ url('party-member/'.$item->slug_name) }}" class="party-member-link-block w-inline-block">
                                    <h4 class="party-member-title">{{ $item->name }}</h4>
                                </a>
                                <div class="party-member-position-text">{{ $item->designation }}</div>
                            </div><a href="{{ url('party-member/'.$item->slug_name) }}" class="button-primary party-member-button"
                                style="opacity: 0; transform: translate3d(0px, 100%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">View
                                Profile</a>
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
    {{ $party_member->links('pagination::coustom') }}
</div>
<!-- End Pagination Links  -->


@include('frontend.components.logo')

@endsection

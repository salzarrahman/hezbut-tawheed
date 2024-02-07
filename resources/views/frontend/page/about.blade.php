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
                <h1 class="breadcrumb-title">About us</h1>
                <div class="breadcrumb-link-block">
                    <a href="/" class="breadcrumb-backlink">Home</a>
                    <div class="breadcrunb-slach">/</div>
                    <div class="current-page-name">About</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_style')
    @include('frontend.layouts.pagecss')
@endsection

@section('content')

<div class="about-section">
    <div class="container w-container">
        <div class="about-wrapper">
            <div class="about-left-block">
                <div class="image-wrapper animate-in">
                    <div class="image-overlay" style="display: none; transform: translate3d(-100%, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    </div>
                    <img src="{{ asset($abouts[0]['image']) }}" loading="lazy" alt="about-image" class="media-fit-image"style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                </div>
            </div>
            <div class="about-right-block">
                <div class="section-title-block"
                    style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    <h2 class="section-title about-title">
                       {{ $abouts[0]['title'] }}
                    </h2>

                </div>
                <div class="about-content-block">
                    <div class="about-single-contrent" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        {!! $abouts[0]['summary'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
    <div class="container w-container">
        <div class="about-wrapper">
            <div class="about-left-block">
                <div class="section-title-block" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                <h2 class="section-title about-title">
                   {{ $abouts[1]['title'] }}
                </h2>

            </div>
            <div class="about-content-block">
                <div class="about-single-contrent" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    {!! $abouts[1]['summary'] !!}
                </div>
            </div>
            </div>
            <div class="about-right-block">
                <div class="image-wrapper animate-in">
                    <div class="image-overlay" style="display: none; transform: translate3d(-100%, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    </div>
                    <img src="{{ asset($abouts[1]['image']) }}" loading="lazy" alt="about-image" class="media-fit-image"style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                </div>
            </div>
        </div>
    </div>
<br>
    <div class="container w-container">
        <div class="about-wrapper">
            <div class="about-left-block">
                <div class="image-wrapper animate-in">
                    <div class="image-overlay" style="display: none; transform: translate3d(-100%, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    </div>
                    <img src="{{ asset($abouts[2]['image']) }}" loading="lazy" alt="about-image" class="media-fit-image"style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                </div>
            </div>
            <div class="about-right-block">
                <div class="section-title-block"
                    style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    <h2 class="section-title about-title">
                       {{ $abouts[2]['title'] }}
                    </h2>

                </div>
                <div class="about-content-block">
                    <div class="about-single-contrent" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        {!! $abouts[2]['summary'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
    <div class="container w-container">
        <div class="about-wrapper">
            <div class="about-left-block">
                <div class="section-title-block" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                <h2 class="section-title about-title">
                {{ $abouts[3]['title'] }}
                </h2>

            </div>
            <div class="about-content-block">
                <div class="about-single-contrent" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    {!! $abouts[3]['summary'] !!}
                </div>
            </div>
            </div>
            <div class="about-right-block">
                <div class="image-wrapper animate-in">
                    <div class="image-overlay" style="display: none; transform: translate3d(-100%, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    </div>
                    <img src="{{ asset($abouts[3]['image']) }}" loading="lazy" alt="about-image" class="media-fit-image"style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                </div>
            </div>
        </div>
    </div>
<br>
    <div class="container w-container">
        <div class="about-wrapper">
            <div class="about-left-block">
                <div class="image-wrapper animate-in">
                    <div class="image-overlay" style="display: none; transform: translate3d(-100%, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    </div>
                    <img src="{{ asset($abouts[4]['image']) }}" loading="lazy" alt="about-image" class="media-fit-image"style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                </div>
            </div>
            <div class="about-right-block">
                <div class="section-title-block"
                    style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    <h2 class="section-title about-title">
                       {{ $abouts[4]['title'] }}
                    </h2>

                </div>
                <div class="about-content-block">
                    <div class="about-single-contrent" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        {!! $abouts[4]['summary'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.components.abilities')


<div class="our-mission-content-block about-page">
    <div class="join-our-movement-title-block">
        <div class="section-title-block section-block-center">
            <h2 class="section-title theme-color">
                {{$mission->title ?? ''}}
            </h2>
            <p class="section-summary about-page">
                {{$mission->summary ?? ''}}
            </p>
        </div>
    </div>


    <div class="our-mission-content-wrapper about-page">
        @foreach($mission_loop as $key => $item)
        @if($loop->first)

        @else
        <div class="our-mission-single-content about-page">
            <div class="our-mission-content-icon-block png-container">
                <img src="{{ asset($item->image ?? '') }}" loading="lazy" alt="Our Mission Icon" class="our-mission-icon text-bg-info" />
            </div>
            <div class="our-mission-single-content-block">
                <h4 class="our-mission-single-content-title about-page">{{ $item->title ?? '' }}</h4>
                <p class="our-mission-single-content-summary">
                    {{ $item->summary ?? '' }}
                </p>
            </div>
        </div>
        @endif
        @endforeach

    </div>
</div>

<div class="party-member-section">
    <div class="container w-container">

        <div class="party-member-title-block">
            <div class="section-title-block section-block-center">
                <h2 class="section-title">{{ __('navigation.central_committee_H') }}</h2>
                <p class="section-summary plr-15px">
                    To make sure all Citizen rights, you have to work together
                    and make better country for our child. So we have to take initiative proper
                </p>
            </div>
        </div>

        <div class="party-member-list-wrapper w-dyn-list">
            <div role="list" class="party-member-list w-dyn-items">
                @foreach($party_member as $key => $item)
                <div role="listitem" class="party-member-item w-dyn-item">
                    <div class="single-party-member-wrapper">
                        <div class="party-member-thumbnail-block">
                            <img src="{{ asset($item->image) }}"loading="lazy" alt="" class="party-member-thumb" />
                            </div>
                        <div class="party-member-content-block">
                            <div class="party-member-content">
                                <a href="{{ url('party-member/'.$item->slug_name) }}"
                                    class="party-member-link-block w-inline-block">
                                    <h4 class="party-member-title">{{ $item->name ?? '' }}</h4>
                                </a>
                                <div class="party-member-position-text">{{ __($item->designation) }}</div>
                            </div>
                            <a href="{{ url('party-member/'.$item->slug_name) }}" class="button-primary party-member-button">View Profile</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <div class="party-button-block">
            <a href="/party-member" class="button-primary anotther-button">{{ __('navigation.central_committee_A') }}</a>
        </div>
    </div>
</div>


@include('frontend.components.logo')

@endsection

@section('page_script')
<script>

</script>
@endsection

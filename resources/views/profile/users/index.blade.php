@extends('frontend.layouts.frontend')

@section('title','User')

@section('content')

<div class="breadcrumb-section">
    <div class="container w-container">
        <div class="breadcrumb-wrapper"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <h1 class="breadcrumb-title">{{ $users->name }}</h1>
            <div class="breadcrumb-link-block">
                <a href="#" class="breadcrumb-backlink">Home</a>
                <div class="breadcrunb-slach">/</div>
                <a href="/party-members" class="breadcrumb-backlink">
                        {{Request::segment(1)}}
                </a>
                <div class="breadcrunb-slach">/</div>
                <div class="current-page-name">{{ $users->name }}</div>
            </div>
        </div>
    </div>
</div>

@endsection

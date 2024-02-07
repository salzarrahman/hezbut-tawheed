@extends('frontend.layouts.frontend')

@section('breadcrumb-section')
<div class="breadcrumb-section">
    <div class="container w-container">
        <div class="breadcrumb-wrapper"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <h1 class="breadcrumb-title">Blog Page</h1>
            <div class="breadcrumb-link-block"><a href="/" class="breadcrumb-backlink">Home</a>
                <div class="breadcrunb-slach">/</div>
                <div class="current-page-name">Blog</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')



@include('frontend.components.logo')

@endsection


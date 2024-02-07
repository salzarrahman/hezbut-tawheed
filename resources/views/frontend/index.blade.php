@extends('frontend.layouts.frontend')

@section('title','Home')

@section('content')

        @include('frontend.components.slider')
        @include('frontend.components.feature')
        @include('frontend.components.about')
        @include('frontend.components.movement')
        @include('frontend.components.mission')
        @include('frontend.components.abilities')
        @include('frontend.components.press-image')
        @include('frontend.components.campaign')
        @include('frontend.components.press-tweet-volunteer')
        @include('frontend.components.blog')
        @include('frontend.components.logo')

@endsection

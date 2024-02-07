@php
$segmentone = Str::ucfirst(Request::segment(2));
$segmenttwo = Str::ucfirst(Request::segment(3));
$segmentthree = Str::ucfirst(Request::segment(4));
$specialCharacters = ['@', '#', '$', '%', '&', '-', '_'];
$segment_one = str_replace($specialCharacters, ' ', $segmentone);
$segment_two = str_replace($specialCharacters, ' ', $segmenttwo);
$segment_three = str_replace($specialCharacters, ' ', $segmentthree);
@endphp

@extends('backend.layouts.backend')

@section('page_title', 'Cache Clear')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)

@section('page_style')

@endsection

@section('page-content')

<div class="card">
    <div class="card-body">
        <div class="row  text-center">
            <div class="col-md-3">
                <a class="btn btn_deeptouchit" href="{{ route('admin.settings.cache.clear')}}">
                    Clear Cache
                </a>
            </div>
            <div class="col-md-3">
                <a class="btn btn_deeptouchit "
                href="{{ route('admin.settings.clear.route')}}">Route cleared
            </a>
            </div>
            <div class="col-md-3">
                <a class="btn btn_deeptouchit " href="{{ route('admin.settings.clear.view')}}">View
                    cleared
                </a>
            </div>
            <div class="col-md-3">
                <a class="btn btn_deeptouchit "
                href="{{ route('admin.settings.clear.optimize')}}">Optimize cleared
            </a>
            </div>
    </div>
    </div>
</div>

@endsection
@section('scripts')

@endsection

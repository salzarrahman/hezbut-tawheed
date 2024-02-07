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

@section('page_title', 'File Manager')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)

@section('breadcrumb_sub_link')

@endsection

@section('page_style')
<link href="{{ asset('vendor/file-manager/css/file-manager.css') }}" rel="stylesheet">
@endsection
@section('page-content')


<div class="card" style="min-height: 900px;">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" id="fm-main-block">
                <div id="fm" style="min-height: 800px"></div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
@parent
<!-- File manager -->
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');
        fm.$store.commit('fm/setFileCallBack', function(fileUrl) {
            window.opener.fmSetLink(fileUrl);
            window.close();
        });
    });
</script>
@endsection

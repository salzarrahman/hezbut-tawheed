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

@section('page_title', 'Party Member')

@section('breadcrumb_link_one',$segment_one)
@section('breadcrumb_link_two',$segment_two)

@section('breadcrumb_sub_link')


@endsection


@section('page_style')

@endsection

@section('page-content')

@endsection
@section('scripts')
@parent



@endsection

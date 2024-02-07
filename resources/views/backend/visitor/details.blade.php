


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
@section('page_title', 'Visitor')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)

@section('breadcrumb_sub_link')

@endsection
@section('page_style')


@endsection
@section('page-content')

<div class="card">
    <div class="card-body border p-3 rounded">
        <table class=" table table-bordered">
            <tr>
                <th>Date</th>
                <td>:</td>
                <td>{{ $visitor->date }}</td>
            </tr>
            <tr>
                <th>Ip Address</th>
                <td>:</td>
                <td>{{ $visitor->ip_address }}</td>
            </tr>
            <tr>
                <th>Location</th>
                <td>:</td>
                <td>{{ $visitor->location }}</td>
            </tr>
            <tr>
                <th>Country</th>
                <td>:</td>
                <td>{{ $visitor->country }}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>:</td>
                <td>{{ $visitor->city }}</td>
            </tr>
        </table>

    </div>
</div>






@endsection
@section('scripts')
@parent


@endsection

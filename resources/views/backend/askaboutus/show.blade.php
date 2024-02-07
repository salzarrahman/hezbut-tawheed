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
@section('page_title', 'Ask about us')
@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)

@section('breadcrumb_sub_link')

@endsection
@section('page_style')


@endsection
@section('page-content')

<div class="card">
    <div class="card-body border p-3 rounded">
        <table>
            <tr>
                <th>Name</th>
                <td>:</td>
                <td>{{ $askaboutus->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>:</td>
                <td>{{ $askaboutus->email }}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>:</td>
                <td>{{ $askaboutus->mobile_no }}</td>
            </tr>
            <tr>
                <th>Message</th>
                <td>:</td>
                <td>{{ $askaboutus->message }}</td>
            </tr>
        </table>

    </div>
</div>






@endsection
@section('scripts')
@parent


@endsection



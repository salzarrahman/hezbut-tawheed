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
        <table class=" table">
            <tr>
                <th>Name</th>
                <td>:</td>
                <td>{{ $joining->name }}</td>
            </tr>
            <tr>
                <th>Date of birth</th>
                <td>:</td>
                <td>{{ $joining->date_of_birth }}</td>
            </tr>
            <tr>
                <th>Father/Husband</th>
                <td>:</td>
                <td>{{ $joining->father_or_husband }}</td>
            </tr>
            <tr>
                <th>Mobile no</th>
                <td>:</td>
                <td>{{ $joining->mobile_no }}</td>
            </tr>
            <tr>
                <th>Present address</th>
                <td>:</td>
                <td>{{ $joining->present_address }}</td>
            </tr>
            <tr>
                <th>Permanent address</th>
                <td>:</td>
                <td>{{ $joining->permanent_address }}</td>
            </tr>
            <tr>
                <th>Occupation</th>
                <td>:</td>
                <td>{{ $joining->occupation }}</td>
            </tr>
            <tr>
                <th>Education</th>
                <td>:</td>
                <td>{{ $joining->education }}</td>
            </tr>
            <tr>
                <th>Experience</th>
                <td>:</td>
                <td>{{ $joining->experience }}</td>
            </tr>
            <tr>
                <th>Experience</th>
                <td>:</td>
                <td>{{ $joining->experience }}</td>
            </tr>
            <tr>
                <th>Find movement</th>
                <td>:</td>
                <td>{{ $joining->find_movement }}</td>
            </tr>
            <tr>
                <th>Person name</th>
                <td>:</td>
                <td>{{ $joining->person_name }}</td>
            </tr>
            <tr>
                <th>Person mobile</th>
                <td>:</td>
                <td>{{ $joining->person_mobile_no }}</td>
            </tr>
        </table>

    </div>
</div>






@endsection
@section('scripts')
@parent


@endsection



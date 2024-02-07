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

@section('page_title', 'Roles Create')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)

@section('page_style')

@endsection

@section('page-content')
<div class="card">
    <div class="card-body">
        <div class="border p-3 rounded">
            <h6 class="mb-0 ">Add Role </h6>
            <hr>
            <form id="myForm" method="post" action="{{ route('admin.roles.store') }}">
                @csrf

                <div class="row g-2">

                    <div class="from-group mb-3">
                        <label class="form-label"> Role Name</label>
                        <input class="form-control" type="text" name="name" id="name">

                    </div>


                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection

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

@section('page_title', 'Edit Role')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)
@section('breadcrumb_link_two', $segment_three)




@section('page_style')


@endsection

@section('page-content')


    <div class="card">
        <div class="card-header">
            <h6 class="mb-0 ">Update Role</h6>
        </div> <!-- End card-header -->

        <div class="card-body">
            <form id="myForm" method="post" action="{{ route('admin.roles.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $roles->id }}">
                <div class="row">
                    <div class="col-md-8">
                        <div class="border p-3 rounded">
                            <div class="from-group mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ $roles->name }}">
                            </div>

                            <div class="from-group mb-3">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div> <!--- End border --->
                    </div> <!--- End col-md-8 --->
                </div>
            </form>
        </div><!-- End card boody -->
    </div><!-- End card -->




@endsection
@section('scripts')
@parent



@endsection

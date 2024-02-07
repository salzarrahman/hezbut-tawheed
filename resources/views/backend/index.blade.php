@extends('backend.layouts.backend')

@section('page_title', 'Dashborad')

@section('breadcrumb_link_one',Str::ucfirst(Request::segment(2)))
@section('breadcrumb_link_two',Str::ucfirst(Request::segment(3)))


@section('page_style')




@endsection

@php
    $id = Auth::user()->id;
    $userid = App\Models\User::find($id);
    $status = $userid->status;

    $visitor = App\Models\Visitor::get();

@endphp

@section('page-content')

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">

    <div class="col">
      <div class="card radius-10 border-0 border-start border-tiffany border-3">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1">Total Visitor</p>
              <h4 class="mb-0 text-tiffany">{{ $visitor->count() }}</h4>
            </div>
            <div class="ms-auto widget-icon bg-tiffany text-white">
              <i class="bi bi-bag-check-fill"></i>
            </div>
          </div>
        </div>
      </div>
     </div>


    </div>

{{php_uname()}}


@endsection
@section('scripts')
@parent





@endsection

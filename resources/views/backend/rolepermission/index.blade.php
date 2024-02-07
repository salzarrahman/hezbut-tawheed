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

@section('page_title', 'Role & Permission')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)

@section('breadcrumb_sub_link')


<div class="ms-auto">
    <div class="btn-group">
        <div class="btn-group">
            <a href="{{ route('admin.role_permission.create') }}" type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span> Add Role & Permission</span>
            </a>
        </div>
    </div>
</div>

@endsection

@section('page_style')

<style>
    .form-check-label{
        text-transform: capitalize;
    }
</style>
@endsection

@section('page-content')
<div class="card">
    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover datatable " style="width:100%">
            <thead>
                <tr class=" text-center">
                    <th>#</th>
                    <th>{{ __(' Role') }}</th>
                    <th>{{ __('Permission') }}</th>
                    <th>{{ __('Action') }} </th>
                </tr>
            </thead>
            <tbody>
            @foreach($roles as $key=> $item)
            <tr>
                <td style="width: 5%">#{{ $key+1 }}</td>
                <th style="width: 15%; ">{{ $item->name }}</th>
                <th style="width: 65%; ">
                    @foreach($item->permissions->take(15) as $perm)
                        <span class="badge bg-primary">{{ $perm->name }}</span>
                    @endforeach
                </th>
                <td style="width: 15%; ">
                    <a href="{{ route('admin.role_permission.edit', $item->id) }}"class="btn btn-sm btn-outline-primary">
                        <i class="far fa-edit" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('admin.role_permission.destroy', $item->id) }}" class="btn btn-sm btn-outline-danger" id="delete">
                        <i class=" far fa-trash-alt" style="color: #ff1f1f;" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
    </table>

    </div><!--- End Card body -->
</div><!--- End Card -->


@endsection
@section('scripts')
@parent

@endsection

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

@section('page_title', 'Permission')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)

@section('breadcrumb_sub_link')

@if (App\Models\Abilitie::where('status', 1)->count() >= 8 )

@else
<div class="ms-auto">
    <div class="btn-group">
        <div class="btn-group">
            <a href="{{ route('admin.permission.create') }}" type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span> Add Permission </span>
            </a>
        </div>
    </div>
</div>
@endif

@endsection

@section('page_style')
<style>
    .td_lable{
        text-transform: capitalize;
    }
</style>
@endsection

@section('page-content')

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable desktop" style="width:100%">
                <thead>
                    <tr class=" text-center">
                        <th>#</th>

                        <th>{{ __('Permission Name') }}</th>
                        <th>{{ __('Group Name') }}</th>
                        <th>{{ __('Action') }} </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permission as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td class="td_lable">{{ $item->name  }}</td>
                        <td class="td_lable">{{ $item->group_name   }}</td>
                        <td>
                            <a href="{{ route('admin.permission.edit', $item->id) }}"
                                class="btn btn-sm btn-outline-primary">
                                <i class="far fa-edit" aria-hidden="true"></i> Edit
                            </a>
                            <a href="{{ route('admin.permission.destroy', $item->id) }}"
                                class="btn btn-sm btn-outline-danger" id="delete">
                                <i class=" far fa-trash-alt" style="color: #ff1f1f;" aria-hidden="true"></i>
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('scripts')
@parent

@endsection

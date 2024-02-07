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

@section('page_title', 'Change Password')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)


@section('breadcrumb_sub_link')

@if (App\Models\Feature::where('status', 1)->count() >= 4  )


@else
<div class="ms-auto">
    <div class="btn-group">
        <div class="btn-group">
            <a href="{{ route('admin.feature.create') }}" type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span> Add Feature  </span>
            </a>
          </div>
    </div>
</div>
@endif


@endsection


@section('page_style')


@endsection

@section('page-content')
<div class="card">
    <div class=" card-header">
        <div class="col text-start">
            {{ __('Slider section') }}
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="" >
                    <table class="table table-bordered  datatable desktop" style="width:100%">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Image </th>
                                <th>Title </th>
                                <th>summary </th>
                                <th>Status </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($feature as $key=> $item)

                            <tr>
                                <td>#{{ $key+1 }} </td>
                                <td class=" text-center">
                                    <div style="background-color: #16327a;">
                                        <img src="{{ asset($item->image) }} " style="width: :50px; height:50px;">
                                    </div>
                                </td>
                                <td>{{ Str::limit($item->title,20)  }}</td>
                                <td>{{ Str::limit($item->summary,20)  }}</td>

                                <td>

                                    @if($item->status == 1)
                                    <div class="btn-group" style="width: 150px">
                                        <button type="button" class="btn btn-outline-success">
                                            Publish
                                        </button>
                                        <a type="button" class="btn btn-outline-danger"
                                            href="{{ route('admin.feature.unpublish',$item->id) }}" title="Unpublish">
                                            <i class="bi bi-arrow-down-square"></i>
                                        </a>
                                    </div>
                                    @else
                                    <div class="btn-group" style="width: 150px">
                                        <button type="button" class="btn btn-outline-danger">
                                            Unpublish
                                        </button>
                                        <a type="button" class="btn btn-outline-success"
                                            href="{{ route('admin.feature.publish',$item->id) }}" title="Publish">
                                            <i class="bi bi-arrow-up-square"></i>
                                        </a>
                                    </div>
                                    @endif

                                </td>

                                <td class="text-center">

                                        <a href="{{ route('admin.feature.edit',$item->id) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="far fa-edit" aria-hidden="true"></i>
                                        </a>

                                        <a href="{{ route('admin.feature.destroy',$item->id) }}"
                                            class="btn btn-sm btn-outline-danger" id="delete">
                                            <i class=" far fa-trash-alt" style="color: #ff1f1f;" aria-hidden="true"></i>
                                        </a>


                                </td>
                            </tr>


                            @endforeach

                        </tbody>
                    </table>
                </div> <!--- end responsive-->


            </div><!--- end col-md-8-->


        </div><!--- end row-->
    </div><!--- end card body-->
</div><!--- end card -->
@endsection
@section('scripts')
@parent



@endsection

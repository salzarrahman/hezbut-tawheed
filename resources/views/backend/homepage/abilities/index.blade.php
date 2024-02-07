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

@section('page_title', 'Abilities')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)

@section('breadcrumb_sub_link')


<div class="ms-auto">
    <div class="btn-group">
        <div class="btn-group">
            <a href="{{ route('admin.abilities.create') }}" type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span> Add Abilities  </span>
            </a>
          </div>
    </div>
</div>



@endsection


@section('page_style')


@endsection

@section('page-content')


            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable desktop" style="width:100%">
                            <thead>
                                <tr class=" text-center">
                                    <th>#</th>
                                    <th>{{ __('Logo') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Category') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abilities as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ asset($item->image) }}" style="width: :auto; height:50px;" ></td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category }}</td>
                                        <td>
                                            @if ($item->id === 1)

                                            @else
                                            @if($item->status == 1)
                                            <div class="btn-group" style="width: 150px">
                                                <button type="button" class="btn btn-outline-success">
                                                    Publish
                                                </button>
                                                <a type="button" class="btn btn-outline-danger" href="{{ route('admin.abilities.unpublish',$item->id) }}" title="Unpublish" >
                                                    <i class="bi bi-arrow-down-square"></i>
                                                </a>
                                            </div>
                                            @else
                                            <div class="btn-group" style="width: 150px">
                                                <button type="button" class="btn btn-outline-danger">
                                                    Unpublish
                                                </button>
                                                <a type="button" class="btn btn-outline-success" href="{{ route('admin.abilities.publish',$item->id) }}" title="Publish">
                                                    <i class="bi bi-arrow-up-square"></i>
                                                </a>
                                            </div>
                                            @endif
                                            @endif
                                        </td>
                                        <td>

                                            <a href="{{ route('admin.abilities.edit', $item->id) }}"class="btn btn-sm btn-outline-primary">
                                                <i class="far fa-edit" aria-hidden="true"></i> Edit
                                            </a>
                                            <a href="{{ route('admin.abilities.destroy', $item->id) }}"
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

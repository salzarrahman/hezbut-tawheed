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

@section('page_title', 'Mission')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)


@section('breadcrumb_sub_link')

@if (App\Models\Mission::where('status', 1)->count() >= 7  )


@else
<div class="ms-auto">
    <div class="btn-group">
        <div class="btn-group">
            <a href="{{ route('admin.mission.create') }}" type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span> Add Mission  </span>
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
            {{ __('Mission List') }}
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
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
                            @foreach($missions as $key=> $item)
                            @if ($item->id === 1)

                            @else
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
                                            href="{{ route('admin.mission.unpublish',$item->id) }}" title="Unpublish">
                                            <i class="bi bi-arrow-down-square"></i>
                                        </a>
                                    </div>
                                    @else
                                    <div class="btn-group" style="width: 150px">
                                        <button type="button" class="btn btn-outline-danger">
                                            Unpublish
                                        </button>
                                        <a type="button" class="btn btn-outline-success"
                                            href="{{ route('admin.mission.publish',$item->id) }}" title="Publish">
                                            <i class="bi bi-arrow-up-square"></i>
                                        </a>
                                    </div>
                                    @endif

                                </td>

                                <td class="text-center">
                                    @if ($item->id === 1)

                                    @else
                                        <a href="{{ route('admin.mission.edit',$item->id) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="far fa-edit" aria-hidden="true"></i>
                                        </a>

                                        <a href="{{ route('admin.mission.destroy',$item->id) }}"
                                            class="btn btn-sm btn-outline-danger" id="delete">
                                            <i class=" far fa-trash-alt" style="color: #ff1f1f;" aria-hidden="true"></i>
                                        </a>
                                    @endif

                                </td>
                            </tr>
                            @endif

                            @endforeach

                        </tbody>
                    </table>

                </div> <!--- end responsive-->
            </div><!--- end col-md-8-->
            <div class="col-md-4">
                <div class="border p-3 rounded">
                    <form id="myForm" method="post" action="{{ route('admin.mission.updateimg') }}" enctype="multipart/form-data">
                        @csrf

                        <span>Mission Section</span>
                        <hr>

                        <div class="from-group mb-3">
                            <label class="form-label">Feature Title <span class="sup title_sup">  </span> </label>
                            <input name="feature_title" id="feature_title" type="text" class="form-control" value="{{ $missions_id->title ?? '' }}">
                            <p class="mt-1" id="feature_title_noticeArea"></p>
                        </div>

                        <div class="from-group mb-3">
                            <label class="form-label">Summary <span class="sup summary_sup">  </span> </label>
                            <input name="summary" id="summary" type="text" class="form-control" value="{{ $missions_id->summary ?? '' }}">
                            <p class="mt-1" id="slider_summary_noticeArea"></p>
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary w-100">Update</button>
                        </div>
                    </form>
                </div><!--- end border-->
            </div><!--- end col-md-4-->
        </div><!--- end row-->
    </div><!--- end card body-->
</div><!--- end card -->
@endsection
@section('scripts')
@parent
<script type="text/javascript">
    $(document).ready(function(){
        $('#feature_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


@endsection

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

@section('page_title', 'Media Partner')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)




@section('page_style')


@endsection

@section('page-content')

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 ">Add Media partner </h6>
                        <hr>
                        <form id="myForm" method="post" action="{{ route('admin.media_partner.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-2">

                                <div class="from-group mb-3">
                                    <label class="form-label"> Name</label>
                                    <input class="form-control" type="text" name="title" id="title" >
                                    <p class="mt-1" id="slider_title_noticeArea"></p>
                                </div>

                                <div class="from-group mb-3">
                                    <label class="form-label">Read more link</label>
                                    <input type="text" name="link" class="form-control" id="link">
                                </div>

                                <div class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                                    <h6 class="mb-0 text-pink">Image size will be 100 X 80 px. Background must
                                        be transparent</h6>
                                </div>

                                <div class="form-group mb-3 text-center">
                                    <label for="example-fileinput" class="form-label"> </label>
                                    <img id="showImage" src="{{ url('upload/no_image.jpg') }} "
                                        class="avatar-lg img-thumbnail" alt="profile-image">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="example-fileinput" class="form-label">Logo</label>
                                    <input type="file" name="image" id="image" class="form-control image">
                                </div>
                                    <input type="hidden" name="x1" value="" />
                                    <input type="hidden" name="y1" value="" />
                                    <input type="hidden" name="w" value="" />
                                    <input type="hidden" name="h" value="" />

                                @if ($path = Session::get('path'))
                                    <img src="{{ $path }}" />
                                @endif

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Add New</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable desktop" style="width:100%">
                            <thead>
                                <tr class=" text-center">
                                    <th>#</th>
                                    <th>{{ __('Logo') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Action') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($media_partner as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ asset($item->image) }} " style="width: :auto; height:50px;" ></td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <a
                                                href="{{ route('admin.media_partner.edit', $item->id) }}"class="btn btn-sm btn-outline-primary">
                                                <i class="far fa-edit" aria-hidden="true"></i> Edit
                                            </a>
                                            <a href="{{ route('admin.media_partner.destroy', $item->id) }}"
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

        </div>
    </div>


@endsection
@section('scripts')
    @parent
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script> --}}

<script>
    jQuery(function($) {
        var p = $("#showImage");

        $("body").on("change", ".image", function(){
            var imageReader = new FileReader();
            imageReader.readAsDataURL(document.querySelector(".image").files[0]);

            imageReader.onload = function (oFREvent) {
                p.attr('src', oFREvent.target.result).fadeIn();
            };
        });

        $('#showImage').imgAreaSelect({
            maxWidth: '1000', // this value is in pixels
            onSelectEnd: function (img, selection) {
                $('input[name="x1"]').val(selection.x1);
                $('input[name="y1"]').val(selection.y1);
                $('input[name="w"]').val(selection.width);
                $('input[name="h"]').val(selection.height);
            }
        });
    });
    </script>

@endsection

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

@section('page_title', 'Photo gallery')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)



@section('page_style')
<style>
    .img-fluid {
        max-width: 100%;
        height: 106px;
    }
</style>

@endsection

@section('page-content')
<div class="card">
    <div class="card-body">
        <form id="myForm" method="post" action="{{ route('admin.photo_gallery.update') }}"enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $photo_gallery->id }}">
            <div class="row">
                <div class="col-md-8">
                    <div class="border p-3 rounded">
                        <div class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                            <h6 class="mb-0 text-pink">Image size will be 1100 X 700 px.</h6>
                        </div>
                        <div class="form-group mb-3 text-center">
                            <label for="example-fileinput" class="form-label"> </label>
                            <img id="showImage" src="{{ asset($photo_gallery->future_images) }}"style="width:400px; height: 200px;">
                        </div>

                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="form-label">Future Images</label>
                            <input type="file" name="future_images" class="form-control" id="image">
                        </div>

                        <hr>
                        <div class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                            <h6 class="mb-0 text-pink">Image size will be 859 X 580 px.</h6>
                        </div>

                        <div class="form-group mb-3 text-center">
                            <label for="example-fileinput" class="form-label"> </label>
                            <div class="row" id="preview_img"></div>
                            <div class="row" id="preview_input"></div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="form-label">Add more new images </label>
                            <input type="file" name="multi_image[]" class="form-control" id="multiImg" multiple="">
                        </div>

                    </div><!-- end border-->
                </div><!-- end Col-->

                <div class="col-md-4">
                    <div class="border p-3 rounded">

                        <div class="from-group mb-3">
                            <label class="form-label"> Date</label>
                            <input class="form-control" type="date" name="date" id="date"  value="{{ $photo_gallery->date }}">
                        </div>

                        <div class="from-group mb-3">
                            <label class="form-label"> Venue</label>
                            <input class="form-control" type="text" name="venue" id="venue"value="{{ $photo_gallery->venue }}">
                        </div>

                        <div class="from-group mb-3">
                            <label class="form-label"> Title</label>
                            <textarea class="form-control" type="text" name="title" id="title" rows="2" cols="2">{{ $photo_gallery->title }}</textarea>
                            <p class="mt-1" id="slider_title_noticeArea"></p>
                        </div>

                        <div class="form-group  mb-3">
                            <label for="inputEmail4" class="form-label">Category Name </label>
                            <select name="category_id" class="form-select" id="category_id">
                                <option>Select Category </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $photo_gallery->category_id ? 'selected' : '' }}> {{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary w-100">Publish</button>
                        </div>
                    </div> <!-- end border-->
                </div><!-- end col-->

            </div><!-- end row-->
        </form>
    </div><!-- end card body-->
</div><!-- end card-->

<div class="card">
    <div class="card-body">


                <div class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                    <h6 class="mb-0 text-pink">Image size will be 370 X 250 px.</h6>
                </div>

                <div class="row text-center">
                    @foreach ($photo_gallery->imagess as $key => $item)
                        <div class="col-md-4">
                            <div class="card border shadow-none mb-0">
                                <div class="card-body text-center">
                                    <img src="{{ asset($item->images) }}" class="img-fluid mb-3" alt="">
                                    <h6 class="product-title">{{ $item->captions }}</h6>
                                    <div class="actions d-flex align-items-center justify-content-center gap-2 mt-3">
                                        <a class="btn btn-sm btn-outline-primary" id="editCompany" data-bs-toggle="modal"
                                            data-bs-target="#sinImages{{ $key }}" data-id="{{ $item->id }}">
                                            <i class="bi bi-pencil-fill"></i> Edit
                                        </a>
                                        <a href="{{ route('admin.singelimage.destroy', $item->id) }}"
                                            class="btn btn-sm btn-outline-danger" id="delete"><i class="bi bi-trash-fill"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- Modal -->
                    <div class="modal fade" id="sinImages{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form id="myForm" method="post" action="{{ route('admin.singelimage.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Singel Image Edit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">

                                        <img id="showImage{{ $key }}" src="{{ asset($item->images) }}" alt="{{ $item->captions }}" style="width:175px; height:100px;">

                                        <input class=" form-control mt-3" type="text" name="captions" id="captions" value="{{ $item->captions }}">

                                        <input type="file" name="multi_image" class="form-control mt-3"  id="multi_image{{ $key }}" multiple="">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type=" submit " class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach

                </div><!-- end row-->
    </div><!-- end card body-->
</div><!-- end card-->

@endsection
@section('scripts')
@parent
<script>
    $(document).ready(function() {
        $('#multiImg').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data
                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('avatar-lg img-thumbnail').attr('src', e.target.result).width(175).height(100); //create image element
                                var input = $('<input/>').addClass('form-control').attr('name', 'captions[]').attr('value','captions').width( 175); //create image element
                                $('#preview_img').append(img); //append image to output element
                                $('#preview_input').append(input); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });
            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@foreach ($photo_gallery->imagess as $key => $item)
<script type="text/javascript">
    $(document).ready(function() {
        $('#multi_image{{ $key }}').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage{{ $key }}').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endforeach

@endsection

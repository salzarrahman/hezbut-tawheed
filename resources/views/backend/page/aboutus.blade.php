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

@section('page_title', ' About us')

@section('breadcrumb_link_one',$segment_one)
@section('breadcrumb_link_two',$segment_two)

@section('breadcrumb_sub_link')

@endsection

@section('page_style')

@endsection

@section('page-content')
<div class="card">
    <div class="card-body">
        <ul class="nav nav-pills nav-pills-danger mb-3" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="pill" href="#section_one" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon">
                            <i class='bx bx-windows font-18 me-1'></i>
                        </div>
                        <div class="tab-title">Section One</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#section_two" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon">
                            <i class='bx bx-windows font-18 me-1'></i>
                        </div>
                        <div class="tab-title">Section Two</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#section_three" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon">
                            <i class='bx bx-windows font-18 me-1'></i>
                        </div>
                        <div class="tab-title">Section Three</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#section_four" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon">
                            <i class='bx bx-windows font-18 me-1'></i>
                        </div>
                        <div class="tab-title">Section Four</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#section_five" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon">
                            <i class='bx bx-windows font-18 me-1'></i>
                        </div>
                        <div class="tab-title">Section Five</div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="tab-content" id="danger-pills-tabContent">

            <div class="tab-pane fade show active" id="section_one" role="tabpanel">
                <form id="myForm" method="post" action="{{ route('admin.aboutus.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $aboutus[0]['id'] }}">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="border p-3 rounded">
                                <div class="form-group mb-3">
                                    <label for="inputEmail4" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="inputEmail4"value="{{ $aboutus[0]['title'] }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="inputEmail4" class="form-label"> Details </label>
                                    <textarea class="ckeditor form-control" name="summary"> {!! $aboutus[0]['summary'] !!}</textarea>
                                </div>
                            </div> <!-- end border -->
                        </div> <!-- end col -->

                        <div class="col-md-4">
                            <div class="border p-3 rounded">
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Update</button>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-fileinput" class="form-label"> </label>
                                    <img id="showImage" src="{{ asset( $aboutus[0]['image']) }}" class=" avatar-lg img-thumbnail" alt="profile-image">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="example-fileinput" class="form-label">Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div> <!-- end border -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </form>
            </div>
            <div class="tab-pane fade" id="section_two" role="tabpanel">
                <form id="myForm" method="post" action="{{ route('admin.aboutus.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $aboutus[1]['id'] }}">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="border p-3 rounded">
                                <div class="form-group mb-3">
                                    <label for="inputEmail4" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="inputEmail4"value="{{ $aboutus[1]['title'] }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="inputEmail4" class="form-label"> Details </label>
                                    <textarea class="ckeditor form-control" name="summary"> {!! $aboutus[1]['summary'] !!}</textarea>
                                </div>
                            </div> <!-- end border -->
                        </div> <!-- end col -->

                        <div class="col-md-4">
                            <div class="border p-3 rounded">
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Update</button>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-fileinput" class="form-label"> </label>
                                    <img id="showImage2" src="{{ asset( $aboutus[1]['image']) }}" class=" avatar-lg img-thumbnail" alt="profile-image">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="example-fileinput" class="form-label">Image</label>
                                    <input type="file" name="image" id="image2" class="form-control">
                                </div>
                            </div> <!-- end border -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </form>
            </div>
            <div class="tab-pane fade" id="section_three" role="tabpanel">
                <form id="myForm" method="post" action="{{ route('admin.aboutus.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $aboutus[2]['id'] }}">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="border p-3 rounded">
                                <div class="form-group mb-3">
                                    <label for="inputEmail4" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="inputEmail4"value="{{ $aboutus[2]['title'] }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="inputEmail4" class="form-label"> Details </label>
                                    <textarea class="ckeditor form-control" name="summary"> {!! $aboutus[2]['summary'] !!}</textarea>
                                </div>
                            </div> <!-- end border -->
                        </div> <!-- end col -->

                        <div class="col-md-4">
                            <div class="border p-3 rounded">
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Update</button>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-fileinput" class="form-label"> </label>
                                    <img id="showImage3" src="{{ asset( $aboutus[2]['image']) }}" class=" avatar-lg img-thumbnail" alt="profile-image">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="example-fileinput" class="form-label">Image</label>
                                    <input type="file" name="image" id="image3" class="form-control">
                                </div>
                            </div> <!-- end border -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </form>
            </div>
            <div class="tab-pane fade" id="section_four" role="tabpanel">
                <form id="myForm" method="post" action="{{ route('admin.aboutus.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $aboutus[3]['id'] }}">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="border p-3 rounded">
                                <div class="form-group mb-3">
                                    <label for="inputEmail4" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="inputEmail4"value="{{ $aboutus[3]['title'] }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="inputEmail4" class="form-label"> Details </label>
                                    <textarea class="ckeditor form-control" name="summary"> {!! $aboutus[3]['summary'] !!}</textarea>
                                </div>
                            </div> <!-- end border -->
                        </div> <!-- end col -->

                        <div class="col-md-4">
                            <div class="border p-3 rounded">
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Update</button>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-fileinput" class="form-label"> </label>
                                    <img id="showImage3" src="{{ asset( $aboutus[3]['image']) }}" class=" avatar-lg img-thumbnail" alt="profile-image">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="example-fileinput" class="form-label">Image</label>
                                    <input type="file" name="image" id="image3" class="form-control">
                                </div>
                            </div> <!-- end border -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </form>
            </div>
            <div class="tab-pane fade" id="section_five" role="tabpanel">
                <form id="myForm" method="post" action="{{ route('admin.aboutus.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $aboutus[4]['id'] }}">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="border p-3 rounded">
                                <div class="form-group mb-3">
                                    <label for="inputEmail4" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="inputEmail4"value="{{ $aboutus[4]['title'] }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="inputEmail4" class="form-label"> Details </label>
                                    <textarea class="ckeditor form-control" name="summary"> {!! $aboutus[4]['summary'] !!}</textarea>
                                </div>
                            </div> <!-- end border -->
                        </div> <!-- end col -->

                        <div class="col-md-4">
                            <div class="border p-3 rounded">
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Update</button>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-fileinput" class="form-label"> </label>
                                    <img id="showImage3" src="{{ asset( $aboutus[4]['image']) }}" class=" avatar-lg img-thumbnail" alt="profile-image">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="example-fileinput" class="form-label">Image</label>
                                    <input type="file" name="image" id="image3" class="form-control">
                                </div>
                            </div> <!-- end border -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </form>
            </div>
        </div>
    </div>
</div>




@endsection
@section('scripts')
@parent
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('summary', {
        filebrowserUploadUrl: "{{route('admin.aboutus.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
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
@endsection

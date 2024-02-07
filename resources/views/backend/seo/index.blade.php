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

@section('page_title', 'Seo Setting')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)




@section('page_style')


@endsection

@section('page-content')

<form id="myForm" method="post" action="{{ route('admin.seo.update') }}" enctype="multipart/form-data">
@csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 ">SEO Setting</h6>
                        <hr>
                            <input type="hidden" name="id" value="{{ $seo->id ?? '' }}">

                            <div class="row g-2">
                                <div class="from-group">
                                    <label class="form-label"> Meta Title</label>
                                    <input class="form-control" type="text" name="meta_title" id="meta_title" value="{{ $seo->meta_title ?? '' }}">

                                </div>

                                <div class="from-group">
                                    <label class="form-label"> Meta Author</label>
                                    <input class="form-control" type="text" name="meta_author" id="meta_author" value="{{ $seo->meta_author  ?? '' }}">

                                </div>

                                <div class="from-group">
                                    <label class="form-label"> Meta Keyword</label>
                                    <input class="selectize-close-btn" type="text" name="meta_keyword" id="meta_keyword" value="{{ $seo->meta_keyword   ?? '' }}">

                                </div>

                                <div class="from-group">
                                    <label class="form-label">Meta Description</label>
                                    <textarea class="form-control" type="text" name="meta_description" id="meta_description" cols="8" rows="3">{{ $seo->meta_description    ?? '' }}</textarea>

                                </div>
                            </div>

                    </div><!---End Border --->
                </div><!---End card-body --->
            </div><!---End Card --->
        </div><!---End Col --->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <div class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                            <h6 class="mb-0 text-pink">Image size will be 1920 X 1080PX.</h6>
                        </div>

                        <div class="form-group mb-3 text-center">
                            <label for="example-fileinput" class="form-label"> </label>
                            <img id="showImage" src="{{(!empty($seo->image)) ? asset($seo->image): url('upload/no_image.jpg') }} " class="avatar-lg img-thumbnail" alt="profile-image">
                        </div>

                        <div class="form-group mb-3">
                            <label for="example-fileinput" class="form-label">Thumbnail Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </div><!---End Border --->
                </div><!---End card-body --->
            </div><!---End Card --->
        </div><!---End Col --->
    </div> <!---End row --->
</form>

@endsection
@section('scripts')
 <!-- Init js-->
 <script src="{{ asset('backend/assets/js/pages/form-advanced.init.js') }}"></script>
<!-- InputTags js-->

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection

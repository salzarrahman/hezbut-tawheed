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




@section('page_style')


@endsection

@section('page-content')
<div class="card">
    <div class="card-body">
        <div class="border p-3 rounded">
            <h6 class="mb-0 ">Add Abilities </h6>
            <hr>
            <form id="myForm" method="post" action="{{ route('admin.abilities.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row g-2">

                    <div class="from-group mb-3">
                        <label class="form-label"> Category</label>
                        <select class=" form-control" name="category" id="category">
                            <option value="">Select</option>
                            <option value="left_block_tilte">Left Block Title</option>
                            <option value="right_block_tilte">Right Block Title</option>
                            <option value="Our Modus Operandi">Our Modus Operandi</option>
                            <option value="Our Policies">Our Policies </option>
                        </select>

                    </div>

                    <div class="from-group mb-3">
                        <label class="form-label"> Title</label>
                        <input class="form-control" type="text" name="title" id="title" >
                        <p class="mt-1" id="slider_title_noticeArea"></p>
                    </div>

                    <div class="from-group mb-3">
                        <label class="form-label"> Summary</label>
                        <textarea class="form-control" type="text" name="summary" id="summary"  rows="4" cols="4"> </textarea>
                        <p class="mt-1" id="slider_title_noticeArea"></p>
                    </div>

                    <div class="from-group mb-3">
                        <label class="form-label">Read more link</label>
                        <input type="text" name="link" class="form-control" id="link">
                    </div>

                    <div
                        class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                        <h6 class="mb-0 text-pink">Image size will be 503 X 514 px. Background must
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


                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    @parent
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

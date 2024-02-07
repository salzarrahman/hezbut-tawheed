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

@section('page_title', 'Setting')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)



@section('page_style')


@endsection

@section('page-content')


    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 ">Settings</h6>
                        <hr>
                        <form id="myForm" method="post" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $setting->id ?? '' }}">

                            <div class="row g-2">
                                <div class="from-group">
                                    <label class="form-label">Title</label>
                                    <input class="form-control" type="text" name="site_title" id="site_title" value="{{ $setting->site_title ?? '' }}">

                                </div>

                                <div class="from-group">
                                    <label class="form-label">Tagline</label>
                                    <input class="form-control" type="text" name="tagline" id="tagline" value="{{ $setting->tagline ?? '' }}">

                                </div>

                                <div class="from-group">
                                    <label class="form-label">Address</label>
                                    <input class="form-control" type="text" name="address" id="address" value="{{ $setting->address ?? '' }}">
                                </div>
                                <div class="from-group">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" type="text" name="email" id="email" value="{{ $setting->email ?? '' }}">
                                </div>

                                <div class="from-group">
                                    <label class="form-label">Web</label>
                                    <input class="form-control" type="text" name="web" id="web" value="{{ $setting->web ?? '' }}">
                                </div>

                                <div class="from-group">
                                    <label class="form-label">Phone</label>
                                    <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ $setting->phone_number ?? '' }}">

                                </div>
                                <div class="from-group">
                                    <label class="form-label">Phone 2</label>
                                    <input class="form-control" type="text" name="col_02" id="col_02" value="{{ $setting->phone_number_2   ?? '' }}">
                                </div>

                                <div class="from-group">
                                    <label class="form-label">Copyright</label>
                                    <input class="form-control" type="text" name="col_01" id="col_01" value="{{ $setting->col_01 ?? '' }}">
                                </div>


                                <div class="from-group">
                                    <label class="form-label">@col_03</label>
                                    <input class="form-control" type="text" name="col_03" id="col_03" value="{{ $setting->col_03   ?? '' }}">
                                </div>
                                <div class="from-group">
                                    <label class="form-label">@col_04</label>
                                    <input class="form-control" type="text" name="col_04" id="col_04" value="{{ $setting->col_04   ?? '' }}">
                                </div>
                                <div class="from-group">
                                    <label class="form-label">@col_05</label>
                                    <input class="form-control" type="text" name="col_05" id="col_05" value="{{ $setting->col_05   ?? '' }}">
                                </div>


                                <div class="form-group mb-3">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div><!---End Border --->
                </div><!---End card-body --->
            </div><!---End Card --->
        </div><!---End Col --->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                    <form id="myForm" method="post" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $setting->id ?? '' }}">

                        <div class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                            <h6 class="mb-0 text-pink">Logo size will be 200 X 70.</h6>
                        </div>

                        <div class="form-group mb-3 text-center" style="background-color: #16327a">
                            <img id="showImage" src="{{(!empty($setting->logo)) ? asset($setting->logo): url('upload/no_image.jpg') }} " class="" alt="profile-image">
                        </div>

                        <div class="form-group mb-3">
                            <label for="example-fileinput" class="form-label">Logo Image</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </form>
                    <form id="myForm" method="post" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $setting->id ?? '' }}">

                        <div class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                            <h6 class="mb-0 text-pink">Favicon size will be 32 X 32.</h6>
                        </div>

                        <div class="form-group mb-3 text-center">

                            <img id="showFavicon" src="{{(!empty($setting->favicon)) ? asset($setting->favicon): url('upload/no_image.jpg') }} " class="avatar-lg img-thumbnail" alt="profile-image">
                        </div>

                        <div class="form-group mb-3">
                            <label for="example-fileinput" class="form-label">Favicon</label>
                            <input type="file" name="favicon" id="favicon" class="form-control">
                        </div>




                        <div class="form-group mb-3">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    </div><!---End Border --->
                </div><!---End card-body --->
            </div><!---End Card --->
        </div><!---End Col --->
    </div> <!---End row --->


@endsection
@section('scripts')


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

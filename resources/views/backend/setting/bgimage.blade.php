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
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <h6 class="mb-0 "> Background Settings</h6>
                    <hr>
                    <form id="myForm" method="post" action="{{ route('admin.setting.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $setting->id ?? '' }}">
                        <div class="row border p-3 rounded">
                            <div
                                class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                                <h6 class="mb-0 text-pink">Breadcrumb background Image size will be 1290 X 650.</h6>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mt-5 mb-5">
                                    <label for="example-fileinput" class="form-label">Breadcrumb Image</label>
                                    <input type="file" name="breadcrumb_bg" id="breadcrumb_bg" class="form-control">
                                </div>

                                <div class="form-group mt-5 mb-5">
                                    <div class="d-grid align-text-bottom  ">
                                        <button type="submit" class="btn btn-primary ">Change </button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3 text-center">
                                    <img id="showbreadcrumb_bg"
                                        src="{{(!empty($setting->breadcrumb_bg)) ? asset($setting->breadcrumb_bg): url('upload/no_image.jpg') }} "
                                        class="avatar-lg img-thumbnail" alt="profile-image">
                                </div>
                            </div>

                        </div>
                    </form>

                    <form id="myForm" method="post" action="{{ route('admin.setting.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $setting->id ?? '' }}">
                        <div class="row border p-3 rounded">
                            <div
                                class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                                <h6 class="mb-0 text-pink">Footer background Image size will be 1290 X 633.</h6>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mt-5 mb-5">
                                    <label for="example-fileinput" class="form-label">Footer Image</label>
                                    <input type="file" name="footer_bg" id="footer_bg" class="form-control">
                                </div>

                                <div class="form-group mt-5 mb-5">
                                    <div class="d-grid align-text-bottom  ">
                                        <button type="submit" class="btn btn-primary ">Change </button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3 text-center">
                                    <img id="showfooter_bg"
                                        src="{{(!empty($setting->footer_bg)) ? asset($setting->footer_bg): url('upload/no_image.jpg') }} "
                                        class="avatar-lg img-thumbnail" alt="profile-image">
                                </div>
                            </div>

                        </div>
                    </form>
                    <form id="myForm" method="post" action="{{ route('admin.setting.update') }}"enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $setting->id ?? '' }}">
                        <div class="row border p-3 rounded">
                            <div
                                class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                                <h6 class="mb-0 text-pink">Campaign background Image size will be 575 X 657.</h6>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mt-5 mb-5">
                                    <label for="example-fileinput" class="form-label">Campaign Image</label>
                                    <input type="file" name="campaign_bg" id="campaign_bg" class="form-control">
                                </div>

                                <div class="form-group mt-5 mb-5">
                                    <div class="d-grid align-text-bottom  ">
                                        <button type="submit" class="btn btn-primary ">Change </button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3 text-center">
                                    <img id="showcampaign_bg"
                                        src="{{(!empty($setting->campaign_bg)) ? asset($setting->campaign_bg): url('upload/no_image.jpg') }} "
                                        class="avatar-lg img-thumbnail" alt="profile-image">
                                </div>
                            </div>

                        </div>
                    </form>

                    <form id="myForm" method="post" action="{{ route('admin.setting.update') }}"  enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $setting->id ?? '' }}">
                        <div class="row border p-3 rounded">
                            <div
                                class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                                <h6 class="mb-0 text-pink">Volunteer left background Image size will be 585 X 781.</h6>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mt-5 mb-5">
                                    <label for="example-fileinput" class="form-label">Volunteer left Image</label>
                                    <input type="file" name="press_tweet_volunteer_left" id="press_tweet_volunteer_left"
                                        class="form-control">
                                </div>

                                <div class="form-group mt-5 mb-5">
                                    <div class="d-grid align-text-bottom  ">
                                        <button type="submit" class="btn btn-primary ">Change </button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3 text-center">
                                    <img id="showVolunteerleft"
                                        src="{{(!empty($setting->press_tweet_volunteer_left)) ? asset($setting->press_tweet_volunteer_left): url('upload/no_image.jpg') }} "
                                        class="avatar-lg img-thumbnail" alt="profile-image">
                                </div>
                            </div>

                        </div>
                    </form>

                    <form id="myForm" method="post" action="{{ route('admin.setting.update') }}"  enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $setting->id ?? '' }}">
                        <div class="row border p-3 rounded">
                            <div
                                class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                                <h6 class="mb-0 text-pink">Volunteer Right background Image size will be 1282 X 812.</h6>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mt-5 mb-5">
                                    <label for="example-fileinput" class="form-label">Volunteer Right Image</label>
                                    <input type="file" name="press_tweet_volunteer_right" id="press_tweet_volunteer_right"
                                        class="form-control">
                                </div>

                                <div class="form-group mt-5 mb-5">
                                    <div class="d-grid align-text-bottom  ">
                                        <button type="submit" class="btn btn-primary ">Change </button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3 text-center">
                                    <img id="showVolunteerRight"
                                        src="{{(!empty($setting->press_tweet_volunteer_right)) ? asset($setting->press_tweet_volunteer_right): url('upload/no_image.jpg') }} "
                                        class="avatar-lg img-thumbnail" alt="profile-image">
                                </div>
                            </div>

                        </div>
                    </form>


                </div>
                <!---End Border --->
            </div>
            <!---End card-body --->
        </div>
        <!---End Card --->
    </div>
    <!---End Col --->
</div>
<!---End row --->


@endsection
@section('scripts')


<script type="text/javascript">
    $(document).ready(function(){
        $('#breadcrumb_bg').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showbreadcrumb_bg').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

    $(document).ready(function(){
        $('#footer_bg').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showfooter_bg').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

    $(document).ready(function(){
        $('#campaign_bg').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showcampaign_bg').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

    $(document).ready(function(){
        $('#press_tweet_volunteer_left').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showVolunteerleft').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

    $(document).ready(function(){
        $('#press_tweet_volunteer_right').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showVolunteerRight').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });


</script>

@endsection

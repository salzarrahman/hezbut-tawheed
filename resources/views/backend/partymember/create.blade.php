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

@section('page_title', 'Party Member')

@section('breadcrumb_link_one',$segment_one)
@section('breadcrumb_link_two',$segment_two)

@section('breadcrumb_sub_link')


@endsection


@section('page_style')

@endsection

@section('page-content')
<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="mb-0">My Account</h5>
                <hr>
            <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card shadow-none border">
                    <div class="card-header">
                        <h6 class="mb-0">USER INFORMATION</h6>
                    </div>
                    <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label"> Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="">
                                </div><!-- end col -->

                                <div class="col-6">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" value="">
                                </div><!-- end col -->

                                <div class="col-6">
                                    <label class="form-label">Email address</label>
                                    <input type="text" name="email" id="email" class="form-control" value="">
                                </div><!-- end col -->

                                <div class="col-6">
                                    <label class="form-label">{{ _('Phone') }}</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="">
                                </div><!-- end col -->

                            </div><!-- end row -->
                        </div><!-- end card-body -->
                </div><!-- end card -->

                <div class="card shadow-none border">
                    <div class="card-header">
                        <h6 class="mb-0">CONTACT INFORMATION</h6>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" value="47-A, city name, United States">
                            </div><!-- end col -->

                            <div class="col-12">
                                <label class="form-label">{{ __('About Me') }}</label>
                                <textarea class="form-control" rows="4" cols="4" placeholder="Describe yourself..."></textarea>
                            </div><!-- end col -->

                        </div><!-- end row -->
                    </div><!-- end card-body -->
                </div><!-- end card -->

                <div class="card shadow-none border">
                    <div class="card-header">
                        <h6 class="mb-0"> {{ __('SOCIAL') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="social-fb" class="form-label">Facebook</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="lni lni-facebook fa-xl" style="color: #3B5998;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="social-fb" placeholder="Url">
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="social-tw" class="form-label">Twitter</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="lni lni-twitter fa-xl" style="color: #1D9BF0;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="social-tw" placeholder="Username">
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="social-tw" class="form-label">Instagram</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="lni lni-instagram fa-xl" style="color: rgb(180, 29, 240);"></i>
                                        </span>
                                        <input type="text" class="form-control" id="social-tw" placeholder="Username">
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="social-tw" class="form-label">Linkedin</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="lni lni-linkedin fa-xl" style="color:#0A66C2;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="social-tw" placeholder="Username">
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="social-tw" class="form-label">Skype</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="lni lni-skype fa-xl" style="color: #00aff0"></i>
                                        </span>
                                        <input type="text" class="form-control" id="social-tw" placeholder="Username">
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="social-tw" class="form-label">Github</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="lni lni-github fa-xl" style="color:#6e5494;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="social-tw" placeholder="Username">
                                    </div>
                                </div>
                            </div><!-- end col -->

                        </div><!-- end row -->
                    </div><!-- end card-body -->
                </div><!-- end card -->

                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">  {{ __('Save Changes') }}</button>
                    </div>
                </div>


            </form>

            </div>
        </div>
    </div>

<div class="col-12 col-lg-4">
  <div class="card shadow-sm border-0 overflow-hidden">
    <div class="card-body">

    <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
        @csrf

    <div class="row">

        <div class="col-md-12">
            <div class="profile-avatar text-center">
                <img id="showImage"
                    src="{{(!empty($profile->photo)) ? url('upload/admin_images/'.$profile->photo): url('upload/no_image.jpg') }}"
                    class="rounded-circle shadow" width="120" height="120" alt="">
            </div>
        </div><!-- end col -->

        <div class="col-md-12">
            <div class="mb-3">
                <label for="photo" class="form-label"></label>
                <input type="file" name="photo" id="image" class="form-control" >
            </div>
        </div><!-- end col -->

        <div class="col-md-12">
            <div class=" text-center">
                <button type="submit" class="btn btn-primary  btn-block">{{ __('Save Changes') }}</button>
            </div>
        </div><!-- end col -->

    </div><!-- end row -->
    </form>

    </div>
    
  </div>
</div>
</div><!--end row-->
@endsection
@section('scripts')
@parent



@endsection

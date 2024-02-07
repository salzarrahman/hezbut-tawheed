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

    <form method="post" action="{{ route('admin.party_member.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">My Account</h5>
                    <hr>

                    <div class="card shadow-none border">
                        <div class="card-header">
                            <h6 class="mb-0">USER INFORMATION</h6>
                        </div>
                        <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="row  g-md-3">
                                    <div class="col-6">
                                        <label class="form-label"> Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="">
                                    </div><!-- end col -->

                                    <div class="col-6">
                                        <label class="form-label">Designation</label>
                                        <input type="text" name="designation" id="designation" class="form-control"
                                            value="">
                                    </div><!-- end col -->

                                    <div class="col-6">
                                        <label class="form-label">Email address</label>
                                        <input type="text" name="email" id="email" class="form-control" value="">
                                    </div><!-- end col -->

                                    <div class="col-6">
                                        <label class="form-label">{{ _('Phone') }}</label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="">
                                    </div><!-- end col -->

                                    <div class="col-12">
                                        <label class="form-label">{{ __('About Me') }}</label>
                                        <textarea name="about_me" id="about_me" class="form-control" rows="4" cols="4"
                                            placeholder="About yourself..."></textarea>
                                    </div><!-- end col -->

                                    <div class="col-12">
                                        <label class="form-label">{{ __('How to Join') }}</label>
                                        <textarea name="how_to_join_ht" id="how_to_join_ht" class="form-control"
                                            rows="4" cols="4" placeholder="How to Join yourself..."></textarea>
                                    </div><!-- end col -->

                                    <div class="col-12">
                                        <label class="form-label">{{ __('Movement life') }}</label>
                                        <textarea name="movement_life" id="movement_life" class="form-control" rows="4"
                                            cols="4" placeholder="How to Join yourself..."></textarea>
                                    </div><!-- end col -->

                                    <div class="col-12">
                                        <label class="form-label">{{ __('Achievement') }}</label>
                                        <textarea name="achievement" id="achievement" class="form-control" rows="4"
                                            cols="4" placeholder="How to Join yourself..."></textarea>
                                    </div><!-- end col -->

                                    <div class="col-12">
                                        <label class="form-label">Address</label>
                                        <input name="address" id="address" type="text" class="form-control" value="">
                                    </div><!-- end col -->

                                </div><!-- end row -->
                            </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header">
                    <h6 class="mb-0"> {{ __('SOCIAL') }}</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="social-fb" class="form-label">Facebook</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="lni lni-facebook fa-xl" style="color: #3B5998;"></i>
                                    </span>
                                    <input type="text" class="form-control" name="facebook" id="social-fb"
                                        placeholder="Url">
                                </div>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="social-tw" class="form-label">Twitter</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="lni lni-twitter fa-xl" style="color: #1D9BF0;"></i>
                                    </span>
                                    <input type="text" class="form-control" name="twitter" id="social-tw"  placeholder="Username">
                                </div>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="social-tw" class="form-label">Instagram</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="lni lni-instagram fa-xl"
                                            style="color: rgb(180, 29, 240);"></i>
                                    </span>
                                    <input type="text" class="form-control" name="instagram" id="social-tw" placeholder="Username">
                                </div>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="social-tw" class="form-label">Linkedin</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="lni lni-linkedin fa-xl" style="color:#0A66C2;"></i>
                                    </span>
                                    <input type="text" class="form-control" name="linkedin" id="social-tw" placeholder="Username">
                                </div>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="social-tw" class="form-label">Skype</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="lni lni-skype fa-xl" style="color: #00aff0"></i>
                                    </span>
                                    <input type="text" class="form-control" name="skype" id="social-tw" placeholder="Username">
                                </div>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="social-tw" class="form-label">Whatsapp</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="lni lni-whatsapp fa-xl" style="color:#1e9e0d;"></i>
                                    </span>
                                    <input type="text" class="form-control" name="whatsapps" id="social-tw" placeholder="Username">
                                </div>
                            </div>
                        </div><!-- end col -->

                        <hr>
                            <h6 class="mb-3"> {{ __('Profile Image') }}</h6>

                        <hr class="">

                        <div class="col-md-12 mb-2">
                            <div class="profile-avatar text-center">
                                <img id="showImage" src="{{(!empty($profile->photo)) ? url('upload/admin_images/'.$profile->photo): url('upload/no_image.jpg') }}"class=" shadow" width="180" height="200" alt="">
                            </div>
                        </div><!-- end col -->

                        <div class="col-md-12">
                            <div class="mb-5">
                                <label for="photo" class="form-label"></label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div><!-- end col -->

                        <div class="col-12 mb-5">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary"> {{ __('Save Changes') }}</button>
                            </div>
                        </div><!-- end col -->

                    </div><!-- end row -->

                </div>

            </div>
        </div>
</div><!--end row-->
</form>

@endsection
@section('scripts')
@parent
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

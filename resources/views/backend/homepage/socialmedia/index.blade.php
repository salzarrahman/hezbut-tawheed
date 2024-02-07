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

@section('page_title', 'Social Media')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)




@section('page_style')
<style>

fieldset {
   width: 100%;
   text-align: center;
   border-bottom: 1px solid #000;
   line-height: 0.1em;
   margin: 10px 0 20px;
}

fieldset span {
    background:#fff;
    padding:0 10px;
}
</style>

@endsection

@section('page-content')
<div class="card">
    <div class="card-header">
        <h6 class="mb-0"> {{ __('SOCIAL') }}</h6>
    </div>
    <div class="card-body">
        <div class="border p-3 rounded">

            <form id="myForm" method="post" action="{{ route('admin.socialmedia.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $socialmedia->id ?? '' }}">


                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="social-fb" class="form-label">Facebook</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="lni lni-facebook fa-xl" style="color: #3B5998;"></i>
                                        </span>
                                        <input type="text" class="form-control" name="facebook" id="facebook" value="{{ $socialmedia->facebook }}" placeholder="Facebook Profile Link">
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
                                        <input type="text" class="form-control" name="twitter" id="twitter" value="{{ $socialmedia->twitter }}" placeholder="Twitter Profile Link">
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
                                        <input type="text" class="form-control" name="instagram" id="instagram" value="{{ $socialmedia->instagram }}" placeholder="Instagram Profile Link">
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
                                        <input type="text" class="form-control" name="linkedin" id="linkedin" value="{{ $socialmedia->linkedin }}" placeholder="Linkedin Profile Link">
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
                                        <input type="text" class="form-control" name="skype" id="skype" value="{{ $socialmedia->skype }}" placeholder="Skype id">
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="social-tw" class="form-label">Whatsapp</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="lni lni-whatsapp fa-xl" style="color:#6e5494;"></i>
                                        </span>
                                        <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{ $socialmedia->whatsapp }}" placeholder="Whats app number">
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="social-tw" class="form-label">Youtube</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="lni lni-youtube fa-xl" style="color:#6e5494;"></i>
                                        </span>
                                        <input type="text" class="form-control" name="youtube" id="youtube" value="{{ $socialmedia->youtube }}" placeholder="Youtube Channel Link">
                                    </div>
                                </div>
                            </div><!-- end col -->


                        </div><!-- end row -->



                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent


@endsection

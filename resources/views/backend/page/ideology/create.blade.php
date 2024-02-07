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

@section('page_title', 'Ideology')

@section('breadcrumb_link_one',$segment_one)
@section('breadcrumb_link_two',$segment_two)

@section('breadcrumb_sub_link')

@endsection

@section('page_style')

@endsection

@section('page-content')

    <form method="post" action="{{ route('admin.ideology.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">My Account</h5>
                    <hr>

                    <div class="card shadow-none border">

                        <form method="post" action="{{ route('admin.ideology.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="row  g-md-3">
                                    <div class="col-12">
                                        <label class="form-label"> Title</label>
                                        <input type="text" name="title" id="title" class="form-control  @error('title') is-invalid @enderror" value="{{ old('title') }}">
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div><!-- end col -->

                                    <div class="col-12">
                                        <label class="form-label">{{ __('Text') }}</label>
                                        <textarea  class="ckeditor form-control @error('price') is-invalid @enderror" name="summary">{{ old('summary') }}</textarea>
                                        @error('summary')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div><!-- end col -->

                                </div><!-- end row -->
                            </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary"> {{ __('Publish') }}</button>
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

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script type="text/javascript">
    CKEDITOR.replace('news_details', {
    });
</script>
@endsection

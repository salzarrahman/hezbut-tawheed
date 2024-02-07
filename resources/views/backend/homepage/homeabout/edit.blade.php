@extends('backend.layouts.backend')

@section('page_title', 'Edit Category')

@section('breadcrumb_link_one',Str::ucfirst(Request::segment(2)))
@section('breadcrumb_link_two',Str::ucfirst(Request::segment(3)))
@section('breadcrumb_link_three',Str::ucfirst(Request::segment(4)))


@section('page_style')
<style>
    .sup {

        font-size: smaller;
        color: red;
    }
</style>

@endsection

@section('page-content')
<div class="card">
    <div class="card-body">

            <form id="myForm" method="post" action="{{ route('admin.home-about.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $home_about->id }}">
                <div class="row">
                    <div class="col-md-8">
                        <div class="border p-3 rounded">
                            <div class="from-group mb-3">
                                <label class="form-label">Feature Title <span class="sup title_sup">  </span> </label>
                                <input name="title" id="title" type="text" class="form-control" value="{{ $home_about->title }}">

                            </div>

                            <div class="from-group mb-3">
                                <label class="form-label">Summary <span class="sup summary_sup">  </span> </label>
                                <textarea id="summary" name="summary"> {!! $home_about->summary !!}</textarea>
                            </div>

                            <div class="from-group mb-3">
                                <label class="form-label">Read more link</label>
                                <input type="text" name="link" class="form-control" id="link" value="{{ $home_about->link }}">
                            </div>

                        </div><!-- end border-->
                    </div><!-- end border-->
                    <div class="col-md-4">
                        <div class="border p-3 rounded">

                            <div class="form-group mb-3 text-center">
                                <label for="example-fileinput" class="form-label"> </label>
                                <img id="showImage" src="{{ asset($home_about->image) }}" class="avatar-lg img-thumbnail" alt="profile-image">
                            </div>

                            <div class="from-group mb-3">
                                <label class="form-label" for="feature_icone_01">Feature Icone </label>
                                <input type="file" name="image" id="image" class="form-control" >
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary w-100">Update</button>
                            </div>

                        </div> <!-- end border-->
                    </div><!-- end col-->
                </div><!-- row end -->
            </form>
    </div>
</div>
@endsection
@section('scripts')
@parent

 <!-- Init js-->
 <script src="{{ asset('backend/assets/js/pages/form-advanced.init.js') }}"></script>
<!-- InputTags js-->

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>tinymce.init({selector:'textarea'});</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                title: {
                    required : true,
                },
                summary: {
                    required : true,
                },

            },
            messages :{
                title: {
                    required : 'Please Enter Title',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>


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

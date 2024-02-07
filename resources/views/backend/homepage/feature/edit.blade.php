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

            <form id="myForm" method="post" action="{{ route('admin.feature.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $feature->id }}">
                <div class="row">
                    <div class="col-md-8">
                        <div class="border p-3 rounded">
                            <div class="from-group mb-3">
                                <label class="form-label">Feature Title <span class="sup title_sup">  </span> </label>
                                <input name="feature_title" id="feature_title" type="text" class="form-control" value="{{ $feature->title }}">
                                <p class="mt-1" id="feature_title_noticeArea"></p>
                            </div>

                            <div class="from-group mb-3">
                                <label class="form-label">Summary <span class="sup summary_sup">  </span> </label>
                                <input name="summary" id="summary" type="text" class="form-control" value="{{ $feature->summary }}">
                                <p class="mt-1" id="slider_summary_noticeArea"></p>
                            </div>

                            <div class="from-group mb-3">
                                <label class="form-label">Read more link</label>
                                <input type="text" name="link" class="form-control" id="link" value="{{ $feature->link }}">
                            </div>

                        </div><!-- end border-->
                    </div><!-- end border-->
                    <div class="col-md-4">
                        <div class="border p-3 rounded">
                            <div class="form-group mb-3 text-center">
                                <img id="showImage"src="{{ asset($feature->image) }} " class="shadow " width="120" height="120" alt="" style="background-color: #16327a;">
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
<script>

    $("#feature_title").on("input", function () {
        if ($(this).val().length >= 20) {
            $("#feature_title_noticeArea").html("<font color='red'> Character limit reached. </font>");
        }
        if ($(this).val().length < 20) {
            $("#feature_title_noticeArea").html("Maximum 20 characters");
            $(".title_sup").html("(maximum 3 words and 20 Character )");
        }
    });

    $("#summary").on("input", function () {
        if ($(this).val().length >= 40) {
            $("#slider_summary_noticeArea").html("<font color='red'> Character limit reached. </font>");
        }
        if ($(this).val().length < 40) {
            $("#slider_summary_noticeArea").html("Maximum 40 characters");
            $(".summary_sup").html("(maximum 5 words and 50 Character  )");
        }
    });

    </script>

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

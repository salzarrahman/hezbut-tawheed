@extends('backend.layouts.backend')

@section('page_title', 'Category')

@section('breadcrumb_link_one',Str::ucfirst(Request::segment(2)))
@section('breadcrumb_link_two',Str::ucfirst(Request::segment(3)))



@section('page_style')

@endsection

@section('page-content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <form id="myForm" method="post" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="border p-3 rounded">

                                    <div class="from-group mb-3">
                                        <label class="form-label">Slider Title</label>
                                        <textarea class="form-control" type="text" name="title"  id="title" rows="2" cols="2"></textarea>
                                        <p class="mt-1" id="slider_title_noticeArea"></p>
                                    </div>

                                    <div class="from-group mb-3">
                                        <label class="form-label">Slider Summary</label>
                                        <textarea class="form-control" name="summary" id="summary"  rows="4" cols="4"></textarea>
                                        <p class="mt-1" id="slider_summary_noticeArea"></p>
                                    </div>

                                    <div class="from-group mb-3">
                                        <label class="form-label">Read more link</label>
                                        <input type="text" name="read_more_link" class="form-control" id="read_more_link" >
                                    </div>

                                </div><!-- end border-->

                            </div>
                            <div class="col-md-4">
                                <div class="border p-3 rounded">
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary w-100">Publish</button>
                                    </div>
                                    <hr>
                                    <div class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                                            <h6 class="mb-0 text-pink">Image size will be height 605px width 790px. Background must be transparent</h6>
                                    </div>

                                    <div class="form-group mb-3 text-center">
                                        <label for="example-fileinput" class="form-label"> </label>
                                        <img id="showImage" src="{{ url('upload/no_image.jpg') }} " class="avatar-lg img-thumbnail" alt="profile-image">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="example-fileinput" class="form-label">Slider Image</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div> <!-- end border-->
                            </div>
                        </div>
                    </form>


                </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->

@endsection
@section('scripts')
@parent

<script>

    $("#title").on("input", function () {
        if ($(this).val().length >= 150) {
            $("#slider_title_noticeArea").html("<font color='red'> Character limit reached. </font>");
        }
        if ($(this).val().length < 150) {
            $("#slider_title_noticeArea").html("Maximum 150 characters");
        }
    });

    $("#summary").on("input", function () {
        if ($(this).val().length >= 300) {
            $("#slider_summary_noticeArea").html("<font color='red'> Character limit reached. </font>");
        }
        if ($(this).val().length < 300) {
            $("#slider_summary_noticeArea").html("Maximum 300 characters");
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

                image: {
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

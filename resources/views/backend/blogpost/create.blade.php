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

@section('page_title', 'Blogpost')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)



@section('page_style')
<style>
    .ck-editor__editable_inline {
        min-height: 300px;
    }
</style>
@endsection

@section('page-content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <form id="myForm" method="post" action="{{ route('admin.blogpost.store') }}" enctype="multipart/form-data">
                    @csrf

                        <div class="row">
                            <div class="col-md-8">

                                <div class="border p-3 rounded">

                                    <div class="form-group mb-3">
                                        <label for="inputEmail4" class="form-label">Post Title </label>
                                        <input type="text" name="news_title" class="form-control" id="news_title">
                                    </div>

                                    <div class="form-group  mb-3">
                                        <label for="inputEmail4" class="form-label">Writer </label>
                                        <select name="user_id" class="form-select" id="user_id">
                                                <option>Select Writer </option>
                                            @foreach($adminuser as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-12 mb-3">
                                        <label for="inputEmail4" class="form-label">News Details  </label>
                                        <textarea  class="ckeditor form-control" name="news_details"></textarea>
                                    </div>

                                       <div class="row">
                                           <div class="col-lg-6">
                                               <div class="form-check mb-2 form-check-primary">
                                                   <input class="form-check-input" type="checkbox" name="breaking_news" value="1" id="customckeck1"  >
                                                   <label class="form-check-label" for="customckeck1">Breaking News</label>
                                               </div>

                                               <div class="form-check mb-2 form-check-primary">
                                                   <input class="form-check-input" type="checkbox" name="  top_slider" value="1" id="customckeck1"  >
                                                   <label class="form-check-label" for="customckeck2">Top Slider</label>
                                               </div>

                                           </div>


                                                <div class="col-lg-6">
                                              <div class="form-check mb-2 form-check-danger">
                                               <input class="form-check-input" name="first_section_three" type="checkbox" value="1" id="customckeck3"  >
                                               <label class="form-check-label" for="customckeck3">First Section Three</label>
                                           </div>

                                               <div class="form-check mb-2 form-check-danger">
                                               <input class="form-check-input"  name="first_section_nine" type="checkbox" value="1" id="customckeck3" >
                                               <label class="form-check-label" for="customckeck4">First Section Nice</label>
                                           </div>

                                           </div>

                                       </div>

                                </div><!-- end border-->

                            </div>
                            <div class="col-md-4">

                                    <div class="border p-3 rounded">

                                        <div class="form-group mb-3">
                                            <button type="submit" class="btn btn-primary w-100">Publish</button>
                                        </div>

                                        <div class="from-group mb-3">
                                            <label class="form-label"> Date</label>
                                            <input class="form-control" type="date" name="date"  id="date" >
                                        </div>

                                        <div class="from-group mb-3">
                                            <label class="form-label"> Venue</label>
                                            <input class="form-control" type="text" name="venue"  id="venue"  >
                                        </div>


                                        <div class="form-group  mb-3">
                                            <label for="inputEmail4" class="form-label">Category Name </label>
                                            <select name="category_id" class="form-select" id="category_id">
                                                <option>Select Category </option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="inputEmail4" class="form-label"> Sub Category </label>
                                            <select name="subcategory_id" class="form-select" id="subcategory_id">
                                                <option></option>

                                            </select>
                                        </div>

                                        <hr>

                                        <div class="form-group mb-3">
                                            <label for="inputEmail4" class="form-label">Tags  </label>
                                            <input type="text" name="tags" class="selectize-close-btn" value="hezbut_tawheed">
                                        </div>

                                        <div class="form-group mb-3 text-center">
                                            <label for="example-fileinput" class="form-label"> </label>
                                            <img id="showImage" src="{{ url('upload/no_image.jpg') }} " class="avatar-lg img-thumbnail"
                                                alt="profile-image">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="example-fileinput" class="form-label">News Post Photo</label>
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



 <!-- Init js-->
 <script src="{{ asset('backend/assets/js/pages/form-advanced.init.js') }}"></script>
<!-- InputTags js-->


<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script type="text/javascript">
    CKEDITOR.replace('news_details', {
        filebrowserUploadUrl: "{{route('admin.blogpost.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

{{-- <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            ckfinder: {
                uploadUrl: '{{route('admin.blogpost.upload').'?_token='.csrf_token()}}',
            }
        })
        .catch( error => {});
</script> --}}



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

<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/admin/subcategory/ajax') }}/"+category_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data){
                        $('select[name="subcategory_id"]').html('');
                        var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'"> ' + value.name + '</option>');
                        });
                    },
                });
            } else{
                alert('danger');
            }
        });
    });

</script>
@endsection

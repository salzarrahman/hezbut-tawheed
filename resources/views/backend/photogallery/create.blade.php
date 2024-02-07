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

@section('page_title', 'Photo gallery')

@section('breadcrumb_link_one',$segment_one)
@section('breadcrumb_link_two',$segment_two)

@section('page_style')

@endsection

@section('page-content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <form id="myForm" method="post" action="{{ route('admin.photo_gallery.store') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="border p-3 rounded">
                                    <div class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                                        <h6 class="mb-0 text-pink">Image size will be 1100 X 700 px.</h6>
                                    </div>

                                    <hr>

                                    <div class="form-group mb-3 text-center">
                                        <label for="example-fileinput" class="form-label"> </label>
                                        <img id="showImage" src="{{ url('upload/no_image.jpg') }} " class="avatar-lg img-thumbnail"
                                            alt="profile-image">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="example-fileinput" class="form-label">Future Images</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                    <hr>


                                    <div class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                                        <h6 class="mb-0 text-pink">Image size will be 859 X 580 px.</h6>
                                    </div>
                                    <div class="form-group mb-3 text-center">
                                        <label for="example-fileinput" class="form-label"> </label>
                                        <div class="row" id="preview_img"></div>
                                        <div class="row" id="preview_input"></div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputEmail4" class="form-label">Multi Photo Gallery </label>
                                        <input type="file" name="multi_image[]" class="form-control" id="multiImg" multiple=""  >
                                    </div>



                                </div><!-- end border-->
                            </div>
                            <div class="col-md-4">
                                <div class="border p-3 rounded">

                                    <div class="from-group mb-3">
                                        <label class="form-label"> Date</label>
                                        <input class="form-control" type="date" name="date"  id="date" >
                                    </div>

                                    <div class="from-group mb-3">
                                        <label class="form-label"> Venue</label>
                                        <input class="form-control" type="text" name="venue"  id="venue"  >
                                    </div>


                                    <div class="from-group mb-3">
                                        <label class="form-label"> Title</label>
                                        <textarea class="form-control" type="text" name="title"  id="title" rows="2" cols="2"></textarea>
                                        <p class="mt-1" id="slider_title_noticeArea"></p>
                                    </div>

                                    <div class="form-group  mb-3">
                                        <label for="inputEmail4" class="form-label">Category Name </label>
                                        <select name="category_id" class="form-select" id="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputEmail4" class="form-label"> Sub Category </label>
                                        <select name="subcategory_id" class="form-select" id="subcategory_id">
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}" >{{ $subcategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputEmail4" class="form-label">Tags  </label>
                                        <input type="text" name="tags" class="selectize-close-btn" value="hezbut_tawheed">
                                    </div>
                                    <hr>
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary w-100">Publish</button>
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


<script>
    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('avatar-lg img-thumbnail').attr('src', e.target.result).width(175).height(100); //create image element
                        var input = $('<input/>').addClass('form-control').attr('name', 'captions[]').attr('value', 'captions').width(175); //create image element
                        $('#preview_img').append(img); //append image to output element
                        $('#preview_input').append(input); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
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

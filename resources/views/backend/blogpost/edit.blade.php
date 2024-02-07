@extends('backend.layouts.backend')

@section('page_title', 'Blogpost')

@section('breadcrumb_link_one',Str::ucfirst(Request::segment(2)))
@section('breadcrumb_link_two',Str::ucfirst(Request::segment(3)))



@section('page_style')

@endsection

@section('page-content')
<div class="card">
    <div class="card-header">

    </div><!-- end card-header-->
    <div class="card-body">

            <form id="myForm" method="post" action="{{ route('admin.blogpost.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $blogpost->id }}">
                <div class="row">
                    <div class="col-md-8">
                        <div class="border p-3 rounded">

                            <div class="form-group mb-3">
                                <label for="inputEmail4" class="form-label">News Title  </label>
                                <input type="text" name="news_title" class="form-control" id="inputEmail4" value="{{ $blogpost->news_title }}" >
                            </div>

                            <div class="form-group mb-3">
                                <label for="inputEmail4" class="form-label">Writer  </label>
                                    <select name="user_id" class="form-select" id="example-select">
                                        <option>Select Writer </option>
                                        @foreach($adminuser as $user)
                                        <option value="{{ $user->id }}" {{ $user->id == $blogpost->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="inputEmail4" class="form-label">News Details  </label>
                                    <textarea name="news_details" id="editor">
                                        {!! $blogpost->news_details !!}
                                    </textarea>
                            </div>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input" type="checkbox" name="breaking_news" value="1" id="customckeck1"
                                            {{ $blogpost->breaking_news == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="customckeck1">Breaking News</label>
                                    </div>

                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input" type="checkbox" name="top_slider" value="1" id="customckeck2"
                                            {{ $blogpost->top_slider == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="customckeck2">Top Slider</label>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-check mb-2 form-check-danger">
                                        <input class="form-check-input" name="first_section_three" type="checkbox" value="1" id="customckeck3"
                                            {{ $blogpost->first_section_three == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="customckeck3">First Section Three</label>
                                    </div>

                                    <div class="form-check mb-2 form-check-danger">
                                        <input class="form-check-input" name="first_section_nine" type="checkbox" value="1" id="customckeck4"
                                            {{ $blogpost->first_section_nine == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="customckeck4">First Section Nine</label>
                                    </div>

                                </div>

                            </div>

                        </div>  <!-- end border -->
                    </div> <!-- end col -->

                    <div class="col-md-4">
                        <div class="border p-3 rounded">
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary w-100">Publish</button>
                            </div>

                            <div class="form-group mb-3">
                                <label for="inputEmail4" class="form-label">Category Name </label>
                                <select name="category_id" class="form-select" id="example-select">
                                    <option>Select Category </option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $blogpost->category_id ? 'selected' : '' }}>{{ $category->category}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="from-group mb-3">
                                <label class="form-label"> Date</label>
                                <input class="form-control" type="date" name="date"  id="date" value="{{ $blogpost->date ?? '' }}">
                            </div>

                            <div class="from-group mb-3">
                                <label class="form-label"> Venue</label>
                                <input class="form-control" type="text" name="venue"  id="venue" value="{{ $blogpost->venue ?? '' }}" >
                            </div>


                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="form-label"> Sub Category </label>
                            <select name="subcategory_id" class="form-select" id="example-select">
                                @if($blogpost->subcategory_id == NULL)

                                @else
                                <option>Select SubCategory </option>
                                @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}"
                                    {{ $subcategory->id == $blogpost->subcategory_id ? 'selected' : '' }}> {{ $subcategory->name }}</option>
                                @endforeach

                                @endif
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="form-label">Tags  </label>
                            <input type="text" name="tags" class="selectize-close-btn" value="{{  $blogpost->tags }}">
                        </div>


                        <div class="form-group mb-3">
                            <label for="example-fileinput" class="form-label"> </label>
                            <img id="showImage" src="{{ asset($blogpost->image) }}" class=" avatar-lg img-thumbnail" alt="profile-image">
                        </div>

                        <div class="form-group mb-3">
                            <label for="example-fileinput" class="form-label">News Post Photo</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        </div>  <!-- end border -->
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </form>


    </div> <!-- end card-body-->
</div> <!-- end card--->

@endsection
@section('scripts')
@parent
 <!-- Init js-->
 <script src="{{ asset('backend/assets/js/pages/form-advanced.init.js') }}"></script>
<!-- InputTags js-->

{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

{{-- <script>tinymce.init({selector:'textarea'});</script> --}}
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            ckfinder: {
                uploadUrl: '{{route('admin.blogpost.upload').'?_token='.csrf_token()}}',
            }
        })
        .catch( error => {});
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

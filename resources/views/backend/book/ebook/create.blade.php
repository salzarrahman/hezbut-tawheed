
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

@section('page_title', 'Book Mangment')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)



@section('page_style')

@endsection

@section('page-content')


<div class="row">
    <div class="col-lg-12 mx-auto">
        <form action="{{ route('admin.book_mangment.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                <div class="d-sm-flex align-items-center">
                    <h5 class="mb-2 mb-sm-0">Add new book</h5>
                    <div class="ms-auto">
                    <button type="submit" class="btn btn-secondary">Save to Draft</button>
                    <button type="submit" class="btn btn-primary">Publish Now</button>
                    </div>
                </div>
                </div>
                <div class="card-body">
                <div class="row g-3">
                    <div class="col-12 col-lg-8">
                    <div class="card shadow-none bg-light border">
                        <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                            <label class="form-label">Title</label>
                            <input name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Book title" value="{{ old('title') }}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="col-12">
                            <label class="form-label">Authors </label>
                            <input name="authors" id="authors" type="text" class="form-control @error('authors') is-invalid @enderror" placeholder="Authors" value="{{ old('authors') }}">
                            @error('authors')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="col-12">
                            <label class="form-label">Publisher Name </label>
                            <input name="publisher_name" id="publisher_name" type="text" class="form-control  @error('publisher_name') is-invalid @enderror" placeholder="Publisher Name" value="{{ old('publisher_name') }}">
                            @error('publisher_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>


                            <div class="col-12 col-lg-4">
                            <label class="form-label">Publication Year</label>
                            <input name="publication_year" id="publication_year" type="text" class=" form-control @error('publication_year') is-invalid @enderror" placeholder="Publication Year" value="{{ old('publication_year') }}">
                            @error('publication_year')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="col-12 col-lg-4">
                            <label class="form-label">ISBN Number</label>
                            <input name="isbn_number" id="isbn_number" type="text" class="form-control @error('isbn_number') is-invalid @enderror" placeholder="ISBN Number" value="{{ old('isbn_number') }}">
                            @error('isbn_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="col-12 col-lg-4">
                            <label class="form-label">Book Edition</label>
                            <input name="book_edition" id="book_edition" type="text" class="form-control @error('book_edition') is-invalid @enderror" placeholder="Book Edition" value="{{ old('book_edition') }}">
                            @error('isbn_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="col-12">
                            <label class="form-label">Country Origin</label>
                            <input name="country_origin" id="country_origin" type="text" class="form-control @error('country_origin') is-invalid @enderror" placeholder="Country Origin"  value="{{ old('country_origin') }}">
                            @error('country_origin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="col-12">
                            <label class="form-label">Full description</label>
                                <textarea name="description" id="description"  class="ckeditor form-control @error('description') is-invalid @enderror" name="news_details">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr>

                        <div class="col-md-3">
                            <div class="form-check mb-2 form-check-primary">
                                <input name="featured" id="customckeck1" class="form-check-input" type="checkbox" value="1">
                                <label class="form-check-label" for="customckeck1">Featured</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check mb-2 form-check-primary">
                                <input name="top_slider" id="customckeck2" class="form-check-input" type="checkbox" value="1">
                                <label class="form-check-label" for="customckeck2"> Slider </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check mb-2 form-check-danger">
                                <input name="section" id="customckeck3" class="form-check-input"  type="checkbox" value="1">
                                <label class="form-check-label" for="customckeck3">Section</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check mb-2 form-check-danger">
                                <input name="private"  id="customckeck4" class="form-check-input"  type="checkbox" value="1">
                                <label class="form-check-label" for="customckeck4">Private</label>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-12 col-lg-4">
                    <div class="card shadow-none bg-light border">
                        <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                            <label class="form-label">Price</label>
                            <input name="price" id="price" type="text" class="form-control  @error('price') is-invalid @enderror" placeholder="Price" value="{{ old('price') }}">
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-12">
                            <label class="form-label">Categories</label>
                            <select name="categorie_id" id="categorie_id" class="form-select  @error('categorie_id') is-invalid @enderror">
                                    <option value=""  >Select</option>
                                @foreach (App\Models\BookCategory::get() as $key => $item)
                                    <option value="{{ $item->id }}" @if(Request::get('categorie_id')  == $item->id) selected @endif> {{ $item->title }}</option>
                                @endforeach
                            </select>
                                @error('categorie_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                            <hr>
                                <h5 class="text-center">Cover Image</h5>
                            <hr>
                            <div class="form-group mb-3 text-center">
                                <label for="example-fileinput" class="form-label"> </label>
                                <img id="showImage" src="{{ url('upload/no_image.jpg') }} " class="avatar-sm img-thumbnail" alt="profile-image">
                            </div>

                            <div class="form-group mb-3">
                                <input type="file" name="cover_image" id="image" class="form-control @error('cover_image') is-invalid @enderror" >
                                @error('cover_image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr >
                            <h5 class="text-center">eBook File</h5>
                            <hr>
                            <div class="form-group mb-3 text-center"  id="image-holder">
                            <img id="noFile" src="{{ url('upload/no_file.jpg') }}" class="avatar-sm img-thumbnail" style="height: 125px">
                            </div>

                            <div class="mb-3">
                                <input type="file" name="file" id="upload"  class="form-control @error('file') is-invalid @enderror" accept="application/pdf,image/*" >
                                @error('file')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            </div>

                        </div>
                        <!--end row-->
                        </div>
                    </div>
                    </div>

                </div>
                <!--end row-->
                </div>
            </div>
        </form>
    </div>
  </div>
  <!--end row-->


@endsection
@section('scripts')
@parent

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script type="text/javascript">
    CKEDITOR.replace('news_details', {
        filebrowserUploadUrl: "{{route('admin.blogpost.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
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

<script type="text/javascript">
function readURL(input, imgno) {

let file = input.files[0];

// file validation code not shown

var reader = new FileReader();

reader.onload = function(e) {
  let src = file.type.startsWith("image") ? e.target.result : defaultImage;
  let size = (file.size / 1024).toFixed(0);
  let date = new Date(file.lastModified).toLocaleDateString();

  $("#image-holder").append(`
    <div id="image-holder-${imgno}" class="list-group-item">
          <img id="mage-holder" src="${src}" class="avatar-sm img-thumbnail" style="height: 125px">
        <hr>
          Filename: ${file.name};
          Size: ${size} kb;
    </div>
  `);
  $("#noFile").addClass('d-none');
}
reader.readAsDataURL(file);
}

let defaultImage = "https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/833px-PDF_file_icon.svg.png";
upload.addEventListener("change", function(e) {
readURL(this, 1);
});
</script>

@endsection

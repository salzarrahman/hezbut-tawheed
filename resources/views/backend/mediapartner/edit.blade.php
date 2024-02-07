@extends('backend.layouts.backend')

@section('page_title', 'Edit Category')

@section('breadcrumb_link_one',Str::ucfirst(Request::segment(2)))
@section('breadcrumb_link_two',Str::ucfirst(Request::segment(3)))
@section('breadcrumb_link_three',Str::ucfirst(Request::segment(4)))



@section('page_style')


@endsection

@section('page-content')

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
              <div class="border p-3 rounded">
              <h6 class="mb-0 ">Update media partner</h6>
              <hr>


              <form id="myForm" method="post" action="{{ route('admin.media_partner.update') }}" enctype="multipart/form-data">
                @csrf


                <input type="hidden" name="id" value="{{ $media_partner->id }}">

              <div class="row g-3">

                <div class="col-12">
                  <label class="form-label">Name</label>
                  <input type="text" name="title" class="form-control" id="title" value="{{ $media_partner->title }}" >
                </div>
                <div class="col-12">
                    <label class="form-label">Link</label>
                    <input type="text" name="link" class="form-control" id="link" value="{{ $media_partner->link }}" >
                  </div>
                  <div
                  class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                  <h6 class="mb-0 text-pink">Image size will be 100 X 80 px. Background must
                      be transparent</h6>
              </div>

              <div class="form-group mb-3 text-center">
                  <label for="example-fileinput" class="form-label"> </label>
                  <img id="showImage" src="{{ asset($media_partner->image) }}" class=" avatar-lg img-thumbnail" alt="profile-image">
              </div>

              <div class="form-group mb-3">
                  <label for="example-fileinput" class="form-label">Logo</label>
                  <input type="file" name="image" id="image" class="form-control">
              </div>

                <div class="col-12">
                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update </button>
                  </div>
                </div>
              </div>
              </form>
            </div>
            </div>
          </div>

    </div>
    <div class="col-md-8">


    </div>
</div>


@endsection
@section('scripts')
@parent

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection

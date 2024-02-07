@extends('backend.layouts.backend')

@section('page_title', 'Edit Category')

@section('breadcrumb_link_one',Str::ucfirst(Request::segment(2)))
@section('breadcrumb_link_two',Str::ucfirst(Request::segment(3)))
@section('breadcrumb_link_three',Str::ucfirst(Request::segment(4)))



@section('page_style')


@endsection

@section('page-content')


    <div class="card">
        <div class="card-header">
            <h6 class="mb-0 ">Update media partner</h6>
        </div> <!-- End card-header -->

        <div class="card-body">
            <form id="myForm" method="post" action="{{ route('admin.abilities.update') }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $abilities->id }}">

                <div class="row">
                    <div class="col-md-8">
                        <div class="border p-3 rounded">

                            <div class="from-group mb-3">
                                <label class="form-label"> Category</label>
                                <select class=" form-control" name="category" id="category">
                                    <option value="">Select</option>
                                    <option value="left_block_tilte"  {{ $abilities->category == 'left_block_tilte' ? 'selected' : '' }}>Left Block Title</option>
                                    <option value="right_block_tilte"  {{ $abilities->category == 'right_block_tilte' ? 'selected' : '' }}>Right Block Title</option>
                                    <option value="Our Modus Operandi"  {{ $abilities->category == 'Our Modus Operandi' ? 'selected' : '' }}>Our Modus Operandi</option>
                                    <option value="Our Policies" {{ $abilities->category == 'Our Policies' ? 'selected' : '' }}>Our Policies </option>
                                </select>

                            </div>

                            <div class="from-group mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="title" class="form-control" id="title" value="{{ $abilities->title }}">
                            </div>

                            <div class="from-group mb-3">
                                <label class="form-label"> Summary</label>
                                <textarea class="form-control" type="text" name="summary" id="summary" rows="4" cols="4">{{ $abilities->summary }} </textarea>
                            </div>

                            <div class="from-group mb-3">
                                <label class="form-label">Link</label>
                                <input type="text" name="link" class="form-control" id="link" value="{{ $abilities->link }}">
                            </div>

                        </div> <!--- End border --->
                    </div> <!--- End col-md-8 --->

                    <div class="col-md-4">
                        <div class="border p-3 rounded">
                            <div class="form-group mb-3 card-header radius-10 border-0 border-start border-pink border-3">
                                <h6 class="mb-0 text-pink">Image size will be 503 X 514 px. Background must be transparent</h6>
                            </div>

                            <div class="form-group mb-3 text-center">
                                <label for="example-fileinput" class="form-label"> </label>
                                <img id="showImage" src="{{ asset($abilities->image) }}" class=" avatar-lg img-thumbnail"
                                    alt="profile-image">
                            </div>

                            <div class="form-group mb-3">
                                <label for="example-fileinput" class="form-label">Logo</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Update </button>
                                </div>
                            </div>

                        </div><!--- End border --->
                    </div> <!--- End col-md-4 --->












                </div>
            </form>

        </div><!-- End card boody -->
    </div><!-- End card -->




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

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
              <h6 class="mb-0 ">Update Category</h6>
              <hr>


              <form id="myForm" method="post" action="{{ route('admin.category.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $category->id }}">

              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label">Name</label>
                  <input type="text" name="category_name" class="form-control" id="inputEmail4" value="{{ $category->category }}" >
                  <p>The name is how it appears on your site.</p>

                </div>
                <div class="col-12  d-none">
                  <label class="form-label">Slug</label>
                  <input type="text" name="category_slug" class="form-control" id="category_slug"  value="{{ $category->category_slug }}">
                  <p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                </div>


                <div class="col-12">
                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update Category</button>
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
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                category_name: {
                    required : true,
                },
            },
            messages :{
                category_name: {
                    required : 'Please Enter Category Name',
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



@endsection

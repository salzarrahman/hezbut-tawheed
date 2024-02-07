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

@section('page_title', 'Subcategory Edit')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)



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


              <form id="myForm" method="post" action="{{ route('admin.subcategory.update') }}">
                @csrf

                <input type="hidden" name="id" value="{{ $subcategory->id }}">

              <div class="row">

                <div class="form-group mb-3">
                    <label for="inputEmail4" class="form-label">Category Name </label>
                    <select name="category_id" class="form-select" id="example-select">
                        <option> Select One Category </option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }} >{{ $category->category }}</option>
                       @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="inputEmail4" class="form-label">SubCategory Name </label>
                    <input type="text" name="subcategory_name" class="form-control" id="inputEmail4" value="{{ $subcategory->name }}">
                </div>

                <div class="col-12">
                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update Sub Category</button>
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

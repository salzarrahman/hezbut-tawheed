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

@section('page_title', 'Media Partner')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)



@section('page_style')


@endsection

@section('page-content')

<div class="row">
        <div class="card">
            <div class="card-body">
              <div class="border p-3 rounded">

              <form id="myForm" method="post" action="{{ route('admin.adminuser.store') }}">
                  @csrf

                  <div class="row">
                      <div class="form-group col-md-6 mb-3">
                          <label for="inputEmail4" class="form-label">User Name </label>
                          <input type="text" name="username" class="form-control" id="inputEmail4">
                      </div>

                      <div class="form-group col-md-6 mb-3">
                          <label for="inputEmail4" class="form-label"> Name </label>
                          <input type="text" name="name" class="form-control" id="inputEmail4">
                      </div>

                      <div class="form-group col-md-6 mb-3">
                          <label for="inputEmail4" class="form-label">Email </label>
                          <input type="email" name="email" class="form-control" id="inputEmail4">
                      </div>

                      <div class="form-group col-md-6 mb-3">
                          <label for="inputEmail4" class="form-label">Phone </label>
                          <input type="text" name="phone" class="form-control" id="inputEmail4">
                      </div>

                      <div class="form-group col-md-6 mb-3">
                          <label for="inputEmail4" class="form-label">Password </label>
                          <input type="password" name="password" class="form-control" id="inputEmail4">
                      </div>

                  </div>

                  <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>

              </form>

            </div>
            </div>
          </div>
    </div>
</div>


@endsection
@section('scripts')
@parent

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                username: {
                    required : true,
                },
                name: {
                    required : true,
                },
                email: {
                    required : true,
                },
                phone: {
                    required : true,
                },
                password: {
                    required : true,
                },
            },
            messages :{
                username: {
                    required : 'Please Enter User Name',
                },
                name: {
                    required : 'Please Enter Your Name',
                },
                email: {
                    required : 'Please Enter Your Email',
                },
                phone: {
                    required : 'Please Enter Your Phone',
                },
                password: {
                    required : 'Please Enter Your Password',
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

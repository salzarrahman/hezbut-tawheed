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

@section('page_title', 'Abilities')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)




@section('page_style')

<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{ asset('backend/assets/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">

@endsection

@section('page-content')


@if(Route::current()->getName() == 'admin.activemenu.create')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{  route('admin.activemenu.store') }}" enctype="multipart/form-data">
            @csrf
        <div class="border p-3 rounded">

            <div class="form-group mb-3">
                <label class="form-label">Name</label>
                <select class="form-control" name="title" id="title">
                    <option value="">Select</option>
                    <option value="Header">Header Menu</option>
                    <option value="Footer Nevigation">Footer Nevigation Menu</option>
                    <option value="Footer Important">Footer Important Menu</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label class="required" for="category_id">{{ __('menu') }}</label>
                <select class="form-control duallistbox @error('category_id') is-invalid @enderror" name="category_id[]" id="category_id" multiple required>
                   @foreach($categories as $id => $categorie)
                    <option value="{{ $id }}" {{ in_array($id, old('category_id', [])) ? 'selected' : '' }}>
                        {{$categorie }}
                        </option>
                   @endforeach
               </select>
                @if($errors->has('category_id'))
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                @endif
            </div>
            <div class="form-group  text-center mt-3">
                <button class="btn  deeptouchit_btn col-md-4" type="submit">
                    <i class="fa fa-save"></i> {{__('Save') }}
                </button>
            </div>
        </div> <!-- End border-->
        </form>
    </div> <!-- End Card Body -->
</div> <!-- End Card-->
@endif


@if(Route::current()->getName() == 'admin.menu.create')
<div class="card">
    <div class="card-body">
        <div class="border p-3 rounded">
            <h6 class="mb-0 ">Add menu </h6>
            <hr>
            <form id="myForm" method="post" action="{{ route('admin.menu.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Name</label>
                        <input type="text" name="menu_name" class="form-control" id="inputEmail4"placeholder="Add Menu">
                        <p>The name is how it appears on your site.</p>
                    </div>
                    <div class="col-12 d-none">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control">
                        <p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Add New Menu</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endif
@endsection
@section('scripts')
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('backend/assets/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<script>
    $('.duallistbox').bootstrapDualListbox()
</script>


@endsection

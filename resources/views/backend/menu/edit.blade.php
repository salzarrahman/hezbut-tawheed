@extends('backend.layouts.backend')

@section('page_title', 'Edit Category')

@section('breadcrumb_link_one',Str::ucfirst(Request::segment(2)))
@section('breadcrumb_link_two',Str::ucfirst(Request::segment(3)))
@section('breadcrumb_link_three',Str::ucfirst(Request::segment(4)))



@section('page_style')
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{ asset('backend/assets/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">


@endsection





@section('page-content')

@if(Route::current()->getName() == 'admin.menu.edit')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
              <div class="border p-3 rounded">
              <h6 class="mb-0 ">Update Menu</h6>
              <hr>

              <form id="myForm" method="post" action="{{ route('admin.menu.update') }}">
                @csrf

                <input type="hidden" name="id" value="{{ $menu->id }}">

              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label">Name</label>
                  <input type="text" name="menu_name" class="form-control" id="inputEmail4" value="{{ $menu->menu_name }}" >
                  <p>The name is how it appears on your site.</p>

                </div>
                <div class="col-12  d-none">
                  <label class="form-label">Slug</label>
                  <input type="text" name="category_slug" class="form-control" id="category_slug"  value="{{ $menu->menu_slug }}">
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
@endif

@if(Route::current()->getName() == 'admin.activemenu.edit')
<div class="card">
    <div class="card-body">

        <form id="myForm" method="post" action="{{ route('admin.activemenu.update') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $activemenu->id }}">



           {{-- {{ $decode}} --}}

            <div class="row">
                <div class="form-group mb-3">
                    <label class="form-label">Name</label>
                    <select class="form-control" name="title" id="title">
                        <option value="Header" @if(old('title', $activemenu->title) == "Header") selected @endif>Header </option>
                        <option value="Footer Nevigation" @if(old('title', $activemenu->title) == "Footer Nevigation") selected @endif>Footer Nevigation </option>
                        <option value="Footer Important" @if(old('title', $activemenu->title) == "Footer Important") selected  @endif>Footer Important </option>
                    </select>
                </div>


                <div class="form-group mb-3">
                    <label class="required" for="category_id">{{ __('Menu') }}</label>
                        <select class="form-control duallistbox @error('category_id') is-invalid @enderror" name="category_id[]" id="category_id" multiple required>
                            @foreach($categories as $id => $permission)
                            <option value="{{ $id }}"{{ (in_array($id, old('category_id', [])) || $activemenu->category->contains($id)) ? 'selected' : '' }}>
                                {{ $permission }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        @endif
                    </select>

                </div>

                <div class="form-group  text-center mt-3">
                    <button class="btn  deeptouchit_btn col-md-4" type="submit">
                        <i class="fa fa-save"></i> {{__('Save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endif


@endsection
@section('scripts')
@parent


<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('backend/assets/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<script>
    $('.duallistbox').bootstrapDualListbox()
</script>




@endsection

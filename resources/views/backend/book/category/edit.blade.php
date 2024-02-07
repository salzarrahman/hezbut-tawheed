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


              <form id="myForm" method="post" action="{{ route('admin.book_category.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $book_category->id }}">

              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label">Name</label>
                  <input type="text" name="title" class="form-control" id="inputEmail4" value="{{ $book_category->title }}" >
                  <p>The name is how it appears on your site.</p>

                </div>
                <div class="col-12  d-none">
                  <label class="form-label">Slug</label>
                  <input type="text" name="title_slug" class="form-control" id="category_slug"  value="{{ $book_category->title_slug }}">
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




@endsection

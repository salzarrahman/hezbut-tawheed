@extends('backend.layouts.backend')

@section('page_title', 'Blogpost')

@section('breadcrumb_link_one',Str::ucfirst(Request::segment(2)))
@section('breadcrumb_link_two',Str::ucfirst(Request::segment(3)))


@section('breadcrumb_sub_link')

<div class="ms-auto">
    <div class="btn-group">
        <div class="btn-group">
            <a href="{{ route('admin.blogpost.create') }}" type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span> Add News Post </span>
            </a>

          </div>
    </div>
</div>
@endsection

@section('page_style')

@endsection

@section('page-content')
@php
    CoreComponentRepository::instantiateShopRepository();
    CoreComponentRepository::initializeCache();
@endphp

<div class="card-body bg-primary rounded-top p-2">
        <form id="sort_products" class="nav-search" action="" method="GET">
            <div class="row">
                <div class="col-md-6">
                    <span class="text-white h6 p-2" >Blog Post</span>
                </div>

                <div class="col-md-3">
                    <div class="input-group">
                        <button class="btn" type="submit">
                            <i class='bx bx-search'></i>
                        </button>
                        <select class="form-select single-select" id="category_id" name="category_id" onchange="sort_products()">
                            <option value="">{{ __('All Category') }}</option>
                            @foreach (App\Models\Category::get() as $key => $item)
                                <option value="{{ $item->id }}" @if(Request::get('category_id')  == $item->id) selected   @endif> {{ $item->category }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group ">
                        <input id="search" name="search" type="text" class="form-control custom-input bg-white text-black" placeholder="Some" @isset($sort_search) value="{{ $sort_search }}" @endisset/>
                        <button class="btn" type="submit">
                            <i class='bx bx-search'></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
</div>

<div class="card">
<div class="card-body">
    <div class="row">
        <div class="col-12 col-lg-12 d-flex">
        <div class="card border shadow-none w-100">
        <div class="card-body">
            <div class="">
            <table class=" table table-bordered table-striped table-hover datatable " style="width:100%">
                <thead class="table-light">
                    <tr class="text-center">
                    <th>ID</th>
                    <th>Image </th>
                    <th>Title </th>
                    <th>Category </th>
                    <th>Date </th>
                    <th>Status </th>
                    <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($blogposts as $key=> $item)
                    <tr>

                    <td>#{{ $key+1 }}</td>
                    <td><img src="{{ asset($item->image) }} " style="width: :50px; height:50px;" ></td>
                    <td>{{ Str::limit($item->news_title,20)  }}</td>
                    <td>{{ $item['category']['category'] ?? ''  }}</td>
                    <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()  }}</td>
                    <td>
                        @if($item->status == 1)
                        <div class="btn-group" style="width: 150px">
                            <button type="button" class="btn btn-outline-success">
                                Publish
                            </button>
                            <a type="button" class="btn btn-outline-danger" href="{{ route('admin.blogpost.unpublish',$item->id) }}" title="Unpublish" >
                                <i class="bi bi-arrow-down-square"></i>
                            </a>
                        </div>
                        @else
                        <div class="btn-group" style="width: 150px">
                            <button type="button" class="btn btn-outline-danger">
                                Unpublish
                            </button>
                            <a type="button" class="btn btn-outline-success" href="{{ route('admin.blogpost.publish',$item->id) }}" title="Publish">
                                <i class="bi bi-arrow-up-square"></i>
                            </a>
                        </div>
                        @endif


                    </td>

                    <td class="text-center">

                        <a title="Preview" target="_blank" href="{{ url('blog/details/'.$item->id.'/'.$item->news_title_slug) }}"class="btn btn-sm btn-outline-primary">
                            <i class="far fa-eye" aria-hidden="true"></i>
                        </a>

                        <a title="Edit" href="{{ route('admin.blogpost.edit',$item->id) }}"class="btn btn-sm btn-outline-primary">
                            <i class="far fa-edit" aria-hidden="true"></i>
                        </a>

                        <a title="Delete" href="{{ route('admin.blogpost.destroy',$item->id) }}" class="btn btn-sm btn-outline-danger" id="delete">
                            <i class=" far fa-trash-alt" style="color: #ff1f1f;" aria-hidden="true"></i>
                        </a>

                    </td>
                    </tr>
                @endforeach

                </tbody>
                </table>
            </div>

        </div>
        </div>
    </div>
    </div><!--end row-->
</div>
<div class=" card-footer">
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $blogposts->links('pagination::bootstrap-5') }}
    </div>
    <!-- End Pagination Links  -->
</div>
</div>



@endsection
@section('scripts')
@parent
<script type="text/javascript">
         function sort_products(el){
            $('#sort_products').submit();
        }
</script>

@endsection

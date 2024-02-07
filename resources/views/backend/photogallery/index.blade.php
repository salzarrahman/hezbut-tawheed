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

@section('page_title', 'Image Gallery')

@section('breadcrumb_link_one',$segment_one)
@section('breadcrumb_link_two',$segment_two)

@section('breadcrumb_sub_link')
<div class="ms-auto">
    <div class="btn-group">
        <div class="btn-group">
            <a href="{{ route('admin.photo_gallery.create') }}" type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span> Add Image Gallery </span>
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
                        @foreach($subcategories as $item)
                            <option value="{{ $item->id }}" @if(Request::get('category_id')  == $item->id) selected   @endif>{{ $item->name }}</option>
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
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable " style="width:100%">
               <thead class="table-light">
                 <tr class="text-center">
                   <th>ID</th>
                   <th>Image </th>
                   <th>Title </th>
                   <th>Category </th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach($photo_gallery as $key=> $item)
                 <tr>
                   <td>#{{ $key+1 }}</td>
                   <td><img src="{{ asset($item->future_images) }} " style="width: :50px; height:50px;" ></td>
                   <td>{{ Str::limit($item->title,20)  }}</td>
                   <td>{{ $item['category']['category'] ?? ''  }}</td>
                   <td class="text-center">
                        <a href="{{ route('admin.photo_gallery.edit',$item->id) }}"class="btn btn-sm btn-outline-primary">
                            <i class="far fa-edit" aria-hidden="true"></i> Edit
                        </a>

                        <a href="{{ route('admin.photo_gallery.destroy',$item->id) }}" class="btn btn-sm btn-outline-danger" id="delete">
                            <i class=" far fa-trash-alt" style="color: #ff1f1f;" aria-hidden="true"></i> Delete
                        </a>
                   </td>
                 </tr>
                @endforeach

               </tbody>
             </table>
          </div>
    </div>
    <div class=" card-footer">
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $photo_gallery->links('pagination::bootstrap-5') }}
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

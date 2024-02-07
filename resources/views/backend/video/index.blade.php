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

@section('page_title', 'Video')

@section('breadcrumb_link_one',$segment_one)
@section('breadcrumb_link_two',$segment_two)

@section('breadcrumb_sub_link')
<div class="ms-auto">
    <div class="btn-group">
        <div class="btn-group">
            <a href="{{ route('admin.video.create') }}" type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span> Add New Video  </span>
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
        <div class="">
            <table class=" table table-bordered table-striped table-hover datatable " style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Action') }} </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($video as $key=> $item)
                    <tr>
                        <td>#{{ $key+1 }}</td>
                        <td>{{ Str::limit($item->title,40)  }}</td>
                        <td>
                            @if($item->status == 1)
                            <div class="btn-group" style="width: 150px">
                                <button type="button" class="btn btn-outline-success">
                                    Publish
                                </button>
                                <a type="button" class="btn btn-outline-danger" href="{{ route('admin.video.unpublish',$item->id) }}" title="Unpublish" >
                                    <i class="bi bi-arrow-down-square"></i>
                                </a>
                            </div>
                            @else
                            <div class="btn-group" style="width: 150px">
                                <button type="button" class="btn btn-outline-danger">
                                    Unpublish
                                </button>
                                <a type="button" class="btn btn-outline-success" href="{{ route('admin.video.publish',$item->id) }}" title="Publish">
                                    <i class="bi bi-arrow-up-square"></i>
                                </a>
                            </div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.video.edit',$item->id) }}"class="btn btn-sm btn-outline-primary">
                                <i class="far fa-edit" aria-hidden="true"></i> Edit
                            </a>

                            <a href="{{ route('admin.video.destroy',$item->id) }}" class="btn btn-sm btn-outline-danger" id="delete">
                                <i class=" far fa-trash-alt" style="color: #ff1f1f;" aria-hidden="true"></i> Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
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

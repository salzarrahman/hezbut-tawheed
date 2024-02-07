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

@section('page_title', 'Book Mangment')

@section('breadcrumb_link_one',$segment_one)
@section('breadcrumb_link_two',$segment_two)

@section('breadcrumb_sub_link')
<div class="ms-auto">
    <div class="btn-group">
        <div class="btn-group">
            <a href="{{ route('admin.book_mangment.create') }}" type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span> Add New </span>
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


<div class="card-body">
    <div class="card-header py-3 bg-primary rounded-top p-2">
        <form id="sort_products" class="nav-search" action="" method="GET">
            <div class="row align-items-center m-0">

                <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                    <div class="input-group">
                        <button class="btn" type="submit">
                            <i class='bx bx-search'></i>
                        </button>
                        <select class="form-select single-select" id="categorie_id" name="categorie_id" onchange="sort_products()">
                            <option value="">{{ __('All Category') }}</option>
                            @foreach (App\Models\BookCategory::get() as $key => $item)
                                <option value="{{ $item->id }}" @if(Request::get('categorie_id')  == $item->id) selected @endif> {{ $item->title }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>


                <div class="col-md-3 col-6">
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
</div>



<div class="card">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered align-middle table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Authors</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($book_mangment as $key => $item )
                        <tr>
                            <td>#{{ $key+1 }}</td>
                            <td><img src="{{ asset($item->cover_image) }} " style="width: :50px; height:50px;" ></td>
                            <td>{{$item->title ?? ''}}</td>
                            <td>{{$item->authors ?? ''}}</td>
                            <td>{{ $item['book_category']['title'] ?? ''  }}</td>
                            <td>
                                @if($item->status == 1)
                                <div class="btn-group" style="width: 150px">
                                    <button type="button" class="btn btn-sm btn-outline-success">
                                        Publish
                                    </button>
                                    <a type="button" class="btn btn-sm btn-outline-danger" href="{{ route('admin.book_mangment.unpublish',$item->id) }}" title="Unpublish" >
                                        <i class="bi bi-arrow-down-square"></i>
                                    </a>
                                </div>
                                @else
                                <div class="btn-group" style="width: 150px">
                                    <button type="button" class="btn btn-sm btn-outline-danger">
                                        Unpublish
                                    </button>
                                    <a type="button" class="btn btn-sm btn-outline-success" href="{{ route('admin.book_mangment.publish',$item->id) }}" title="Publish">
                                        <i class="bi bi-arrow-up-square"></i>
                                    </a>
                                </div>
                                @endif
                            </td>
                            <td class="text-center">
                                <a title="Preview" target="_blank" href="{{ url('blog/details/'.$item->id.'/'.$item->news_title_slug) }}"class="btn btn-sm btn-outline-primary">
                                    <i class="far fa-eye" aria-hidden="true"></i>
                                </a>

                                <a title="Edit" href="{{ route('admin.book_mangment.edit',$item->id) }}"class="btn btn-sm btn-outline-primary">
                                    <i class="far fa-edit" aria-hidden="true"></i>
                                </a>

                                <a title="Delete" href="{{ route('admin.book_mangment.destroy',$item->id) }}" class="btn btn-sm btn-outline-danger" id="delete">
                                    <i class=" far fa-trash-alt" style="color: #ff1f1f;" aria-hidden="true"></i>
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
            {{ $book_mangment->links('pagination::bootstrap-5') }}
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

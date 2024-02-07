
@extends('backend.layouts.backend')

@section('page_title', 'Category')

@section('breadcrumb_link_one',Str::ucfirst(Request::segment(2)))
@section('breadcrumb_link_two',Str::ucfirst(Request::segment(3)))


@section('page_style')

@endsection

@php
     $categories = App\Models\Category::orderBy('id', 'DESC')->latest()->get();
@endphp

@section('page-content')
<div class="row">
    <div class="col-md-5">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col  text-start">
                            Active Menu
                        </div>
                        <div class="col text-end">
                            <a href="{{ route('admin.activemenu.create') }}" class=" btn btn-sm btn-primary  ">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <table class=" table table-bordered table-striped table-hover datatable " style="width:100%">
                        <thead>
                            <tr class=" text-center">
                                <th>#</th>
                                <th>{{ __(' Name') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($activemenu as $key=> $item)
                        <tr>
                            <td>#{{ $key+1 }}</td>
                            <th style="width: 50%; ">{{ $item->title }}</th>
                            <td style="width: 10%; ">
                                @if ($item->status === 1)
                                <div class="btn-group" style="width: 100px">
                                    <a type="button" class="btn btn-outline-success btn-sm">
                                        Active
                                    </a>
                                    <a type="button" class="btn btn-outline-success btn-sm" href="{{ route('admin.activemenu.inactive',$item->id) }}" title="Inactive" >
                                        <i class="bi bi-arrow-down-square"></i>
                                    </a>
                                </div>

                                @else
                                    <div class="btn-group" style="width: 100px">
                                        <a type="button" class="btn btn-outline-danger btn-sm">
                                            InActive
                                        </a>
                                        <a type="button" class="btn btn-outline-danger btn-sm" href="{{ route('admin.activemenu.active',$item->id) }}" title="Active">
                                            <i class="bi bi-arrow-up-square"></i>
                                        </a>
                                    </div>
                                @endif
                            </td>
                            <td style="width: 40%; ">
                                <a href="{{ route('admin.activemenu.edit',$item->id) }}">
                                    <span class="badge bg-info">Edit</span>
                                </a>
                                <a href="{{ route('admin.activemenu.destroy',$item->id) }}" id="delete">
                                    <span class="badge bg-danger">Delete</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>

                </div><!--- End Card body -->
            </div><!--- End Card -->
    </div> <!--- End col-md-5 -->

    <div class="col-md-7">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col  text-start">
                        Menu List
                    </div>
                    <div class="col text-end">
                        <a href="{{ route('admin.menu.create') }}" class=" btn btn-sm btn-primary  ">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <table class=" table table-bordered table-striped table-hover datatable desktop" style="width:100%">
                        <thead>
                            <tr class=" text-center">
                                <th>#</th>
                                <th>{{ __('Menu Name') }}</th>
                                <th>{{ __('Slug') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menus as $key=> $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->menu_name }}</td>
                                <td>{{ $item->menu_slug }}</td>
                                <td>


                                    @if($item->status == 'active')


                                    <div class="btn-group" style="width: 100px">
                                        <a type="button" class="btn btn-outline-success btn-sm">
                                            Active
                                        </a>
                                        <a type="button" class="btn btn-outline-success btn-sm" href="{{ route('admin.menu.inactive',$item->id) }}" title="Inactive" >
                                            <i class="bi bi-arrow-down-square"></i>
                                        </a>
                                    </div>
                                    @else
                                        <div class="btn-group" style="width: 100px">
                                            <a type="button" class="btn btn-outline-danger btn-sm">
                                                InActive
                                            </a>
                                            <a type="button" class="btn btn-outline-danger btn-sm" href="{{ route('admin.menu.active',$item->id) }}" title="Active">
                                                <i class="bi bi-arrow-up-square"></i>
                                            </a>
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin.menu.edit',$item->id) }}"class="btn btn-sm btn-outline-primary">
                                        <i class="far fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.menu.destroy',$item->id) }}" class="btn btn-sm btn-outline-danger" id="delete">
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

    </div><!--- End col-md-7 -->
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="myForm" method="post" action="{{ route('admin.activemenu.store') }}">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label">Name</label>
                        <select class="form-control" name="title" id="title">
                            <option value="">Select</option>
                            <option value="Header">Header Menu</option>
                            <option value="Footer Nevigation">Footer Nevigation Menu</option>
                            <option value="Footer Important">Footer Important Menu</option>
                        </select>
                    </div>

                    <!-- Left side select -->

                    <div class="form-group">
                        <label class="required" for="permissions">{{ __('Permissions') }}</label>

                        <select class="form-control duallistbox @error('permissions') is-invalid @enderror"
                            name="permissions[]" id="permissions" multiple required>
                            @foreach($categories as $key => $item)
                                <option value="{{$item->category_name }}" {{ in_array($item->id, old('permissions', [])) ? 'selected' : '' }}>
                                    {{ $item->category_name }}
                                </option>
                            @endforeach
                        </select>
                        @if($errors->has('permissions'))
                        <span class="text-danger">{{ $errors->first('permissions') }}</span>
                        @endif

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </form>
    </div>
</div><!--- End modal -->


@endsection
@section('scripts')
@parent
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('backend/assets/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>


<!-- Using a local copy -->
<script src="multiselect.min.js"></script>

<!-- Using a CDN -->
<script src="https://cdn.rawgit.com/crlcu/multiselect/master/dist/js/multiselect.min.js"></script>


<script>
    $(document).ready(function() {
	$('#mySideToSideSelect').multiselect();
});
</script>

<script>
    $('.duallistbox').bootstrapDualListbox()
</script>

@endsection

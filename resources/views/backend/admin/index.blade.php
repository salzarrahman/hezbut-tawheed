@extends('backend.layouts.backend')

@section('page_title', 'Category')

@section('breadcrumb_link_one',Str::ucfirst(Request::segment(2)))
@section('breadcrumb_link_two',Str::ucfirst(Request::segment(3)))

@section('breadcrumb_sub_link')
<div class="ms-auto">
    <div class="btn-group">
        <div class="btn-group">
            <a href="{{ route('admin.adminuser.create') }}" type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span> Add Admin  </span>
            </a>

            {{-- <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end" style="">
                <a class="dropdown-item" href="#">#</a>
                <a class="dropdown-item" href="#">#</a>
                <a class="dropdown-item" href="#">#</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">#</a>
            </div> --}}
          </div>
    </div>
</div>

@endsection


@section('page_style')

@endsection

@section('page-content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable desktop" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Image </th>
                                <th>Name </th>
                                <th>Email </th>
                                <th>Phone </th>
                                <th>Status </th>
                                <th>Action </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($alladminuser as $key=> $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <img src="{{ (!empty($item->photo)) ? url('upload/admin_images/'.$item->photo): url('upload/no_image.jpg') }} "
                                        style="width: :50px; height:50px;"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>


                                    @if($item->status == 'active')
                                        <div class="btn-group" style="width: 150px">
                                            <button type="button" class="btn btn-outline-success">
                                                Active
                                            </button>
                                            <a type="button" class="btn btn-outline-success" href="{{ route('admin.adminuser.inactive',$item->id) }}" title="Inactive" >
                                                <i class="bi bi-arrow-down-square"></i>
                                            </a>
                                        </div>
                                    @else
                                        <div class="btn-group" style="width: 150px">
                                            <button type="button" class="btn btn-outline-danger">
                                                InActive
                                            </button>
                                            <a type="button" class="btn btn-outline-danger" href="{{ route('admin.adminuser.active',$item->id) }}" title="Active">
                                                <i class="bi bi-arrow-up-square"></i>
                                            </a>
                                        </div>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route('admin.adminuser.edit',$item->id) }}"class="btn btn-sm btn-outline-primary">
                                        <i class="far fa-edit" aria-hidden="true"></i> Edit
                                    </a>
                                    <a href="{{ route('admin.adminuser.destroy',$item->id) }}" class="btn btn-sm btn-outline-danger" id="delete">
                                        <i class=" far fa-trash-alt" style="color: #ff1f1f;" aria-hidden="true"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->

@endsection
@section('scripts')
@parent

@endsection

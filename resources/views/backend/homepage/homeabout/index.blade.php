@extends('backend.layouts.backend')

@section('page_title', 'Home About')

@section('breadcrumb_link_one',Str::ucfirst(Request::segment(2)))
@section('breadcrumb_link_two',Str::ucfirst(Request::segment(3)))

@section('breadcrumb_sub_link')

@if (App\Models\Slider::where('status', 1)->count() === 2)



@else
<div class="ms-auto">
    <div class="btn-group">
        <div class="btn-group">
            <a href="{{ route('admin.home-about.create') }}" type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span> Add Home About  </span>
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
@endif


@endsection


@section('page_style')


@endsection

@section('page-content')
<div class="card">
    <div class=" card-header">
        <div class="col text-start">
            {{ __('Slider section') }}
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable desktop" style="width:100%">

               <thead class="table-light">
                 <tr class="text-center">

                   <th>ID</th>
                   <th>Image </th>
                   <th>Title </th>
                   <th>Status </th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach($home_about as $key=> $item)
                 <tr>
                   <td>#{{ $key+1 }}</td>
                   <td><img src="{{ asset($item->image) }} " style="width: :50px; height:50px;" ></td>
                   <td>{{ Str::limit($item->title,40)  }}</td>
                    <td>
                        @if($item->status == 1)
                        <div class="btn-group" style="width: 150px">
                            <button type="button" class="btn btn-outline-success">
                                Publish
                            </button>
                            <a type="button" class="btn btn-outline-danger" href="{{ route('admin.home-about.unpublish',$item->id) }}" title="Unpublish" >
                                <i class="bi bi-arrow-down-square"></i>
                            </a>
                        </div>
                        @else
                        <div class="btn-group" style="width: 150px">
                            <button type="button" class="btn btn-outline-danger">
                                Unpublish
                            </button>
                            <a type="button" class="btn btn-outline-success" href="{{ route('admin.home-about.publish',$item->id) }}" title="Publish">
                                <i class="bi bi-arrow-up-square"></i>
                            </a>
                        </div>
                        @endif


                    </td>

                   <td class="text-center">
                        <a href="{{ route('admin.home-about.edit',$item->id) }}"class="btn btn-sm btn-outline-primary">
                            <i class="far fa-edit" aria-hidden="true"></i> Edit
                        </a>

                        <a href="{{ route('admin.home-about.destroy',$item->id) }}" class="btn btn-sm btn-outline-danger" id="delete">
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



@endsection

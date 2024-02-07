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

@section('page_title', 'Party Member')

@section('breadcrumb_link_one',$segment_one)
@section('breadcrumb_link_two',$segment_two)

@section('breadcrumb_sub_link')
<div class="ms-auto">
    <div class="btn-group">
        <div class="btn-group">
            <a href="{{ route('admin.party_member.create') }}" type="button" class="btn btn-primary">
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
<div class="card">
    <div class="card-body">
       <div class="row">
         <div class="col-12 col-lg-12 d-flex">
          <div class="card border shadow-none w-100">
            <div class="card-body">
              <div class="">
                <table class=" table table-bordered table-striped table-hover datatable desktop" style="width:100%">

                   <thead class="table-light">
                     <tr class="text-center">

                       <th>ID</th>
                       <th>Image</th>
                       <th>Name</th>
                       <th>Designation</th>
                       <th>Status</th>
                       <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach($party_member as $key=> $item)
                     <tr>

                       <td>#{{ $key+1 }}</td>
                       <td><img src="{{ asset($item->image) }} " style="width: :50px; height:50px;" ></td>
                       <td>{{ $item->name ?? '' }}</td>
                       <td>{{ $item->designation ?? '' }}</td>

                        <td>
                            @if($item->status == 1)
                                <div class="btn-group" style="width: 150px">
                                    <button type="button" class="btn btn-outline-success">
                                        Active
                                    </button>
                                    <a type="button" class="btn btn-outline-danger" href="{{ route('admin.party_member.unpublish',$item->id) }}" title="InActive" >
                                        <i class="bi bi-arrow-down-square"></i>
                                    </a>
                                </div>
                            @else
                                <div class="btn-group" style="width: 150px">
                                    <button type="button" class="btn btn-outline-danger">
                                        InActive
                                    </button>
                                    <a type="button" class="btn btn-outline-success" href="{{ route('admin.party_member.publish',$item->id) }}" title="Active">
                                        <i class="bi bi-arrow-up-square"></i>
                                    </a>
                                </div>
                            @endif


                        </td>

                       <td class="text-center">

                            <a title="Preview" target="_blank" href="{{ url('party-member/'.$item->slug_name) }}"class="btn btn-sm btn-outline-primary">
                                <i class="far fa-eye" aria-hidden="true"></i>
                            </a>

                            <a title="Edit" href="{{ route('admin.party_member.edit',$item->id) }}"class="btn btn-sm btn-outline-primary">
                                <i class="far fa-edit" aria-hidden="true"></i>
                            </a>

                            <a title="Delete" href="{{ route('admin.party_member.destroy',$item->id) }}" class="btn btn-sm btn-outline-danger" id="delete">
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
  </div>


@endsection
@section('scripts')
@parent



@endsection

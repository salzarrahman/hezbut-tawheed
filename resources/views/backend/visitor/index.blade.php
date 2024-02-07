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

@section('page_title', 'Visitor')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)

@section('breadcrumb_sub_link')

<div class="ms-auto">
    <div class="btn-group">
        <div class="btn-group">
            <a href="{{ route('admin.subscriber.send-email') }}" type="button" class="btn btn-primary">
                <span> Send Message </span>
            </a>


          </div>
    </div>
</div>
@endsection


@section('page_style')


@endsection


@section('page-content')




<div class="card">
    <div class="card-header py-3">
      <h6 class="mb-0">Blog Post </h6>
    </div>
    <div class="card-body">
       <div class="row">
         <div class="col-12 col-lg-12 d-flex">
          <div class="card border shadow-none w-100">
            <div class="card-body">
              <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable desktop" style="width:100%">
                   <thead class="table-light">
                     <tr class="text-center">
                       <th>#</th>
                       <th>Ip</th>
                       <th>Country </th>
                       <th>City </th>
                       <th >Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach($visitor as $key=> $item)
                     <tr>

                        <td>#{{ $loop->iteration }}</td>
                        <td>{{ $item->ip_address  ?? ''  }}</td>
                        <td>{{$item->country  ?? ''  }}</td>
                        <td>{{$item->city  ?? ''  }}</td>

                       <td class="text-center">

                            <a href="{{ route('admin.visitor.details',$item->id) }}"class="btn btn-sm btn-outline-primary">
                                <i class="far fa-eye" aria-hidden="true"></i> Details
                            </a>
                            <a href="{{ route('admin.visitor.destroy',$item->id) }}" class="btn btn-sm btn-outline-danger" id="delete">
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
        </div>
       </div><!--end row-->
    </div>
  </div>



@endsection
@section('scripts')
@parent


@endsection

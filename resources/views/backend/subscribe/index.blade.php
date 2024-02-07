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

@section('page_title', 'Subscriber')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)

@section('breadcrumb_sub_link')

<div class="ms-auto">
    <div class="btn-group">
        <div class="btn-group">
            <a href="{{ route('admin.subscriber.send-email') }}" type="button" class="btn btn-primary">
                <span> Send Message </span>
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



{{-- <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-xl-6 row-cols-xxl-6">
    <div class="col">
      <div class="card radius-10">
        <div class="card-body text-center">
          <div class="widget-icon mx-auto mb-3 bg-light-primary text-primary">
            <i class="bi bi-chat-left-fill"></i>
          </div>
           <h3>{{count($subscribers)}}</h3>
           <p class="mb-0">All Subscriber</p>
        </div>
      </div>
    </div>
</div> --}}

<div class="card">
    <div class="card-header py-3">
      <h6 class="mb-0">Blog Post</h6>
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
                       <th>Subscriber Email </th>
                       <th>Subscriber Date </th>
                       <th>Status </th>
                       <th >Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach($subscribers as $key=> $item)
                     <tr>

                       <td>#{{ $loop->iteration }}</td>
                       <td>{{ $item->email  ?? ''  }}</td>
                        <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()  }}</td>
                        <td>
                            @if($item->status == 'Active')
                            <div class="btn-group">
                                <span type="button" class="badge bg-success">
                                    Verify
                                </span>
                            </div>
                            @else
                            <div class="btn-group" >
                                <span type="button" class="badge bg-danger">
                                    Not Verify
                                </span>
                            </div>
                            @endif


                        </td>

                       <td class="text-center">

                            <a href="{{ route('admin.subscriber.send-singel-email',$item->id) }}"class="btn btn-sm btn-outline-primary">
                                <i class="far fa-envelope" aria-hidden="true"></i> Send
                            </a>
                            <a href="{{ route('admin.blogpost.destroy',$item->id) }}" class="btn btn-sm btn-outline-danger" id="delete">
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



{{-- <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Blog, Show!</title>
  </head>
  <body>


    <div class="text-center">
        <h1>Message Send All</h1>
        <p>New Anouncment Send to All Subscribe.</p>
        <a href="{{ route('admin.subscribers.send-email') }}">
          <button class="btn btn-md btn-success"> Message</button>
        </a>
      </div>

      <br><br>


<div class="section-body">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Subscriber Email</th>
                                    <th>Subscriber Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscribers as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html> --}}

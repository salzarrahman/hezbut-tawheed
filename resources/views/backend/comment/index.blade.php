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

@section('page_title', 'Comment')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)

@section('breadcrumb_sub_link')

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
                       <th>#</th>
                       <th>Name </th>
                       {{-- <th>Blogpost id</th> --}}
                       <th>Comment</th>
                       <th width="150">Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach($comment as $key=> $item)
                     <tr>
                        <td>#{{$loop->iteration }}</td>
                        <td>
                            @if($item->user->name ?? ''  != null)
                                {{ $item->user->name ?? ''}}
                            @else
                                {{ $item->name ?? ''}} - guest
                            @endif

                        </td>
                        {{-- <td>
                          <a href="" title="Replay"> {{$item->blogpost_id  ?? ''  }} </a>

                        </td> --}}
                        <td>{{ $item->body ?? '' }}</td>
                        <td class="text-center ">

                            @php
                                   $blogpost       = App\Models\Blogpost::findOrFail($item->blogpost_id);
                            @endphp

                            <a title="show" href="{{ url('blog/details/'.$blogpost->id.'/'.$blogpost->news_title_slug) }}"class="btn btn-sm btn-outline-primary">
                                <i class="far fa-eye" aria-hidden="true"></i>
                            </a>

                            <a title="Replay" href="{{ route('admin.comments.sendemail',$item->id) }}"class="btn btn-sm btn-outline-primary">
                                <i class="far fa-envelope" aria-hidden="true"></i>
                            </a>

                            <a  title="Delete " href="{{ route('admin.comments.destroy',$item->id) }}" class="btn btn-sm btn-outline-danger" id="delete">
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



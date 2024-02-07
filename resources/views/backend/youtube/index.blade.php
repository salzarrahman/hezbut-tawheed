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
            <a href="{{ route('admin.photo_gallery.create') }}" type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span> Add Image  </span>
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
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
              <div class="border p-3 rounded">
              <h6 class="mb-0 ">Check youtube video id</h6>
              <hr>
              <form class="form-inline" method="get">
                  <div class="row g-3">
                      <div class="col-12">
                          <label class="form-label">{{ __('Video Id') }}</label>
                          <input type="text" name="video_id" class="form-control" id="video_id" placeholder="@youtube video id">
                      </div>
                      <div class="col-12">
                          <div class="d-grid">
                              <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                      </div>
                  </div>
              </form>
            </div>
            </div>
          </div>

    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
              <div class="border p-3 rounded">

                @if($result)
                <form id="myForm" method="post" action="{{ route('admin.video.store') }}">
                    @csrf
                    <div class=" mb-3">
                        <div class="profile-avatar text-center border p-3 rounded">
                            <img id="showImage" src="{{$result['items'][0]['snippet']['thumbnails']['medium']['url'] }}"
                            class=" shadow" width="320" height="180" alt="">
                            <input hidden  type="text" name="thumbnails" id="thumbnails" value="{{$result['items'][0]['snippet']['thumbnails']['medium']['url'] }}">
                            <input hidden  type="text" name="channel_iamge" id="channel_iamge" value="{{$channel_iamge['items'][0]['snippet']['thumbnails']['high']['url'] }}">
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="title">{{ __('Title') }}</span>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $result['items'][0]['snippet']['title'] }}" >
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">{{ __('Description') }}</span>
                        <textarea class="form-control" name="description" id="description" >{{ $result['items'][0]['snippet']['description'] }}</textarea>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="channelTitle">{{ __('Channel Title') }}</span>
                        <input type="text" class="form-control" name="channelTitle" id="channelTitle" value="{{ $result['items'][0]['snippet']['channelTitle'] }}">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="channelId">{{ __('Channel Title') }}</span>
                        <input type="text" class="form-control" name="channelId" id="channelId" value="{{ $result['items'][0]['snippet']['channelId'] }}">
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text" id="publishedAt">{{ __('Published At') }}</span>
                        <input type="text" class="form-control" name="publishedAt" id="publishedAt" value="{{ $result['items'][0]['snippet']['publishedAt'] }}">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="video_link">Link</span>
                        <input type="text" class="form-control" name="video_link" id="video_link" value="{{'https://www.youtube.com/watch?v='.$result['items'][0]['id'] }}">
                        <input hidden type="text" class="form-control" name="video_id" id="video_id" value="{{$result['items'][0]['id'] }}">
                    </div>

                    <div class="col-12">
                        <div class="d-grid">
                          <button type="submit" class="btn btn-primary">{{ __('Publish') }}</button>
                        </div>
                      </div>
                </form>
                @endif

              </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="">
                    <table class=" table table-bordered table-striped table-hover datatable desktop" style="width:100%">
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
                                    <a href=""class="btn btn-sm btn-outline-primary">
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

    </div>
</div>


@endsection
@section('scripts')
@parent

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                category_name: {
                    required : true,
                },
            },
            messages :{
                category_name: {
                    required : 'Please Enter Category Name',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>



@endsection

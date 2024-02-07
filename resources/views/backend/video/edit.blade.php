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

@endsection


@section('page_style')


@endsection

@section('page-content')

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <div class="border p-3 rounded">
                <form id="myForm" method="post" action="{{ route('admin.video.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $videos->id }}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class=" mb-3">
                                <div class="profile-avatar text-center border p-3 rounded">
                                    <img id="showImage" src="{{$videos->thumbnails }}"
                                    class=" shadow" width="320" height="180" alt="">
                                    <input hidden  type="text" name="thumbnails" id="thumbnails" value="{{$videos->thumbnails }}">
                                    <input hidden  type="text" name="channel_iamge" id="channel_iamge" value="{{ $videos->channel_iamge }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group  mb-3">
                                <label for="inputEmail4" class="form-label">Category Name </label>
                                <select name="category_id" class="form-select" id="category_id">

                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" >{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="inputEmail4" class="form-label"> Sub Category </label>
                                <select name="subcategory_id" class="form-select" id="subcategory_id">
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}"  {{ $subcategory->id == $videos->subcategory_id ? 'selected' : '' }} >{{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="inputEmail4" class="form-label">Tags  </label>
                                <input type="text" name="tags" class="selectize-close-btn" value="{{$videos->tags}}">
                            </div>
                        </div>
                    </div>




                    <div class="input-group mb-3">
                        <span class="input-group-text" id="title">{{ __('Title') }}</span>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $videos->title }}" >
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">{{ __('Description') }}</span>
                        <textarea class="form-control" name="description" id="description" >{{ $videos->description }}</textarea>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="channelTitle">{{ __('Channel Title') }}</span>
                        <input type="text" class="form-control" name="channelTitle" id="channelTitle" value="{{ $videos->channelTitle }}">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="channelId">{{ __('Channel ID') }}</span>
                        <input type="text" class="form-control" name="channelId" id="channelId" value="{{ $videos->channelId }}">
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text" id="publishedAt">{{ __('Published At') }}</span>
                        <input type="text" class="form-control" name="publishedAt" id="publishedAt" value="{{ $videos->publishedAt }}">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="video_link">Link</span>
                        <input type="text" class="form-control" name="video_link" id="video_link" value="{{ $videos->video_link }}">
                        <input hidden type="text" class="form-control" name="video_id" id="video_id" value="{{ $videos->video_id }}">
                    </div>

                    <div class="col-12">
                        <div class="d-grid">
                          <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </div>
                      </div>
                </form>


              </div>
            </div>
        </div>
    </div>


</div>


@endsection
@section('scripts')
@parent
 <!-- Init js-->
 <script src="{{ asset('backend/assets/js/pages/form-advanced.init.js') }}"></script>
<!-- InputTags js-->


@endsection

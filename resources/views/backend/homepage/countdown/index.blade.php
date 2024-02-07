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

@section('page_title', 'Countdown')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)




@section('page_style')
<style>

fieldset {
   width: 100%;
   text-align: center;
   border-bottom: 1px solid #000;
   line-height: 0.1em;
   margin: 10px 0 20px;
}

fieldset span {
    background:#fff;
    padding:0 10px;
}
</style>

@endsection

@section('page-content')
<div class="card">
    <div class="card-body">
        <div class="border p-3 rounded">


            <form id="myForm" method="post" action="{{ route('admin.countdown.update') }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $countdowns->id ?? '' }}">

                    <fieldset><span>Countdowns 01</span></fieldset>

                    <div class="row">
                        <div class="col">
                            <div class="from-group mb-3">
                                <label class="form-label">Title 01</label>
                                <input class="form-control" type="text" name="title_01" id="title_01" value="{{ $countdowns->title_01 ?? '' }}" >
                            </div>
                        </div>
                        <div class="col">
                            <div class="from-group mb-3">
                                <label class="form-label">Countdowns 01 </label>
                                <input class="form-control" type="text" name="title_01_countdowns" id="title_01_countdowns"  value="{{ $countdowns->title_01_countdowns ?? '' }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="from-group mb-3">
                                <label class="form-label">Font Awesome Icons 01 </label>
                                <input class="form-control" type="text" name="title_01_icon" id="title_01_icon"  value="{{ $countdowns->title_01_icon ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <fieldset><span>Countdowns 02</span></fieldset>

                    <div class="row">
                        <div class="col">
                            <div class="from-group mb-3">
                                <label class="form-label">Title 01</label>
                                <input class="form-control" type="text" name="title_02" id="title_02" value="{{ $countdowns->title_02 ?? '' }}" >
                            </div>
                        </div>
                        <div class="col">
                            <div class="from-group mb-3">
                                <label class="form-label">Countdowns 01 </label>
                                <input class="form-control" type="text" name="title_02_countdowns" id="title_02_countdowns"  value="{{ $countdowns->title_02_countdowns ?? '' }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="from-group mb-3">
                                <label class="form-label">Font Awesome Icons 02 </label>
                                <input class="form-control" type="text" name="title_02_icon" id="title_02_icon"  value="{{ $countdowns->title_02_icon ?? '' }}">
                            </div>
                        </div>
                    </div>

                      <fieldset><span>Countdowns 03</span></fieldset>

                    <div class="row">
                        <div class="col">
                            <div class="from-group mb-3">
                                <label class="form-label">Title 03</label>
                                <input class="form-control" type="text" name="title_03" id="title_03" value="{{ $countdowns->title_03 ?? '' }}" >
                            </div>
                        </div>
                        <div class="col">
                            <div class="from-group mb-3">
                                <label class="form-label">Countdowns 03 </label>
                                <input class="form-control" type="text" name="title_03_countdowns" id="title_03_countdowns"  value="{{ $countdowns->title_03_countdowns ?? '' }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="from-group mb-3">
                                <label class="form-label">Font Awesome Icons 03 </label>
                                <input class="form-control" type="text" name="title_03_icon" id="title_03_icon"  value="{{ $countdowns->title_03_icon ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <fieldset><span>Countdowns 04</span></fieldset>

                    <div class="row">

                        <div class="col">
                            <div class="from-group mb-3">
                                <label class="form-label">Title 04</label>
                                <input class="form-control" type="text" name="title_04" id="title_04" value="{{ $countdowns->title_04 ?? '' }}" >
                            </div>
                        </div>

                        <div class="col">
                            <div class="from-group mb-3">
                                <label class="form-label">Countdowns 04 </label>
                                <input class="form-control" type="text" name="title_04_countdowns" id="title_04_countdowns"  value="{{ $countdowns->title_04_countdowns ?? '' }}">
                            </div>
                        </div>

                        <div class="col">
                            <div class="from-group mb-3">
                                <label class="form-label">Font Awesome Icons 04 </label>
                                <input class="form-control" type="text" name="title_04_icon" id="title_04_icon"  value="{{ $countdowns->title_04_icon ?? '' }}">
                            </div>
                        </div>

                    </div>


                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent


@endsection

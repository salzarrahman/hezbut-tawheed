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

@section('page_style')
<style>
    .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
        color: #ffffff;
        background: #0063c5;
    }

    .ck-editor__editable_inline {
        min-height: 250px;
    }

    button[title]:hover {
        position: relative;
    }

    button[title]:hover:before {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 99999;
        content: attr(title);
        margin-top: 0.1em;
        padding: 0.1em;
        width: 100px;
        /* change it */
        overflow: hidden;
        word-wrap: break-word;
        font-size: inherit;
        color: #FFF;
        text-align: center;
        background-color: #424242;
        box-sizing: border-box;
        box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);
    }

    button[title]:hover:after {
        position: absolute;
        top: 100%;
        left: 50%;
        z-index: 99999;
        content: '';
        margin-left: -0.125em;
        width: 0;
        height: 0;
        border: 0.25em dashed transparent;
        border-bottom: 0.25em solid #424242;
        font-size: inherit;
    }

    /* title-tip-up */
    button[title]:hover:before {
        top: auto;
        bottom: 100%;
        margin-top: 0;
        margin-bottom: 0.5em;
    }

    button[title]:hover:after {
        top: auto;
        bottom: 100%;
        border: 0.25em dashed transparent;
        border-top: 0.25em solid #424242;
    }
</style>
@endsection
@section('page-content')


<div class="row">
    <div class="col-xl-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route("admin.subscriber.sendsingelemailsubmit") }}" enctype="multipart/form-data">
                    @csrf
                <div class="border p-3 rounded">
                    <h6 class="mb-0 text-uppercase">New Message</h6>
                    <hr>
                    <div class="md-3">
                        <label class="form-label">Email</label>
                        <input hidden class=" form-control" type="email" name="email" id="email" value="{{ $email }}">
                        <input disabled class=" form-control" type="email" name="" id="" value="{{ $email }}">
                    </div>

                    <div class="md-3 mt-3">
                        <label class="form-label">Subjet</label>
                        <input type="text" class=" form-control @error('subject') is-invalid @enderror" name="subject" id="subject">
                        @error('subject')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="md-3 mt-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" id="editor" name="message" rows="10" cols="12"> </textarea>

                        @error('message')
                                <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-3 row row-cols-auto g-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary px-5 radius-30" title="Send Mail">Send</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

    </div>
</div>



@endsection
@section('scripts')
@parent
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    $(document).ready(function() {
        $('#ccID').click(function() {
            $('#Cc').removeClass('d-none');
            $(this).addClass('d-none');
        });
    });
    $(document).ready(function() {
        $('#BccID').click(function() {
            $('#Bcc').removeClass('d-none');
            $(this).addClass('d-none');
        });
    });
</script>


@endsection




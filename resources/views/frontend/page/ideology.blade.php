@php
    $party_member       =  App\Models\PartyMember::limit(4)->get();
    $mission            = App\Models\Mission::find(1);
    $mission_loop       = App\Models\Mission::where('status',1)->limit(7)->get();
@endphp



@extends('frontend.layouts.frontend')

@section('breadcrumb-section')
    <div class="breadcrumb-section">
        <div class="container w-container">
            <div class="breadcrumb-wrapper"style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                <h1 class="breadcrumb-title">Overview of Our Ideology</h1>
                <div class="breadcrumb-link-block">
                    <a href="/" class="breadcrumb-backlink">Home</a>
                    <div class="breadcrunb-slach">/</div>
                    <div class="current-page-name">Overview of Our Ideology</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_style')
    @include('frontend.layouts.pagecss')
@endsection

@section('content')
<br>
<div class="our-abilities-section">
    <div class="container w-container">
        <div class="our-abilities-wrapper">
            <div class="faq-wrapper">
                @foreach ($ideology as  $key => $item)
                <div class="accordion-item-single" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        <div class="faq-content-block">
                            <div id="q1" class="accordion-hader">
                                <div class="content-block">
                                    <h4 class="faq-title" style="color: rgb(51, 51, 51);">
                                        {{ $item->title }}
                                    </h4>
                                    <div class="line-shape" style="background-color: rgb(51, 51, 51);"></div>
                                    <div class="line-shape horizontal" style="background-color: rgb(51, 51, 51); transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(90deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-body-content" style="height: 0px;">
                                <hr>
                                <p class="accordion-text">
                                    {!! $item->summary !!}

                              </p>


                            </div>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Pagination Links -->
<div class="d-flex">
    {{ $ideology->links('pagination::coustom') }}
</div>
<!-- End Pagination Links  -->


@include('frontend.components.logo')



@endsection

@section('page_script')

<script>

</script>

@endsection


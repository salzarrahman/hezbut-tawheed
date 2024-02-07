
@php
    foreach ($slider as $key => $item )
@endphp

<section class="slider-section">

    <div class="container w-container">
        <div class="slider-content-wrapper">
            <div class="slider-content-inner">
                <h1 class="slider-title"  style="font-family: 'Baloo Da 2', sans-serif; ">
                    {{ __($item->title ?? '#Slider Title' )  }}
                </h1>
                <p class="slider-summary">
                    {{ __($item->summary ?? '#Slider Summary' )  }}
                </p>
                <div class="slider-button-block" >
                    <a href="{{ $item->read_more_link ?? '' }}" class="button-primary">{{ __('translate.read_more') }}</a>
                </div>
            </div>
            <img src="{{(!empty($item->image)) ? url($item->image): url('frontend/images/slider/slider-1.png') }}" sizes="(max-width: 479px) 75vw, (max-width: 767px) 77vw, (max-width: 991px) 48vw, (max-width: 1279px) 427.796875px, 605px" alt="Slider Image" class="slider-image" />
        </div>
    </div>
    {{-- <img src="{{ asset('frontend/images/slider/slider-flag.png') }}"  alt="Slider Section Image" class="slider-section-image" /> --}}

</section> <!-- end header-top-section -->

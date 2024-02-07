@php
    $home_about= App\Models\About::where('status',1)->orderBy('id','ASC')->limit(1)->get();
@endphp



<div class="about-section">
    <div class="container w-container">
        <div class="about-wrapper">

          @foreach ($home_about   as $key => $item )

            <div class="about-left-block">
                <div class="image-wrapper animate-in">
                    <div class="image-overlay"></div>
                    <img src="{{ $item->image }}" alt="about-image" class="media-fit-image" />
                </div>
            </div>
            <div class="about-right-block">
                <div class="section-title-block">
                    <h2 class="section-title about-title">
                        {{  __($item->title ?? '#Slider Title' )  }}

                    </h2>
                </div>
                <div class="about-content-block">
                    {!! __($item->summary ?? '#Slider Title')  !!}
                </div><a target=" _blank" href="{{ $item->link }}" class="button-primary anotther-button">More About Us</a>
            </div>
        </div>
        @endforeach

    </div>
</div><!-- end header-top-section -->

@php
    $mission        = App\Models\Mission::find(1);
    $mission_loop   = App\Models\Mission::where('status',1)->limit(7)->get();
@endphp


<div class="our-mission-section">
    <div class="our-mission-wrapper">
        <div class="our-mission-content-block">
            <div class="join-our-movement-title-block">
                <div class="section-title-block section-block-center">
                    <h2 class="section-title text-white">
                       {{$mission->title ?? ''}}
                    </h2>
                    <p class="section-summary plr-15px">
                        {{$mission->summary ?? ''}}
                    </p>
                </div>
            </div>
            <div class="our-mission-content-wrapper">
                @foreach($mission_loop as $key => $item)
                    @if($loop->first)

                    @else
                    <div class="our-mission-single-content">
                        <div class="our-mission-content-icon-block">
                            <img src="{{ asset($item->image ?? '') }}" loading="lazy" alt="Our Mission Icon" class="our-mission-icon" /></div>
                        <div class="our-mission-single-content-block">
                            <h4 class="our-mission-single-content-title">{{ $item->title ?? '' }}</h4>
                            <p class="our-mission-single-content-summary">
                                {{ $item->summary ?? '' }}
                            </p>
                        </div>
                    </div>
                    @endif
                @endforeach

            </div>
        </div>
        <div class="our-mission-image-block">
            <div class="image-wrapper animate-in">
                <div class="image-overlay"></div>
                <img src="{{ asset($mission->image ?? '') }}" loading="lazy" alt="about-image" class="media-fit-image" />
            </div>
        </div>
    </div>
</div>  <!-- end header-top-section -->

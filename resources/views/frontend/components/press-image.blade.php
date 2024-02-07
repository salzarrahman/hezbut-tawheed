@php
    $setting        = App\Models\Setting::find(1);
    $category       = App\Models\Category::where('category','Press Conference')->pluck('id')->first();
    $press          = App\Models\Blogpost::where('status',1)->where('category_id',$category)->limit(4)->orderBy('id','DESC')->latest()->get();
    $photo_gallery  = App\Models\Gallery::orderBy('id', 'DESC')->limit(6)->get();
@endphp


<div class="press-tweet-volunteer-section" style="margin-top: 50px;">
    <div class="our-mission-wrapper press-tweets-volunteer">
        <div class="our-mission-content-block press-tweets-volunteer"
            style="background-image: url({{asset($setting->press_tweet_volunteer_right ?? '')}})">

            <div class="image__container">
                <!-- Full-width images with number text -->
                <div class="image__view__container">
                    @foreach($photo_gallery as $key => $item)
                        <div class="mySlides">
                            <div class="numbertext">1 / 6</div>
                            <img class="slide__img" src="{{ asset($item->future_images ?? '') }}" style="width:100%">
                        </div>
                    @endforeach
                </div>

                <!-- Next and previous buttons -->
                <a class="home__prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="home__next" onclick="plusSlides(1)">&#10095;</a>

                <!-- Image text -->
                <div class="caption-container">
                    <p id="caption"></p>
                </div>

                <!-- Thumbnail images -->
                <div class="row thumrow">

                    @foreach($photo_gallery as $key => $item)
                        <div class="column">
                            <img class="demo cursor" src="{{ asset($item->future_images ?? '') }}" onclick="currentSlide({{$key}})" alt="{{ $item->title ?? '' }}">
                        </div>

                    @endforeach
                        <a href="{{ url('/gallery') }}" class="view-all-button photo__more mt-20px">view more</a>
                </div>
            </div>

        </div>

        <div class="our-mission-image-block press-tweet-volunteer">
            <img src="{{ asset($setting->press_tweet_volunteer_left ?? '') }}" alt="Our Mission Image"
                class="our-mission-image" />
            <div class="campaign-donation-content press-tweet-volunteer">
                <h2 class="prass-content-title">Press Conference</h2>
                @foreach($press as $key => $item)
                <div role="listitem" class="confarence-item w-dyn-item">
                    <div class="confarebce-content-block">
                        <a href="{{ url('blog/details/'.$item->id.'/'.$item->news_title_slug) }}"
                            class="confarebce-link-block w-inline-block">
                            <h4 class="confarence-title">
                                {{ $item->news_title ?? '' }}
                            </h4>
                        </a>
                        <div class="confarence-date-block">
                            <div class="party-name">{{ $setting->site_title }} - </div>
                            <div class="confarence-date">
                                {{ $item->created_at->format(' F d,  Y ') }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <a href="{{ url('/press-conference') }}" class="view-all-button mt-40px">View all</a>

            </div>
        </div>
    </div>
</div>



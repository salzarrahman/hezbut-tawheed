
@php
    $social_media   = App\Models\SocialMedia::find(1);
    $setting        = App\Models\Setting::find(1);
    $category       = App\Models\Category::where('category','Press Conference')->pluck('id')->first();
    $press          = App\Models\Blogpost::where('status',1)->where('category_id',$category)->limit(3)->orderBy('id','DESC')->latest()->get();
    $youtubes       = App\Models\Youtube::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
@endphp

<div class="press-tweet-volunteer-section">
    <div class="our-mission-wrapper press-tweets-volunteer">
        <div class="our-mission-content-block press-tweets-volunteer custom__video__container"
            style="background-image: url({{asset($setting->press_tweet_volunteer_right ?? '')}})">

            <div class="vid-main-wrapper">
                <!-- THE YOUTUBE PLAYER -->
                <div class="vid-container">
                    @foreach ($youtubes as $key => $youtube )
                        @if ($loop->first)
                            <iframe id="vid_frame" src="https://www.youtube.com/embed/{{$youtube->video_id}}?rel=0&showinfo=0&autohide=1" frameborder="0" width="" height=""></iframe>
                        @endif
                    @endforeach
                </div>

                <!-- THE PLAYLIST -->
                <div class="vid-list-container">
                    @foreach ($youtubes as $key => $youtube )
                    <li class="video-list">
                        <a href="javascript:void();"
                            onClick="document.getElementById('vid_frame').src='https://youtube.com/embed/{{$youtube->video_id}}?autoplay=1&rel=0&showinfo=0&autohide=1'">
                            <span class="vid-thumb">
                                <img width=100 src="https://img.youtube.com/vi/{{$youtube->video_id}}/default.jpg" />
                            </span>
                        </a>
                    </li>
                    @endforeach
                </div>
                <a href="{{ url('/video') }}" class="more__video__btn">More >></a>
            </div>
        </div>

        <div class="our-mission-image-block">
            <img src="{{ asset($setting->press_tweet_volunteer_left ?? '') }}" alt="Our Mission Image"
                class="our-mission-image" />
            <div style="">
                <div id="fbPage" class="fb-page" data-href="{{ $social_media->facebook ?? '' }}" data-tabs=" timeline"
                    data-width="" data-height="" data-small-header="false" data-adapt-container-width="true"
                    data-hide-cover="false" data-show-facepile="true">
                </div>
            </div>
        </div>
    </div>
</div><!-- end header-top-section -->



@php
    $category_id    = App\Models\Category::where('category','Youtube Video')->pluck('id');
    $subcategory    = App\Models\SubCategory::where('category_id', $category_id)->get();
@endphp

@extends('frontend.layouts.frontend')

@section('title', __('navigation.video') )

@section('page_style')
    <link href="{{ asset('frontend/assets/css/youtube.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
@endsection


@section('breadcrumb-section')
<div class="breadcrumb-section">

</div>
<style>
    .breadcrumb-section {
        height: 100px;
    }

    @media screen and (min-width: 1280px) {
        .breadcrumb-section {
            min-height: 150px;
        }
    }
    .mainBody{
        margin-top: 10px;
    }

    .video {
    width: 500px;
    margin-bottom: 30px;
}
    .video__thumbnail {
    width: 100%;
    height: 315px;
}
</style>
@endsection

@section('content')

<!-- Main Body Starts -->
<div class="mainBody">
    <!-- Sidebar Starts -->
    <div class="sidebar">
        <div class="sidebar__categories">

            <div class="sidebar__category">
                <form id="sort_products" class="blog-sidebar-search-wrapper w-form" action="" method="GET">
                    <input id="search" name="search" type="text" class="" placeholder="Some" @isset($sort_search) value="{{ $sort_search }}" @endisset/>

                    <button class="" type="submit">
                        Search
                    </button>

                </form>
            </div>
            <hr>
                <span>Category</span>
            <hr>
            @foreach ($subcategory as $key => $item)
                <a href="{{ url('/video/category/' . $item->id . '/' . $item->slug) }}" class="nav-link">
                    <div class="sidebar__category">
                        <i class="material-icons">subscriptions</i>
                        <span>
                            {{ __($item->name) }}
                        </span>
                    </div>
                </a>
            @endforeach

        </div>

    </div>
<!-- Sidebar Ends -->

        <!-- Videos Section -->
        <div class="videos">
            <div class="videos__container">
                <!-- Single Video starts -->
                @foreach ($youtubes as $key => $youtube )
                <div class="video">
                    <div class="video__thumbnail">
                        <iframe frameborder="0" height="100%" width="100%" src="https://www.youtube.com/embed/{{$youtube->video_id}}?html5=1&enablejsapi=1&autoplay=1&controls=1&showinfo=0&autohide=1" allowfullscreen>
                        </iframe>
                    </div>
                    <div class="video__details">
                        <div class="author">
                            <img src="{{ $youtube->channel_iamge ?? '' }}" alt="" />
                        </div>
                        <div class="title">
                            <h3>
                                {{ $youtube->title ?? '' }}
                            </h3>

                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Single Video Ends -->
            </div>
        </div>
    </div>

    <!-- Pagination Links -->
<div class="d-flex">
    {{ $youtubes->links('pagination::coustom') }}
</div>
<!-- End Pagination Links  -->



    <script type="text/javascript" src="http://www.youtube.com/player_api"></script>

    <script>
        var ytplayerList;

        function onPlayerReady(e) {
            var video_data = e.target.getVideoData(),
                label = video_data.video_id + ':' + video_data.title;
            e.target.ulabel = label;
            console.log(label + " is ready!");
        }

        function onPlayerError(e) {
            console.log('[onPlayerError]');
        }

        function onPlayerStateChange(e) {
            var label = e.target.ulabel;
            if (e["data"] == YT.PlayerState.PLAYING) {
                console.log({
                    event: "youtube",
                    action: "play:" + e.target.getPlaybackQuality(),
                    label: label
                });
                //if one video is play then pause other
                pauseOthersYoutubes(e.target);
            }
            if (e["data"] == YT.PlayerState.PAUSED) {
                console.log({
                    event: "youtube",
                    action: "pause:" + e.target.getPlaybackQuality(),
                    label: label
                });
            }
            if (e["data"] == YT.PlayerState.ENDED) {
                console.log({
                    event: "youtube",
                    action: "end",
                    label: label
                });
            }
            //track number of buffering and quality of video
            if (e["data"] == YT.PlayerState.BUFFERING) {
                e.target.uBufferingCount ? ++e.target.uBufferingCount : e.target.uBufferingCount = 1;
                console.log({
                    event: "youtube",
                    action: "buffering[" + e.target.uBufferingCount + "]:" + e.target.getPlaybackQuality(),
                    label: label
                });
                //if one video is play then pause other, this is needed because at start video is in buffered state and start playing without go to playing state
                if (YT.PlayerState.UNSTARTED == e.target.uLastPlayerState) {
                    pauseOthersYoutubes(e.target);
                }
            }
            //last action keep stage in uLastPlayerState
            if (e.data != e.target.uLastPlayerState) {
                console.log(label + ":state change from " + e.target.uLastPlayerState + " to " + e.data);
                e.target.uLastPlayerState = e.data;
            }
        }

        function initYoutubePlayers() {
            ytplayerList = null; //reset
            ytplayerList = []; //create new array to hold youtube player
            for (var e = document.getElementsByTagName("iframe"), x = e.length; x--;) {
                if (/youtube.com\/embed/.test(e[x].src)) {
                    ytplayerList.push(initYoutubePlayer(e[x]));
                    console.log("create a Youtube player successfully");
                }
            }
        }

        function pauseOthersYoutubes(currentPlayer) {
            if (!currentPlayer) return;
            for (var i = ytplayerList.length; i--;) {
                if (ytplayerList[i] && (ytplayerList[i] != currentPlayer)) {
                    ytplayerList[i].pauseVideo();
                }
            }
        }
        //init a youtube iframe
        function initYoutubePlayer(ytiframe) {
            console.log("have youtube iframe");
            var ytp = new YT.Player(ytiframe, {
                events: {
                    onStateChange: onPlayerStateChange,
                    onError: onPlayerError,
                    onReady: onPlayerReady
                }
            });
            ytiframe.ytp = ytp;
            return ytp;
        }

        function onYouTubeIframeAPIReady() {
            console.log("YouTubeIframeAPI is ready");
            initYoutubePlayers();
        }
        var tag = document.createElement('script');
        //use https when loading script and youtube iframe src since if user is logging in youtube the youtube src will switch to https.
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    </script>

    @endsection

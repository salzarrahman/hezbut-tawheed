@php
    $category = App\Models\Category::where('category','campaign')->pluck('id')->first();
    $campaign = App\Models\Blogpost::where('status',1)->where('category_id', $category)->limit(3)->orderBy('id','DESC')->latest()->get();
    $setting = App\Models\Setting::find(1);
    $countdowns = App\Models\Countdown::find(1);
@endphp


<div class="upcoming-campaign-section">
    <div class="container w-container">
        <div class="join-our-movement-title-block">
            <div class="section-title-block section-block-center">
                <h2 class="section-title">
                    {{ __('translate.campaign') }}

                </h2>
                <p class="section-summary">
                    {{ __('translate.campaign_de') }}
                </p>
            </div>
        </div>
        <div class="upcoming-campaign-wrapper">
            <div class="upcoming-campaign-content">
                <div class="campaign-list-wrapper w-dyn-list">
                    <div role="list" class="campaign-list w-dyn-items">
                        @foreach ($campaign as $key => $item )

                        <div role="listitem" class="campaign-item w-dyn-item">
                            <div class="upcoming-campaign-single-content">

                                <div class="upcoming-campaign-thumbnail-block">
                                    <a href="{{ url('campaign/details/'.$item->id.'/'.$item->news_title_slug) }}"
                                        class="campaign-thumb-link-block w-inline-block">
                                        <img alt="Upcoming Campaign Thumb Image" loading="lazy"
                                            src="{{ asset($item->image) }}" class="upcoming-campaign-thumbnail-image"
                                            style="width: :240px; height:162px;" />
                                    </a>
                                </div>

                                <div class="upcoming-campaign-single-info-block">
                                    <div class="campaign-date-title-block">
                                        <div class="campaign-date-block">
                                            <div class="campaign-date">
                                                {{ $item->created_at->format(' M d ') }}
                                            </div>
                                        </div>
                                        <div class="campaign-title-venue-block">
                                            <a href="{{ url('campaign/details/'.$item->id.'/'.$item->news_title_slug) }}"
                                                class="campaign-title-link-block w-inline-block">
                                                <h4 class="campaign-title">
                                                    {{ __(Str::limit($item->news_title ?? 'Title',20) )  }}
                                                </h4>
                                            </a>
                                            <div class="campaign-venue-block">
                                                <div class="campaign-venue-text">
                                                    {{ __('translate.venue') }}
                                                </div>
                                                <div class="campaign-venue-name">
                                                    {{ $item->venue }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="campaign-summary">
                                    <div style="width: :240px; height:auto;">
                                        @php
                                        echo __(Str::limit($item->news_details,100) ) ;
                                        @endphp
                                    </div>
                                    </p>
                                    <div class="campaign-time-block">
                                        <div class="campaign-time-text">
                                            {{ __('translate.time') }}
                                        </div>
                                        <div class="campaign-time">
                                            {{ $item->created_at->format('h:i A ') }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>

                <div class="view__all">
                    <a class="view__all__link" href="{{url('/campaign')}}">View all</a>
                </div>


            </div>

            <div class="upcoming-campaign-donation cusotom__upcoming-campaign-donation">
                <div class="campaign-donation-wrapper">

                    <div >
                        <img src="{{ asset($setting->campaign_bg ?? '') }}" loading="lazy"
                            alt=""  class="campainBg__image" />
                    </div>

                    <div class="Custom__campaign__donation__content">
                        <div class="counter__campaign__inner" data-number="{{ $countdowns->title_01_countdowns }}">
                            <i class="{{ $countdowns->title_01_icon }}"></i>
                            <h4 id="number1" class="number">{{ $countdowns->title_01_countdowns }} +</h4>
                            <span></span>
                            <p>{{ $countdowns->title_01 }}</p>
                        </div>
                        <div class="counter__campaign__inner" data-number="{{ $countdowns->title_02_countdowns }}">
                            <i class="{{ $countdowns->title_02_icon }}"></i>
                            <h4 id="number2" class="number">{{ $countdowns->title_02_countdowns }} +</h4>
                            <span></span>
                            <p>{{ $countdowns->title_02 }}</p>
                        </div>
                        <div class="counter__campaign__inner" data-number="{{ $countdowns->title_03_countdowns }}">
                            <i class="{{ $countdowns->title_03_icon }}"></i>
                            <h4 id="number3" class="number">{{ $countdowns->title_03_countdowns }} +</h4>
                            <span></span>
                            <p>{{ $countdowns->title_03 }}</p>
                        </div>
                        <div class="counter__campaign__inner" data-number="{{ $countdowns->title_04_countdowns }}">
                            <i class="{{ $countdowns->title_04_icon }}"></i>
                            <h4 id="number4" class="number">{{ $countdowns->title_04_countdowns }} +</h4>
                            <span></span>
                            <p>{{ $countdowns->title_04 }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div><!-- end campaign-section -->

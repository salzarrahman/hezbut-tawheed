
@php
    $abilitie     = App\Models\Abilitie::get();

    $feature_left   = App\Models\Abilitie::where('status' , 1)->where('category' , 'Our Modus Operandi')->orderBy('id','desc')->limit(6)->get();
    $feature_right  = App\Models\Abilitie::where('status' , 1)->where('category' , 'Our Policies')->orderBy('id','desc')->limit(6)->get();

    $feature_left_tilte   = App\Models\Abilitie::where('status' , 1)->where('category' , 'left_block_tilte')->orderBy('id','desc')->limit(1)->get();
    $feature_right_tilte  = App\Models\Abilitie::where('status' , 1)->where('category' , 'right_block_tilte')->orderBy('id','desc')->limit(1)->get();
@endphp



<div class="our-abilities-section">

    <div class="custom__our-abilities-title-block">
        <div class="section-title-block">
            <h2 class="section-title">
                {{ __($abilitie[0]['title'] ?? '' )  }}
            </h2>
            <p class="section-summary custom__section-summary ">
                {{ __($abilitie[0]['summary'] ?? '' )  }}
            </p>
        </div>
    </div>


    <div class="container w-container">
        <div class="custom__our-abilities-wrapper">
            <div class="our-abilities-left-block">

                <h4 class="our__policy__title section-title-block">Our Modus Operandi</h4>

                <div class="faq-wrapper">
                    @foreach ($feature_left as $key => $item )
                        <div class="accordion-item-single">
                            <div class="faq-content-block">
                                <div id="q1" class="accordion-hader">
                                    <div class="content-block">
                                        <h4 class="faq-title">
                                            {{  __($item->title ?? '')  }}
                                        </h4>
                                        <div class="line-shape"></div>
                                        <div class="line-shape horizontal"></div>
                                    </div>
                                </div>
                                <div class="accordion-body-content">
                                    <p class="accordion-text">
                                        {{ __($item->summary ?? '' )  }}
                                    </p>
                                </div>
                                <div class="faq-inner-image">
                                    <img src="{{ asset($item->image) }}" loading="lazy" alt="Our Abilities Image" class="image-cover" />
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
            <div class="our-abilities-right-block">

                <h4 class="our__policy__title section-title-block">Our Policies</h4>

                <div class="faq-wrapper">
                    @foreach ($feature_right as $key => $item )
                        <div class="accordion-item-single">
                            <div class="faq-content-block">
                                <div id="q1" class="accordion-hader">
                                    <div class="content-block">
                                        <h4 class="faq-title">
                                            {{  __($item->title ?? '')  }}
                                        </h4>
                                        <div class="line-shape"></div>
                                        <div class="line-shape horizontal"></div>
                                    </div>
                                </div>
                                <div class="accordion-body-content">
                                    <p class="accordion-text">
                                        {{ __($item->summary ?? '' )  }}
                                    </p>
                                </div>
                                <div class="faq-inner-image">
                                    <img src="{{ asset($item->image) }}" loading="lazy" alt="Our Abilities Image" class="image-cover" />
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div><!-- end header-top-section -->

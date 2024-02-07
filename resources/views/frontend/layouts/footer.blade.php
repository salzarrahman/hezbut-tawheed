@php
    $setting = App\Models\Setting::find(1);
    $nevigation = App\Models\ActiveMenu::where('status', 1)->where('title','Footer Nevigation')->get();
    $important = App\Models\ActiveMenu::where('status', 1)->where('title','Footer Important')->get();
@endphp


<footer class="footer">
    <div class="footer-inner">
        <div class="container w-container">
            <div class="footer-wrapper">
                <div class="footer-logo-block">
                    <div class="footer-title left-title">{{ __('translate.newsletter')}}</div>
                    <p class="footer-text">{{ __('translate.inbox')}}</p>
                    <span class="successmessage"> </span>
                    <div class="footer-form w-form">
                        <input id="SubscribeEmailId" type="email" class="form-control  w-100" placeholder="email ">
                        <button id="SubscribeBtnId"  class="btn btn-block normal-btn w-100">{{ __('translate.subscribe')}} </button>
                    </div>
                    <div class="footer-bottom-text">
                        Powered by <a href="/" target="_blank" class="bottom-link"> {{$setting->site_title ?? ''}} </a>
                    </div>
                </div>
                <div class="footer-content-block">
                    <div class="footer-block">
                        <div class="footer-title">{{ __('translate.nevigation')}}</div>
                        @foreach($nevigation as $key=>$item )
                        @foreach($item->category as $key => $value)
                        <a href="{{ $value->id }}" class="footer-link">
                            {{ $value->category }}
                            {{-- {{ GoogleTranslate::trans($value->category , app()->getLocale() ) }} --}}
                        </a>
                        @endforeach
                        @endforeach

                    </div>
                    <div class="footer-block">
                        <div class="footer-title">{{ __('translate.important') }}</div>

                        @foreach($important as $key=>$item )
                        @foreach($item->category as $key => $value)
                        <a href="{{ $value->id }}" class="footer-link">
                            {{ $value->category }}
                            {{-- {{ GoogleTranslate::trans($value->category , app()->getLocale() ) }} --}}
                        </a>
                        @endforeach
                        @endforeach

                    </div>
                    <div class="footer-block">
                        <div class="footer-title">{{ __('translate.contact_info') }}</div>
                        <div class="contact-number-block">
                            <address class="address-block">
                                <div class="footer-subtitle">{{ __('translate.head_quater') }}</div>
                                <div class="footer-address-text">
                                    {{ $setting->address ?? '' }}
                                </div>
                            </address>
                            <div class="mail-address-block">
                                <div class="footer-subtitle">{{ __('translate.web_info') }}</div>
                                <a href="mailto:{{$setting->email ?? ''}}?subject=webflow%20mail" class="mail-address">
                                    {{$setting->email ?? ''}}
                                </a>
                                <a href="{{$setting->web ?? ''}}" target="_blank" class="website-link">{{$setting->web
                                    ?? ''}}</a>
                            </div>
                            <div class="phone-block">
                                <div class="footer-subtitle">{{ __('translate.phone_number') }}</div>
                                <div class="number-block">
                                    <a href="tel:{{$setting->phone_number ?? ''}}"
                                        class="phone-number">{{$setting->phone_number ?? ''}}</a>
                                    <div class="number-text">/</div>
                                    <a href="tel:{{$setting->phone_number ?? ''}}"
                                        class="phone-number">{{$setting->phone_number_2 ?? ''}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-copyright">©
                    <?php echo date("Y"); ?>
                    <a href="{{$setting->web ?? ''}}" target="_blank" class="company-link">{{$setting->site_title ??
                        ''}}</a>
                    . All rights reserved
                </div>
                <div class="footer-social-block-two">
                    <a href="/login" class="footer-bottom-link">Login</a>
                    <a href="/register" class="footer-bottom-link">Register</a>
                </div>
            </div>
        </div>
    </div>
</footer>


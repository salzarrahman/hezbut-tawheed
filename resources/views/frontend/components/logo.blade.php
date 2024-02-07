@php
    $media_partner      = App\Models\MediaPartner::where('status',1)->get();
    $media_partner_desc = App\Models\MediaPartner::where('status',1)->orderBy('id','desc')->get();
@endphp


<section class="client-logo-section">
    <div class="container w-container">
        <div class="client-logo-wrapper">
            <div class="client-logo-inner">
                @foreach($media_partner as $key => $item)
                <div class="single-logo">
                    <a  target="_blank" href="{{ $item->link }}" class="single-client-logo w-inline-block">
                        <img src="{{ asset($item->image) }}"loading="lazy" alt="Client Logo" class="client-logo" />
                    </a>
                    <div class="bottomleft">{{ $item->title }}</div>
                </div>
                @endforeach
            </div>
            <div class="client-logo-inner">
                @foreach($media_partner_desc as $key => $item)
                <div class="single-logo">
                    <a  target="_blank" href="{{ $item->link }}" class="single-client-logo w-inline-block">
                        <img src="{{ asset($item->image) }}" loading="lazy" alt="Client Logo" class="client-logo" />
                    </a>
                    <div class="bottomleft">{{ $item->title }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- end client-logo-section -->

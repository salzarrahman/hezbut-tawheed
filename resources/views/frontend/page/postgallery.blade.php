@extends('frontend.layouts.frontend')

@section('title', __('navigation.gallery'))

@section('content')


<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

.container {
    position: relative;
    margin-bottom: 20px;
}
.mySlides {
    display: none;
}

.cursor {
    cursor: pointer;
}
.prev,
.next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -50px;
    color: white;
    font-weight: bold;
    font-size: 20px;
    border-radius: 0 3px 3px 0;
    user-select: none;
}

.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}
.prev:hover,
.next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}
.numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
}
.caption-container {
    text-align: center;
    background-color: #222;
    padding: 2px 16px;
    color: white;
}

.row:after {
    content: "";
    display: table;
    clear: both;
}

.demo {
    opacity: 0.6;
}

.active,
.demo:hover {
    opacity: 1;
}
.gallerydetails {
    margin-left: auto;
    margin-right: auto;
    max-width: 1200px;
    padding: 20px 48px 5px 48px;
}
.gallerydetails-text {
    display: flex;
    justify-content: space-between;
    padding-top: 10px;
    flex-wrap: wrap;
}
.galleryimage {
    display: flex;
}

@media only screen and (max-width: 768px) {
    .galleryimage {
        flex-direction: column;
    }
}
.galleryimage-view {
    width: 100%;
    position: relative;
    background-color: #222;
}
.galleryimage-thum {
    height: auto;
    max-height: 612px;
    overflow: auto;
    background: #222;
    padding: 0 20px;
}

</style>


<div class="gallerydetails">
    <h4>{{ $gallerydetails->title ?? '' }}</h4>
    <div class="gallerydetails-text">
        <p>Venue: {{ $gallerydetails->venue ?? '' }}</p>
        <p>Date: {{ $gallerydetails->date ?? '' }}</p>
    </div>
</div>
<div class="container w-container">
    <div class="galleryimage">
        <div class="galleryimage-view">
            @foreach($gallerydetails->imagess as $index => $image)
            <div class="mySlides">
                <div class="numbertext">{{ $index + 1 }} / {{ count($gallerydetails->imagess) }}</div>
                <img src="{{ asset($image->images ?? '') }}" style="width:100%">
            </div>
            @endforeach

            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
            <div class="caption-container"> 
                <p id="caption"></p>
            </div>
        </div>

        <div class="galleryimage-thum">
            @foreach($gallerydetails->imagess as $index => $image)
            <div class="column">
                <img class="demo cursor" src="{{ asset($image->images ?? '') }}" style="width:100%"
                    onclick="currentSlide({{ $index + 1 }})" alt="{{ $image->captions ?? '' }}">
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}


function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("demo");
    let captionText = document.getElementById("caption");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    captionText.innerHTML = dots[slideIndex - 1].alt;
}

</script>


@endsection
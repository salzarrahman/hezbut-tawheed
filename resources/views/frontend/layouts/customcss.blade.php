<style>
    body {
        font-family: 'Baloo Da 2', sans-serif;
    }


    /* Header-top-section */
    select {
        width: 100px;
        color: #000;
        border-radius: 5%;
        padding-left: 5px;
    }

    .search-box {
        width: fit-content;
        height: fit-content;
        position: relative;
    }

    .input-search {
        height: 30px;
        width: 30px;
        border-style: none;
        padding: 10px;
        font-size: 18px;
        letter-spacing: 2px;
        outline: none;
        border-radius: 5px;
        transition: all .5s ease-in-out;
        background-color: #16327a00;
        padding-right: 40px;
        color: #ffffff;
    }

    .input-search::placeholder {
        color: rgba(255, 255, 255, .5);
        font-size: 18px;
        letter-spacing: 2px;
        font-weight: 100;
    }

    .btn-search {
        height: 30px;
        width: 30px;
        border-style: none;
        font-size: 20px;
        font-weight: bold;
        outline: none;
        cursor: pointer;
        border-radius: 50%;
        position: absolute;
        right: 0px;
        color: #ffffff;
        background-color: transparent;
        pointer-events: painted;
    }

    .btn-search:focus~.input-search {
        width: 300px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom: 1px solid rgba(255, 255, 255, .5);
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }

    .input-search:focus {
        width: 300px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom: 1px solid rgba(255, 255, 255, .5);
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }

    .slider-section {
        border-bottom: 1px solid hsla(0, 0%, 100%, 0.3);
    }


    @media screen and (max-width: 479px) {
        .header-top-wrapper {
            grid-column-gap: 15px;
        }
    }

    .login-register-link {
        padding-top: 10px;
        display: flex;
        gap: 3px;
    }

    .custom-w-container-line {
        border-bottom: 1px solid hsla(0, 0%, 100%, 0.3);
        padding-bottom: 10px;
    }

    /* Start Navigation-top-section */
    @media screen and (max-width: 479px) {
            .navigation-section {
            top: 102px;
        }
    }

    #navbar {
        background-color: rgb(22, 50, 122);
        padding-bottom: 20px;
        border-bottom: 1px solid hsla(0, 0%, 100%, 0.3);
    }

    .navbar-wrapper {
        border-top: 0;
        padding-top: 20px;
    }

    @media screen and (max-width: 768px) {
        .navbar-wrapper {
        padding-top: 30px;
    }
    }

    .w-nav-brand {
        padding-right: 20px;
    }

    .sticky-one {
        position: fixed;
        top: 0;
        z-index: 1000;
    }

    .nav-menu-two {
        grid-column-gap: 20px;
    }
    /* End Navigation-top-section */
    .slider-section {
        background-image: url();
    }

    @media screen and (min-width: 1280px) {
        .slider-summary {
            max-width: 600px;
            font-size: 18px;
        }
    }

    /* End slider-section */
    .breadcrumb-section {
        background-image: url({{asset($setting->breadcrumb_bg ?? '')}});
    }

    /* End breadcrumb-section */
    .feature-section {
        background-color: #16327a;
        padding-top: 135px;
        padding-bottom: 135px;
    }
    .feature-block {
        position: relative;
    }
    .feature_img_block {
        width: 100%;
    }
    .image {
        opacity: 1;
        transition: .8s ease;
    }

    .middle {
        /* transition: .8s ease;
        opacity: 0; */
        position: absolute;
        / top: 50%; /
        left: 50%;
        bottom: -50px;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .feature_button {
        border: 1px solid;
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: bold;
    }
    .feature_text {
        text-align: center;
    }

     /* End feature_section */

     input {
        padding: 0.25rem 0;
        margin-bottom: 0.25rem;
    }

    .input-err {
        /*  padding: 0; */
        margin: 0;
        color: tomato;
        font-size: 12px;
    }

    .btn-submit {
        border: none;
        padding: 0.25rem 1rem;
        border-radius: 0.25rem;
        background: blueviolet;
        color: white;
        margin-top: 1rem;
    }

    /* End join-our-movement-sectrion */
    .custom-campaign-tag-link {
        color: #8a8a8a;
        border: 1px solid #dfdfdf;
        padding: 3px 10px;
        border-radius: 15px;
        margin-right: 10px;
        margin-bottom: 10px;
        transition: all .3s ease-in-out;
        display: inline-block;
    }

    .custom-campaign-tag-link:hover {
        outline: 0;
        background: #16327a;
        color: #fff;
        border-color: #16327a;
    }

    .custom-campaign-tag {
        padding: 10px 0;
    }

    /* End our-mission-section */
    .custom__our-abilities-title-block {
        width: 100%;
        text-align: center;
        padding-bottom: 20px;
    }

    .custom__our-abilities-wrapper {
        display: flex;
        grid-column-gap: 40px;
    }

    @media screen and (max-width: 991px) {
        .custom__our-abilities-wrapper {
            flex-direction: column;
            grid-row-gap: 50px;
            align-items: center;
        }
    }

    .our-abilities-left-block {
        width: 100%;
        max-width: 558px;
    }

    .our__policy__title {
        padding: 10px 0;
        background-color: #16327A;
        color: #fff;
        margin-bottom: 10px;
        padding-left: 34px;
    }

    .custom__section-summary {
        width: 100%;
        max-width: 1230px;
        text-align: center;
        margin-right: auto;
        margin-left: auto;
    }

    /* End our-abilities-section */
    * {
        box-sizing: border-box;
    }

    .image__container {
        position: relative;
    }
    .image__view__container {
        position: relative;
    }

    .home__prev, .home__next {
        cursor: pointer;
        position: absolute;
        top: 40%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    .home__next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }


    .home__prev:hover,
    .home__next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    .mySlides {
        display: none;
    }

    .cursor {
        cursor: pointer;
    }


    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* Container for image text */
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

    .thumrow {
        position: relative;
    }

    /* Six columns side by side */
    .column {
        float: left;
        width: 16.66%;
    }

    /* Add a transparency effect for thumnbail images */
    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }

    .slide__img {
        width: 100%;
        max-height: 462px;
    }

    @media screen and (min-width: 1920px) {
        .our-mission-content-block {
            padding: 156px 150px 155px;
        }
    }
    @media screen and (min-width: 1280px) {
        .our-mission-image-block {
            max-width: 602px;
        }
    }

    @media screen and (min-width: 1920px) {
        .our-mission-image-block {
            max-width: 655px;
        }
    }

    .photo__more {
        position: absolute;
        top: 50%;
        left: 90%;
        transform: translate(-50%, -50%);
    }

    @media screen and (min-width: 375px) {
        .confarebce-content-block {
            padding-bottom: 15px;
            ;
        }
    }

    /* End press-image-section */
    .Custom__campaign__donation__content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        width: 100%;
        color: #fff;

    }

    @media screen and (max-width: 320px) {
        .Custom__campaign__donation__content {
            left: 53%;
        }
    }

    .counter__campaign__inner {
        background-color: #E70F47;
        margin-bottom: 10px;
        display: inline-block;
        padding: 20px;
        border-radius: 5px;
        min-width: 260px;
    }

    .number {
        color: #fff;
    }

    .campaign-list {
        grid-row-gap: 51px;
    }

    .upcoming-campaign-thumbnail-image {
        width: auto;
    }

    @media screen and (max-width: 900px) {
        .campainBg__image {
            max-width: fit-content;
        }
    }

    .view__all {
        padding: 5px;
        text-align: center;
        background-color: #16327A;
        margin-top: 30px;
    }

    .view__all__link {
        color: #fff
    }

    @media screen and (max-width: 425px) {
        .cusotom__upcoming-campaign-donation {
            margin-bottom: 30px;
        }
    }

    @media screen and (max-width: 768px) {
        .upcoming-campaign-content {
            width: auto;
        }
    }

    .our-mission-content-wrapper.press-tweet-volunteer {
        margin-top: -65px;
    }

    /* Video section */
    .title {
        width: 100%;
        max-width: 854px;
        margin: 0 auto;
    }

    .caption {
        width: 100%;
        max-width: 854px;
        margin: 0 auto;
        padding: 20px 0;
    }

    .vid-main-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        height: 100%;
    }

    /*  VIDEO PLAYER CONTAINER
 		############################### */
    .vid-container {
        width: 100%;
        height: 100%;
    }

    .vid-container iframe {
        width: 100%;
        height: 100%;
        min-height: 300px;
    }

    /*  VIDEOS PLAYLIST
 		############################### */

    .vid-list-container {
        overflow-x: auto;
        list-style: none;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .video-list {
        min-width: 100px;
    }

    .more__video__btn {
        display: block;
        width: 100%;
        text-align: center;
        background-color: #E70F47;
        opacity: .9;
    }

    .more__video__btn {
        color: #fff;
        padding: 10px 0;
    }

    ol#vid-list {
        margin: 0;
        padding: 0;
        background: #222;
    }

    ol#vid-list li {
        list-style: none;
    }

    ol#vid-list li a {
        text-decoration: none;
        background-color: #222;
        height: 55px;
        display: block;
        padding: 10px;
    }

    ol#vid-list li a:hover {
        background-color: #666666
    }

    .vid-thumb {
        margin-right: 5px;
    }

    .active-vid {
        background: #3A3A3A;
    }

    #vid-list .desc {
        color: #CACACA;
        font-size: 13px;
        margin-top: 5px;
    }

    /* facebook page content */
    @media screen and (max-width: 425px) {
        .campaign-donation-content {
            padding-right: 20px;
            padding-left: 0px;
        }
    }

    .our-mission-image {
        position: relative;
    }

    .fb-page {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }


    @media screen and (max-width: 1024px) {
        .our-mission-content-block {
            padding: 20px;
        }
    }

    @media screen and (max-width: 479px) {
        .our-mission-wrapper {
            grid-row-gap: 80px;
        }
    }

    .custom__video__container {
        position: relative;
    }

    /* End press-tweet-volunteer-sectio */
    .bottomleft {
        position: absolute;
        bottom: 8px;
        font-size: 20px;
    }

    /* End client-logo-section */
    .footer {
        background-image: url({{asset($setting->footer_bg ?? '')}});
    }

    #SubscribeEmailId {
        margin-bottom: 10px;
        width: 100%;
        border-radius: 8px;
        padding: 10px 26px;
        color: #000;
    }

    #SubscribeBtnId {
        width: 100%;
        border-radius: 8px;
        padding: 10px 26px;
        -webkit-align-self: flex-start;
        -ms-flex-item-align: start;
        align-self: flex-start;
        background-color: #e70f47;
        font-family: 'Baloo Da 2', sans-serif;
        font-weight: 600;
    }
    /* End footer */

</style>

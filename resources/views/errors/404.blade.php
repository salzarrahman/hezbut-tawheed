<!DOCTYPE html>
<html>

<head>

    <title>404 page not found </title>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="{{ asset('frontend/assets/cs/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous" />
    <script type="text/javascript" src="{{ asset('frontend/assets/js/main.js') }}" charset="UTF-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <link href='https://fonts.googleapis.com/css?family=Baloo Da 2' rel='stylesheet'>




    <link href="{{ asset('frontend/images/x-icon.png') }}" rel="shortcut icon" type="image/x-icon" />
    <link href="{{ asset('frontend/images/apple-touch-icon.png') }}" rel="apple-touch-icon" />



    <style>
        body {
            font-family: 'Baloo Da 2', sans-serif;
        }
    </style>

</head>

<body>
    <div class="page-wrapper">
        @include('frontend.layouts.header')
        @include('frontend.layouts.navigation')

        <div class="breadcrumb-section">
            <div class="container w-container">
                <div class="breadcrumb-wrapper">
                    <h1 class="breadcrumb-title"> 404 </h1>
                    <div class="breadcrumb-link-block">
                        <a href="#" class="breadcrumb-backlink">page not found </a>

                    </div>
                </div>
            </div>
        </div>


        @include('frontend.layouts.footer')
    </div>

    <!-- jquery -->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}" type="text/javascript"></script>
    <!-- theme -->
    <script src="{{ asset('frontend/assets/js/theme.js') }}" type="text/javascript"></script>

    @yield('scripts')

</body>

</html>

@php
    $setting        = App\Models\Setting::find(1);
@endphp

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset( $setting->favicon) }}" type="image/png" />

  <title>@yield('page_title') || {{ config('app.name') }}</title>

<!--plugins-->
<link href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }} " rel="stylesheet"/>
<link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }} " rel="stylesheet" />
<link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }} " rel="stylesheet" />
<link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }} " rel="stylesheet" />
<link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet"/>


<!--dataTables-->
<link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }} " rel="stylesheet" />



<!-- Bootstrap CSS -->
<link href="{{ asset('backend/assets/css/bootstrap.min.css') }} " rel="stylesheet" />
<link href="{{ asset('backend/assets/css/bootstrap-extended.css') }} " rel="stylesheet" />
<link href="{{ asset('backend/assets/css/style.css') }} " rel="stylesheet" />
<link href="{{ asset('backend/assets/css/icons.css') }} " rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<!-- loader-->
<link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />

<!--Theme Styles-->
<link href="{{ asset('backend/assets/css/dark-theme.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/css/light-theme.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/css/semi-dark.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/css/header-colors.css') }}" rel="stylesheet" />

<!-- toastr css -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

<!-- inputTags css -->
<link href="{{ asset('backend/assets/libs/mohithg-switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/libs/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />

<!-- imgareaselect css -->
<link href="{{ asset('backend/assets/css/imgareaselect/imgareaselect.css') }}" rel="stylesheet" type="text/css" />


    @yield('page_style')


    <style>
        body {
            font-size: 14px;
            color: #4c5258;
            letter-spacing: .5px;
            font-family: Roboto, sans-serif;
            background-color: #f0f0f1;
            overflow-x: hidden;
        }
    /* Add centered text to the middle of a horizontal rule */
        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            color: #4f08ac;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #000;
        }

        .separator:not(:empty)::before {
            margin-right: .25em;
        }

        .separator:not(:empty)::after {
            margin-left: .25em;
        }
        .deeptouchit_btn {
            background: #e2136e;
            opacity: 1;
            color: rgb(255, 255, 255);
        }

        .btn_deeptouchit {
            background: #e2136e;
            opacity: 1;
            color: rgb(255, 255, 255);
        }
        .sidebar-wrapper .sidebar-header .logo-text {
            font-size: 18px;
        }

         /* end Add centered text to the middle of a horizontal rule */
    </style>
@php
    $setting        = App\Models\Setting::find(1);
@endphp



</head>

<body>

<!--start wrapper-->
  <!--start wrapper-->
  <div class="wrapper">

    <!--start top header-->
        @include('backend.components.header')
    <!--end top header-->

    <!--start sidebar -->
        @include('backend.components.sidebar')
    <!--end sidebar -->

       <!--start content-->
            <main class="page-content">
                <!--breadcrumb-->
                    @include('backend.components.breadcrumb')
                <!--end breadcrumb-->
                @yield('page-content')
            </main>
       <!--end page main-->

       <!--start overlay-->
        {{-- <div class="overlay nav-toggle-icon"></div> --}}
       <!--end overlay-->

       <!--start footer-->
            @include('backend.components.footer')
        <!--end footer-->


       <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
       <!--End Back To Top Button-->

       <!--start switcher-->
            {{-- @include('backend.components.switcher') --}}
       <!--end switcher-->

  </div>
  <!--end wrapper-->

  @yield('modal')

  <!-- Bootstrap bundle JS -->
  <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>

  <!--plugins-->
  <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/form-select2.js') }}"></script>

 <!--datatable-->
  <script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/table-datatable.js') }}"></script>

  <!--app-->
  <script src="{{ asset('backend/assets/js/app.js') }}"></script>
  <script src="{{ asset('backend/assets/js/index3.js') }}"></script>
  <script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('backend/assets/js/code.js') }}"></script>

  <script>
    new PerfectScrollbar(".best-product")
 </script>


 <!-- InputTags js-->
 <script src="{{ asset('backend/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
 <script src="{{ asset('backend/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>


<!-- imgareaselect css -->

<script src="{{ asset('backend/assets/js/imgareaselect/imgareaselect.js') }}"></script>




  <!-- toastr js-->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
      @if(Session::has('message'))
      var type = "{{ Session::get('alert-type','info') }}"
      switch(type){
         case 'info':
         toastr.info(" {{ Session::get('message') }} ");
         break;
         case 'success':
         toastr.success(" {{ Session::get('message') }} ");
         break;
         case 'warning':
         toastr.warning(" {{ Session::get('message') }} ");
         break;
         case 'error':
         toastr.error(" {{ Session::get('message') }} ");
         break;
      }
      @endif

     </script>

     @include('backend.components.datatablescript')

    @yield('scripts')


</body>

</html>

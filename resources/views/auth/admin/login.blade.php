<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png" />
  <!-- Bootstrap CSS -->
  <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />

  <title>Onedash - Bootstrap 5 Admin Template</title>
</head>

<body>

  <!--start wrapper-->
  <div class="wrapper">

       <!--start content-->
       <main class="authentication-content">
        <div class="container-fluid">
          <div class="authentication-card">
            <div class="card shadow rounded-0 overflow-hidden">
              <div class="row g-0">
                <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                  <img src="{{ asset('backend/assets/images/error/login-img.jpg') }} " class="img-fluid" alt="">
                </div>
                <div class="col-lg-6">
                  <div class="card-body p-4 p-sm-5">
                    <h5 class=" text-center">{{ __('Login') }}</h5>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row g-3">
                          <div class="col-12">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-envelope-fill"></i>
                                </div>
                              <input type="email" class="form-control ps-5 form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email Address">
                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                          </div>
                          <div class="col-12">
                            <label for="password" class="form-label">Enter Password</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-lock-fill"></i>
                                </div>
                              <input type="password" class="form-control  ps-5 @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter Password">
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="col-6">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                              <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                            </div>
                          </div>
                          <div class="col-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
                          </div>
                          <div class="col-12">
                            <div class="d-grid">
                              <button type="submit" class="btn btn-primary radius-30">Sign In</button>
                            </div>
                          </div>
                          <div class="col-12">
                            <p class="mb-0">Don't have an account yet? <a href="authentication-signup.html">Sign up here</a></p>
                          </div>
                        </div>
                    </form>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </main>

       <!--end page main-->

  </div>
  <!--end wrapper-->


  <!--plugins-->
  <script src="{{ asset('backend/assets/js/jquery.min.js') }} "></script>
  <script src="{{ asset('backend/assets/js/pace.min.js') }} "></script>


</body>

</html>

@extends('backend.layouts.backend')

@section('page_title', 'Change Password')

@section('breadcrumb_link_one',Str::ucfirst(Request::segment(2)))
@section('breadcrumb_link_two',Str::ucfirst(Request::segment(3)))

@section('breadcrumb_sub_link')

@endsection

@section('page_style')


@endsection


@section('page-content')

<div class="row">
    <div class="col-xl-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded ">
                    <h4 class="mb-0 text-center">Genrate New Password</h4>
                    <p class="card-text mb-2 text-center">We received your reset password request. Please enter your new password!</p>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @elseif(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                        @endif

                    <hr>
                    <form method="post" action="{{ route('admin.update.password') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="firstname" class="form-label">{{ __('Old Password') }}</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="current_password">
                                    <div class="input-group-text" data-password="false">
                                        <span toggle="#current_password" class="fa fa-fw fa-eye field-icon current_password"></span>
                                    </div>
                                </div>
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="lastname" class="form-label"> {{ __('New Password') }} </label>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password">
                                    <div class="input-group-text" data-password="false">
                                        <span toggle="#new_password" class="fa fa-fw fa-eye field-icon new_password"></span>
                                    </div>
                                </div>
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="lastname" class="form-label">{{ __('Confirm New Password') }} </label>
                                <div class="input-group input-group-merge">
                                    <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" >
                                    <div class="input-group-text" data-password="false">
                                        <span toggle="#new_password_confirmation" class="fa fa-fw fa-eye field-icon password_confirmation"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">  Change Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
@parent

<script>

    $(".current_password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        }else {
            input.attr("type", "password");
        }
    });

    $(".new_password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        }else {
            input.attr("type", "password");
        }
    });

    $(".password_confirmation").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        }else {
            input.attr("type", "password");
        }
    });
</script>

@endsection

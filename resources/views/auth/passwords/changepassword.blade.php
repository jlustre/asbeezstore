@extends('layouts.nonav')

@section('content')
<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
<div class="col-lg-7">
    <div class="p-5">
        <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">{{ __('Change Password!') }}</h1>
        </div>
        @include('layouts._messages')

        <form class="user" method="POST" action="{{ route('update.password') }}">
            @csrf
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user @error('oldpassword') is-invalid @enderror" id="oldpassword" name="oldpassword" placeholder="{{ __('Old Password') }}" required autocomplete="old-password">
                    @error('oldpassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ __('New Password') }}" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="password" class="form-control form-control-user" id="password-confirm" name="password_confirmation" placeholder="{{ __('Confirm New Password') }}" required autocomplete="new-password">
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-user btn-block">
                <i class="fas fa-user-plus"></i>  {{ __('Update Password') }}
            </button>
        </form>
        <hr>
        <div class="text-center">
            <a class="small" href="{{ route('home') }}">{{ __('Back To Our Home Page') }}</a>
        </div>
    </div> <!-- End of p-5 -->
</div> <!-- End of col-lg-7 -->

@endsection

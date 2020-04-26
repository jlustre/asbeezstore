@extends('layouts.nonav')

@section('content')
    <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
            <h1 class="h4 text-gray-900 mb-2">{{ __('Reset Password') }}</h1>
            <p class="mb-4">Enter your email address below and we'll send you a link to reset your password!</p>
            </div>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" aria-describedby="emailHelp" placeholder="{{ __('Enter Email Address...') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Send Password Reset Link') }}
                </button>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="{{ route('register') }}">Create an Account!</a>
            </div>
            <div class="text-center">
                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
            </div>
            <div class="text-center">
                <a class="small" href="{{ route('welcome') }}">Back To Our Site</a>
            </div>
        </div>
    </div>
@endsection

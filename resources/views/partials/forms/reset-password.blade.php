<div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
<div class="col-lg-6">
    <div class="p-5">
        <div class="text-center">
        <h1 class="h4 text-gray-900 mb-2">{{ __('Reset Password') }}</h1>
        <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
        </div>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" aria-describedby="emailHelp" placeholder="{{ __('Enter Email Address...') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                <input type="password" class="form-control form-control-user" id="password-confirm" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                {{ __('Reset Password') }}
            </button>
        </form>
    </div>
</div>

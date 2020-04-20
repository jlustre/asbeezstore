<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
<div class="col-lg-6">
    <div class="p-5">
        <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">{{ __('Welcome Back!') }}</h1>
        </div>
        <form class="user" method="POST" action="{{ route('login') }}">
                @csrf
            <div class="form-group">
                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('Enter Email Address') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox small">
                <input type="checkbox" class="custom-control-input" name="remember"  id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="customCheck">{{ __('Remember Me') }}</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{ __('Login') }}
        </button>

        <hr>
        <a href="index.html" class="btn btn-google btn-user btn-block">
            <i class="fab fa-google fa-fw"></i> Login with Google
        </a>
        <a href="index.html" class="btn btn-facebook btn-user btn-block">
            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
        </a>
        </form>
        <hr>
        @if (Route::has('password.request'))
            <div class="text-center">
                <a class="small" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
            </div>
        @endif

        <div class="text-center">
            <a class="small" href="{{ route('register') }}">Create an Account!</a>
        </div>
        <div class="text-center">
            <a class="small" href="{{ route('welcome') }}">Back To Our Site</a>
        </div>
    </div>
</div>

<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
<div class="col-lg-7">
    <div class="p-5">
        <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">{{ __('Create an Account!') }}</h1>
        </div>
        <form class="user" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user @error('sponsor') is-invalid @enderror" id="sponsor" name="sponsor" value="{{ old('sponsor') }}" placeholder="{{ __('Sponsor') }}" required autocomplete="sponsor" autofocus>
                    @error('sponsor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="{{ __('Username') }}" required autocomplete="username">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user @error('firstname') is-invalid @enderror" id="firstname" name="firstname" value="{{ old('firstname') }}" placeholder="{{ __('First Name') }}" required autocomplete="firstname">
                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ old('lastname') }}" placeholder="{{ __('Last Name') }}" required autocomplete="lastname">
                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('Email Address') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password-confirm" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                <i class="fas fa-user-plus"></i>  {{ __('Register Account') }}
            </button>
            <hr>
            <a href="#" class="btn btn-google btn-user btn-block">
                <i class="fab fa-google fa-fw"></i> {{ __('Register with Google') }}
            </a>
            <a href="#" class="btn btn-facebook btn-user btn-block">
                <i class="fab fa-facebook-f fa-fw"></i> {{ __('Register with Facebook') }}
            </a>
        </form>
        <hr>

        <div class="text-center">
            <a class="small" href="{{ route('login') }}">{{ __('Already have an account?') }} {{ __('Login') }}!</a>
        </div>
        <div class="text-center">
            <a class="small" href="{{ route('welcome') }}">{{ __('Back To Our Site') }}</a>
        </div>
    </div> <!-- End of p-5 -->
</div> <!-- End of col-lg-7 -->

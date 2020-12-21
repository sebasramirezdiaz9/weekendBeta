@extends('layouts.app')

@section('content')
<div class="container-fluid" >
    
    <div class="row">
        
        <div class="col-md-6 m-auto py-5">
            <div class="card "  >
            <div class="form-group row">
                <div class="col-md-6 offset-md-3">
                    <div class="d-flex justify-content-center mt-4">
                        <img width="90px"  src="{{asset ('storage/login.png')}}" alt="">
                    </div>
                    <div style="font-size:25px" class="p-2 mt-2 font-weight-bold fscard-tile text-center">{{ __('Weekend For You!') }}</div>

                </div>
            </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                            <label for="password" >{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-outline-dark btn-lg btn-block">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-12 text-center learts-mb-50" style="margin-top: 50px">
                            <p class="fw-400">Registro por redes sociales</p>
                            <div class="kt-login__options center" >
                                <a href="{{ route('social.auth', 'facebook') }}" class="btn border-dark btn-primary btn-hover-black">
                                <i class="fab fa-facebook"></i>
                                    Facebook
                                </a>
                                <a href="{{ route('social.auth', 'google') }}" class="btn border-dark btn-danger btn-hover-black">
                                    <i class="fas fa-google"></i>
                                    Google
                                </a>
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

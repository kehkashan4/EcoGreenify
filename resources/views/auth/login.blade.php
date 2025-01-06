@extends('layouts.app')

@section('content')
<style>
    .header-color{
        background-color: #023d54;
        color: white;
    }
    .login-button{
        background-color: #39b54a;
        color: white;
        padding: 5px 15px;
    }
    .login-button:hover{
        background-color: #28a745;
        color: white;
      }
    .register-button{
        border-color: #39b54a;
        color: #39b54a;
    }
    .register-button:hover{
        background-color: #28a745;
        color: white;
      }
      .register-button:focus, .register-button:active {
        background-color: #28a745 !important;
        color: white !important;
        }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="card-header header-color">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-3 offset-md-4">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link d-inline-block" style="white-space: nowrap;" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-2 ms-5">
                            <div class="col-md-6 offset-md-3">

                                    <input class="form-check-input mt-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                    <button type="submit" class="btn login-button ms-4">
                                         {{ __('Login') }}
                                    </button>
                            </div>
                        </div>

                        <div class="row mb-0">
                              <div class="col-md-8 offset-md-4">
                                  <label for="register" class="me-3">Don't Have an Account?</label>
                                  @if (Route::has('register'))
                                  <a class="btn register-button" href="{{ route('register') }}">{{ __('Register') }}</a>
                                  @endif
                              </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

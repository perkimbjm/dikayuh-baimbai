@extends('layouts.app')
@section('content')
<section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-6 col-lg-6 col-xl-6 order-2 order-md-1">
          <img src="{{ asset('img/login.png') }}" class="img-fluid" alt="login-image">
        </div>
        <div class="col-md-6 col-lg-5 col-xl-5 order-1 order-md-2">
            <div class="card mx-auto">
                <div class="login-logo mt-2 mb-1">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="logo-dikayuh">
                    </a>
                </div>
                <div class="card-body login-card-body mt-0">
                    <h4 class="login-box-msg">
                        {{ trans('global.sign_in') }}
                    </h4>
        
                    @if(session()->has('message'))
                        <p class="alert alert-info">
                            {{ session()->get('message') }}
                        </p>
                    @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" autofocus placeholder="{{ trans('global.login_username') }}" name="username" value="{{ old('username', null) }}">

                @if($errors->has('username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                @endif
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-4">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ trans('global.login_password') }}">

                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>
  
            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  name="remember"
                  value=""
                  id="remember"
                  checked
                />
                <label class="form-check-label" for="remember"> {{ trans('global.remember_me') }}</label>
              </div>
              
              @if(Route::has('password.request'))
                <p class="mb-1">
                    <a href="{{ route('password.request') }}">
                        {{ trans('global.forgot_password') }}
                    </a>
                </p>
            @endif
            </div>

             
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-lg btn-block">{{ trans('global.login') }}</button>
  
          </form>
          <div>
            <p class="mb-1">
                {{ trans('global.hasnt_account') }}
                <a class="text-center" href="{{ route('register') }}">
                    {{ trans('global.registerhere') }}
                </a>
            </p>
            </div>
        
            </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  @endsection
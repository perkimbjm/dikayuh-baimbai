@extends('layouts.app')
@section('content')
<section class="vh-100">
    <div class="container pt-4 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-6 col-lg-6 col-xl-6 order-2 order-md-1">
          <img src="{{ asset('img/register.png') }}" class="img-fluid" alt="login-image">
        </div>
        <div class="col-md-6 col-lg-5 col-xl-5 order-1 order-md-2">
            <div class="card mx-auto">
                <div class="login-logo mt-2 mb-1">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="logo-sialdo">
                    </a>
                </div>
                <div class="card-body login-card-body mt-0 pt-0">
                    <h4 class="login-box-msg mt-0">
                        {{ trans('global.register') }}
                    </h4>

            <form action="{{ route('register') }}" method="POST">
                {{ csrf_field() }}

            <div>
             {{ csrf_field() }}
            <div class="form-outline mb-3">
                <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                     </div>
                 @endif
            </div>
  
            <div class="form-outline mb-3">
                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="form-outline mb-3">
                <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_phone') }}" value="{{ old('phone', null) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
            </div>

            <div class="form-outline mb-3">
                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="form-outline mb-3">
                <input type="password" name="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
            </div>
               
            <!-- Submit button -->
            <div class="form-outline mb-2">
                <button type="submit" class="btn btn-primary btn-lg btn-block">{{ trans('global.register') }}</button>
            </div>
          </form>

                </div>
            </div>
        </div>
      </div>
    </div>

   
  </section>
  @endsection
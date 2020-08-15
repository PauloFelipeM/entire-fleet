@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'reset'])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
      <h3>{{ __('auth.please_confirm_reset') }}</h3>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('auth.reset_password') }}</strong></h4>
          </div>
          <div class="card-body">
            <p class="card-description text-center"></p>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror pl-1" readonly name="email" value="{{ $email ?? old('email') }}"
                    required autocomplete="email" placeholder="{{__('auth.email')}}" autofocus>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input id="password" placeholder="{{__('auth.password')}}" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input id="password-confirm" type="password" placeholder="{{__('auth.password_confirmation')}}" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
              @if ($errors->has('password_confirmation'))
                <div id="password-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
              @endif
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary">{{ __('auth.change_password') }}</button>  
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

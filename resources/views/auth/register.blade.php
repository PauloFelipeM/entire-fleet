@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register'])

@section('css_before')
<!-- CSS BEFORE START CONTENT -->
@endsection


@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
      <h2>{{__('auth.new_acc')}}</h2>        
      <h3>{{__('auth.excited_message')}}</h3>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('auth.add_details') }}</strong></h4>
          </div>
          <div class="card-body">
            <p class="card-description text-center"></p>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">person</i>
                  </span>
                </div>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" 
                        placeholder="{{__('auth.username')}}" name="name" value="{{ old('name') }}" required autocomplete="name">
              </div>
              @if ($errors->has('name'))
                <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                  <strong>{{ $errors->first('name') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" 
                    placeholder="{{__('auth.email')}}" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" 
                        placeholder="{{__('auth.password')}}" name="password" required autocomplete="new-password">
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
                <input type="password" class="form-control" id="password-confirm" 
                        placeholder="{{__('auth.password_confirmation')}}" name="password_confirmation" required autocomplete="new-password">
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{__('auth.create_acc')}}</button>
          </div>
        </div>
      </form>
      <div class="row">
        <div class="col-md-12">
            <div class="text-center">                                            
                <a href="{{ route('login') }}" class="text-light">
                    <small>{{__('auth.btn_signin')}}</small>
                </a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

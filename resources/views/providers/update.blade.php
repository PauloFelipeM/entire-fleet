@extends('layouts.app', ['activePage' => 'providers', 'title' => __('provider.title_pluralize'), 'cads' => true])

@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>    
        <li class="breadcrumb-item active"><a href="/providers">{{__('provider.title_pluralize')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('default.update')}}</li>
      </ol>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('/providers/store/'.$provider->id)}}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('default.update') }}</h4>
              </div>
              <div class="card-body ">
                <div class="row">

                  <div class="col-md-4">
                    <label class="col-form-label">{{__('provider.name')}}</label>
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required 
                      name="name" id="input-name" type="text" value="{{ old('name', $provider->name) }}"/>
                      @error('name')
                        <span id="name-error" class="error text-danger" for="input-name">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label class="col-form-label">{{__('provider.social_name')}}</label>
                    <div class="form-group{{ $errors->has('social_name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('social_name') ? ' is-invalid' : '' }}" required 
                      name="social_name" id="input-social_name" type="text" value="{{ old('social_name', $provider->social_name) }}"/>
                      @error('social_name')
                        <span id="social_name-error" class="error text-danger" for="input-social_name">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>    

                  <div class="col-md-4">
                    <label class="col-form-label">{{__('provider.email')}}</label>
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required 
                      name="email" id="input-email" type="email" value="{{ old('email', $provider->email) }}"/>
                      @error('email')
                        <span id="email-error" class="error text-danger" for="input-email">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>                                    

                  </div>

                  <div class="row">   

                  <div class="col-md-4">
                    <label class="col-form-label">{{__('provider.phone')}}</label>
                    <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" required 
                      name="phone" id="input-phone" type="phone" value="{{ old('phone', $provider->phone) }}"/>
                      @error('phone')
                        <span id="phone-error" class="error text-danger" for="input-phone">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>   

                  <div class="col-md-4">
                    <label class="col-form-label">{{__('provider.zip_code')}}</label>
                    <div class="form-group{{ $errors->has('zip_code') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('zip_code') ? ' is-invalid' : '' }}" required 
                      name="zip_code" id="input-zip_code" type="text" value="{{ old('zip_code', $provider->zip_code) }}"/>
                      @error('zip_code')
                        <span id="zip_code-error" class="error text-danger" for="input-zip_code">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>                  

                  <div class="col-md-4">
                    <label class="col-form-label">{{__('provider.address')}}</label>
                    <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" required 
                      name="address" id="input-address" type="text" value="{{ old('address', $provider->address) }}"/>
                      @error('address')
                        <span id="address-error" class="error text-danger" for="input-address">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>                

                  </div>  

                </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('providers')}}" class="btn btn-secondary">
                    {{__('default.btn_back')}}
                </a>
                <button type="submit" class="btn btn-primary">{{ __('default.btn_update') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<script>
  $(document).ready(function($){
    $('#input-phone').mask('(00) 0000-0000');
  })
</script>
@endsection
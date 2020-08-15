@extends('layouts.app', ['activePage' => 'drivers', 'title' => __('driver.title_pluralize'), 'cads' => true])

@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>    
        <li class="breadcrumb-item active"><a href="/drivers">{{__('driver.title_pluralize')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('default.new')}}</li>
      </ol>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('/drivers/store')}}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('default.new') }}</h4>
              </div>
              <div class="card-body ">
                <div class="row">

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('driver.name')}}</label>
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required 
                      name="name" id="input-name" type="text" value="{{ old('name') }}"/>
                      @error('name')
                        <span id="name-error" class="error text-danger" for="input-name">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('driver.email')}}</label>
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required 
                      name="email" id="input-email" type="email" value="{{ old('email') }}"/>
                      @error('email')
                        <span id="email-error" class="error text-danger" for="input-email">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>   

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('driver.social_security')}}</label>
                    <div class="form-group{{ $errors->has('social_security') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('social_security') ? ' is-invalid' : '' }}" required 
                      name="social_security" id="input-social_security" type="text" value="{{ old('social_security') }}"/>
                      @error('social_security')
                        <span id="social_security-error" class="error text-danger" for="input-social_security">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>                      

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('driver.phone')}}</label>
                    <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" required 
                      name="phone" id="input-celphone" type="phone" value="{{ old('phone') }}"/>
                      @error('phone')
                        <span id="phone-error" class="error text-danger" for="input-celphone">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>                  

                </div>

                <div class="row">   

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('driver.driver_license')}}</label>
                    <div class="form-group{{ $errors->has('driver_license') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('driver_license') ? ' is-invalid' : '' }}" required 
                      name="driver_license" id="input-driver_license" type="text" value="{{ old('driver_license') }}"/>
                      @error('driver_license')
                        <span id="driver_license-error" class="error text-danger" for="input-driver_license">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>                  

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('driver.driver_license_expiration')}}</label>
                    <div class="form-group{{ $errors->has('driver_license_expiration') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('driver_license_expiration') ? ' is-invalid' : '' }}" required 
                      name="driver_license_expiration" id="input-driver_license_expiration" type="date" value="{{ old('driver_license_expiration') }}"/>
                      @error('driver_license_expiration')
                        <span id="driver_license_expiration-error" class="error text-danger" for="input-driver_license_expiration">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>      

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('driver.driver_license_category')}}</label>
                    <div class="form-group{{ $errors->has('driver_license_category') ? ' has-danger' : '' }}">                      
                      <select class="form-control{{ $errors->has('driver_license_category') ? ' is-invalid' : '' }}" 
                        name="driver_license_category" id="input-driver_license_category" required>
                        <option value="">{{__('default.select_a_value')}}</option>
                        @foreach($licenseCategories as $key => $licenseCategory)
                          @if (Input::old('licenseCategory') == $key)
                            <option value="{{ $key }}" selected>{{ $licenseCategory }}</option>
                          @else
                            <option value="{{ $key }}">{{ $licenseCategory }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('driver_license_category')
                      <span id="driver_license_category-error" class="error text-danger" for="input-driver_license_category">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('driver.birth_date')}}</label>
                    <div class="form-group{{ $errors->has('birth_date') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}" required 
                      name="birth_date" id="input-birth_date" type="date" value="{{ old('birth_date') }}"/>
                      @error('birth_date')
                        <span id="birth_date-error" class="error text-danger" for="input-birth_date">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>                    

                </div>              

              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('drivers')}}" class="btn btn-secondary">
                    {{__('default.btn_back')}}
                </a>
                <button type="submit" class="btn btn-primary">{{ __('default.btn_create') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<script>
  $(document).ready(function($){
    $('#input-social_security').mask('000.000.000-00', {reverse: true});
    $('#input-celphone').mask('(00) 00000-0000');
  })
</script>
@endsection         
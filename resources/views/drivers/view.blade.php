@extends('layouts.app', ['activePage' => 'drivers', 'title' => __('driver.title_pluralize'), 'cads' => true])

@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>    
        <li class="breadcrumb-item active"><a href="/vehicles">{{__('driver.title_pluralize')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('default.details')}}</li>
      </ol>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('default.details') }}</h4>
              </div>
              <div class="card-body ">
                <div class="row">

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('driver.name')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                      required name="name" id="input-name" type="text" value="{{ $driver->name }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('driver.email')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                      required name="email" id="input-email" type="text" value="{{ $driver->email }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('driver.social_security')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                      required name="social_security" id="input-social_security" type="text" value="{{ $driver->social_security }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('driver.phone')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                      required name="phone" id="input-phone" type="text" value="{{ $driver->phone }}"/>
                    </div>
                  </div>                                    

                </div>

                <div class="row">

                <div class="col-md-3">
                    <label class="col-form-label">{{__('driver.driver_license')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                      required name="driver_license" id="input-driver_license" type="text" value="{{ $driver->driver_license }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('driver.driver_license_expiration')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                      required name="driver_license_expiration" id="input-driver_license_expiration" type="text" value="{{\Carbon\Carbon::parse($driver->driver_license_expiration)->format(__('default.format_date'))}}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('driver.driver_license_category')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                      required name="driver_license_category" id="input-driver_license_category" type="text" value="{{ $driver->license_category_name }}"/>
                    </div>
                  </div>
                  
                  <div class="col-md-3">
                    <label class="col-form-label">{{__('driver.birth_date')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                      required name="birth_date" id="input-birth_date" type="text" value="{{\Carbon\Carbon::parse($driver->birth_date)->format(__('default.format_date'))}}"/>
                    </div>
                  </div>                                  
                </div>  

              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('drivers')}}" class="btn btn-secondary">
                    {{__('default.btn_back')}}
                </a>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
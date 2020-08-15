@extends('layouts.app', ['activePage' => 'providers', 'title' => __('provider.title_pluralize'), 'cads' => true])

@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>    
        <li class="breadcrumb-item active"><a href="/vehicles">{{__('provider.title_pluralize')}}</a></li>
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

                  <div class="col-md-4">
                    <label class="col-form-label">{{__('provider.name')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                      required name="name" id="input-name" type="text" value="{{ $provider->name }}"/>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label class="col-form-label">{{__('provider.social_name')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                      required name="social_name" id="input-social_name" type="text" value="{{ $provider->social_name }}"/>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label class="col-form-label">{{__('provider.email')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                      required name="email" id="input-email" type="text" value="{{ $provider->email }}"/>
                    </div>
                  </div>

                </div>

                <div class="row">
         
                  <div class="col-md-4">
                    <label class="col-form-label">{{__('provider.phone')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                      required name="phone" id="input-phone" type="text" value="{{ $provider->phone }}"/>
                    </div>
                  </div>                                    

                  <div class="col-md-4">
                    <label class="col-form-label">{{__('provider.zip_code')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                      required name="zip_code" id="input-zip_code" type="text" value="{{ $provider->zip_code }}"/>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label class="col-form-label">{{__('provider.address')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                      required name="address" id="input-address" type="text" value="{{ $provider->address }}"/>
                    </div>
                  </div>

                </div>  

              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('providers')}}" class="btn btn-secondary">
                    {{__('default.btn_back')}}
                </a>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
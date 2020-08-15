@extends('layouts.app', ['activePage' => 'vehicles', 'title' => __('vehicle.title_pluralize'), 'cads' => true])

@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>    
        <li class="breadcrumb-item active"><a href="/vehicles">{{__('vehicle.title_pluralize')}}</a></li>
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
                    <label class="col-form-label">{{__('vehicle.plate')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="plate" id="input-plate" type="text" value="{{ $vehicle->plate }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('vehicle.document')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="document" id="input-document" type="text" value="{{ $vehicle->document }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('vehicle.color')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="color" id="input-color" type="text" value="{{ $vehicle->color }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('vehicle.fuel')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="fuel" id="input-fuel" type="text" value="{{ $vehicle->fuel_name }}"/>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('vehicle.brand_id')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="brand_id" id="input-brand_id" type="text" value="{{ $vehicle->brand->title }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('vehicle.vehicle_type_id')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="vehicle_type_id" id="input-vehicle_type_id" type="text" value="{{ $vehicle->vehicletype->title }}"/>
                    </div>
                  </div>                

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('vehicle.manufacture_year')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="manufacture_year" 
                        id="input-manufacture_year" type="number" value="{{ $vehicle->manufacture_year }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('vehicle.model_year')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="model_year" 
                        id="input-model_year" type="number" value="{{ $vehicle->model_year }}"/>
                    </div>
                  </div>                   

                </div> 

                <div class="row">
                
                  <div class="col-md-3">
                    <label class="col-form-label">{{__('vehicle.km_started')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="km_started" id="input-km_started" type="number" step="0.01" value="{{ $vehicle->km_started }}"/>
                    </div>
                  </div> 

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('vehicle.km_current')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="km_current" 
                        id="input-km_current" type="number" value="{{ $vehicle->km_current }}"/>
                    </div>
                  </div>

                </div> 

              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('vehicles')}}" class="btn btn-secondary">
                    {{__('default.btn_back')}}
                </a>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
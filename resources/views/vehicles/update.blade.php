@extends('layouts.app', ['activePage' => 'vehicles', 'title' => __('vehicle.title_pluralize'), 'cads' => true])

@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>    
        <li class="breadcrumb-item active"><a href="/vehicles">{{__('vehicle.title_pluralize')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('default.update')}}</li>
      </ol>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('/vehicles/store/'.$vehicle->id)}}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('default.update') }}</h4>
              </div>
              <div class="card-body ">

                <div class="row">

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('vehicle.plate')}}</label>
                    <div class="form-group{{ $errors->has('plate') ? ' has-danger' : '' }}">
                      <input class="input-upper form-control{{ $errors->has('plate') ? ' is-invalid' : '' }}" 
                        required name="plate" id="input-plate" type="text" value="{{ old('plate', $vehicle->plate) }}"/>
                      @error('plate')
                      <span id="plate-error" class="error text-danger" for="input-plate">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('vehicle.document')}}</label>
                    <div class="form-group{{ $errors->has('document') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('document') ? ' is-invalid' : '' }}" 
                        required name="document" id="input-document" type="number" step="0.01" value="{{ old('document', $vehicle->document) }}"/>
                      @error('document')
                        <span id="document-error" class="error text-danger" for="input-document">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('vehicle.color')}}</label>
                    <div class="form-group{{ $errors->has('color') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" 
                        required name="color" id="input-color" type="text" value="{{ old('color', $vehicle->color) }}"/>
                      @error('color')
                      <span id="color-error" class="error text-danger" for="input-color">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('vehicle.fuel')}}</label>
                    <div class="form-group{{ $errors->has('fuel') ? ' has-danger' : '' }}">                      
                      <select class="form-control{{ $errors->has('fuel') ? ' is-invalid' : '' }}" name="fuel" id="input-fuel" required>
                        <option value="">{{__('default.select_a_value')}}</option>
                        @foreach($fuels as $key => $fuel)
                          @if ($vehicle->fuel == $key)
                            <option value="{{ $key }}" selected>{{ $fuel }}</option>
                          @else
                            <option value="{{ $key }}">{{ $fuel }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('fuel')
                      <span id="fuel-error" class="error text-danger" for="input-fuel">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('vehicle.brand_id')}}</label>
                    <div class="form-group{{ $errors->has('brand_id') ? ' has-danger' : '' }}">                      
                      <select class="form-control{{ $errors->has('brand_id') ? ' is-invalid' : '' }}" name="brand_id" id="input-brand_id" required>
                        <option value="">{{__('default.select_a_value')}}</option>
                        @foreach($brands as $brand)
                          @if ($vehicle->brand_id == $brand->id)
                            <option value="{{ $brand->id }}" selected>{{ $brand->title }}</option>
                          @else
                            <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('brand_id')
                      <span id="fuel-error" class="error text-danger" for="input-fuel">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('vehicle.vehicle_type_id')}}</label>
                    <div class="form-group{{ $errors->has('vehicle_type_id') ? ' has-danger' : '' }}">                      
                      <select class="form-control{{ $errors->has('vehicle_type_id') ? ' is-invalid' : '' }}" name="vehicle_type_id" id="input-vehicle_type_id" required>
                        <option value="">{{__('default.select_a_value')}}</option>
                        @foreach($vehicletypes as $vehicletype)
                          @if ($vehicle->vehicle_type_id == $vehicletype->id)
                            <option value="{{ $vehicletype->id }}" selected>{{ $vehicletype->title }}</option>
                          @else
                            <option value="{{ $vehicletype->id }}">{{ $vehicletype->title }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('vehicle_type_id')
                      <span id="fuel-error" class="error text-danger" for="input-fuel">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">{{__('vehicle.km_started')}}</label>
                    <div class="form-group{{ $errors->has('km_started') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('km_started') ? ' is-invalid' : '' }}" 
                        required name="km_started" id="input-km_started" type="number" step="0.01" value="{{ old('km_started', $vehicle->km_started) }}"/>
                      @error('km_started')
                        <span id="km_started-error" class="error text-danger" for="input-km_started">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">{{__('vehicle.manufacture_year')}}</label>
                    <div class="form-group{{ $errors->has('manufacture_year') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('manufacture_year') ? ' is-invalid' : '' }}" 
                        required name="manufacture_year" min="4" 
                        id="input-manufacture_year" type="number" value="{{ old('manufacture_year', $vehicle->manufacture_year) }}"/>
                      @error('manufacture_year')
                        <span id="manufacture_year-error" class="error text-danger" for="input-manufacture_year">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">{{__('vehicle.model_year')}}</label>
                    <div class="form-group{{ $errors->has('model_year') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('model_year') ? ' is-invalid' : '' }}" 
                        required name="model_year" 
                        id="input-model_year" type="number" min="4" value="{{ old('model_year', $vehicle->model_year) }}"/>
                      @error('model_year')
                      <span id="model_year-error" class="error text-danger" for="input-model_year">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>                 

                </div>  

              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('vehicles')}}" class="btn btn-secondary">
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
@endsection
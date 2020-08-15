@extends('layouts.app', ['activePage' => 'tires', 'title' => __('tire.title_pluralize')])

@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>    
        <li class="breadcrumb-item active"><a href="/tires">{{__('tire.title_pluralize')}}</a></li>
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
                    <label class="col-form-label">{{__('tire.serie_number')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="serie_number" id="input-serie_number" type="text" value="{{ $tire->serie_number }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('tire.brand')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="brand" id="input-brand" type="text" value="{{ $tire->brand }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('tire.dimension')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="dimension" id="input-dimension" type="text" value="{{ $tire->dimension }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('tire.note_number')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="note_number" id="input-note_number" type="text" value="{{ $tire->note_number }}"/>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-4">
                    <label class="col-form-label">{{__('tire.provider_id')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="provider_id" id="input-provider_id" type="text" value="{{ $tire->provider->name }}"/>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">{{__('tire.km_total')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="km_total" id="input-km_total" type="number" step="0.01" value="{{ $tire->km_total }}"/>
                    </div>
                  </div>
                  
                  <div class="col-md-2">
                    <label class="col-form-label">{{__('tire.value')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="value" id="input-value" type="number" step="0.01" value="{{ $tire->value }}"/>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">{{__('tire.validate_date')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="validate_date" id="input-validate_date" 
                        type="text" value="{{\Carbon\Carbon::parse($tire->validate_date)->format(__('default.format_date'))}}"/>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">{{__('tire.purchase_date')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="purchase_date" id="input-purchase_date" 
                        type="text" value="{{\Carbon\Carbon::parse($tire->purchase_date)->format(__('default.format_date'))}}"/>
                    </div>
                  </div>                 

                </div>  

              @if($tire->vehicle_id)
                <div class="row">
                
                  <div class="col-md-3">
                    <label class="col-form-label">{{__('tire.vehicle_id')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="vehicle_id" id="input-vehicle_id" 
                        type="text" value="{{ $tire->vehicle->plate }}"/>
                    </div>
                  </div> 

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('tire.vehicle_spot')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="vehicle_spot" id="input-vehicle_spot" 
                        type="text" value="{{ $tire->spot_set }}"/>
                    </div>
                  </div>   

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('tire.change_date')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="change_date" id="input-change_date" 
                        type="text" value="{{\Carbon\Carbon::parse($tire->change_date)->format(__('default.format_date'))}}"/>
                    </div>
                  </div>    

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('tire.km_vehicle_change')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control text-center" 
                        required name="km_vehicle_change" id="input-km_vehicle_change" 
                        type="text" value="{{$tire->km_vehicle_change}}"/>
                    </div>
                  </div>               
                
                </div>

                <div class="row">
                
                  <div class="col-md-12">
                    <label class="col-form-label">{{__('tire.comment')}}</label>
                    <div class="form-group">
                      <input readonly class="form-control pl-1" 
                        required name="comment" id="input-comment" 
                        type="text" value="{{ $tire->comment }}"/>
                    </div>
                  </div> 
                
                </div>
              @endif

              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('tires')}}" class="btn btn-secondary">
                    {{__('default.btn_back')}}
                </a>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
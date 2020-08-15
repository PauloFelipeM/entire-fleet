@extends('layouts.app', ['activePage' => 'transits', 'title' => __('transit.title_pluralize')])

@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>    
        <li class="breadcrumb-item active"><a href="/transits">{{__('transit.title_pluralize')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('default.new')}}</li>
      </ol>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('/transits/store')}}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('default.new') }}</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  
                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.route')}}</label>
                    <div class="form-group{{ $errors->has('route_id') ? ' has-danger' : '' }}">                      
                      <select class="form-control{{ $errors->has('route_id') ? ' is-invalid' : '' }}" name="route_id" id="input-route_id" required>
                        <option value="">{{__('transit.select_a_route')}}</option>
                        @foreach($routes as $route)
                          @if (Input::old('route_id') == $route->id)
                            <option value="{{ $route->id }}" selected>{{ $route->title }}</option>
                          @else
                            <option value="{{ $route->id }}">{{ $route->title }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('route_id')
                      <span id="fuel-error" class="error text-danger" for="input-fuel">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.driver')}}</label>
                    <div class="form-group{{ $errors->has('driver_id') ? ' has-danger' : '' }}">                      
                      <select class="form-control{{ $errors->has('driver_id') ? ' is-invalid' : '' }}" name="driver_id" id="input-driver_id" required>
                        <option value="">{{__('transit.select_a_driver')}}</option>
                        @foreach($drivers as $driver)
                          @if (Input::old('driver_id') == $driver->id)
                            <option value="{{ $driver->id }}" selected>{{ $driver->name }}</option>
                          @else
                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('driver_id')
                      <span id="fuel-error" class="error text-danger" for="input-fuel">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.vehicle')}}</label>
                    <div class="form-group{{ $errors->has('vehicle_id') ? ' has-danger' : '' }}">                      
                      <select class="form-control{{ $errors->has('vehicle_id') ? ' is-invalid' : '' }}" name="vehicle_id" id="input-vehicle_id" required>
                        <option value="">{{__('transit.select_a_vehicle')}}</option>
                        @foreach($vehicles as $vehicle)
                          @if (Input::old('vehicle_id') == $vehicle->id)
                            <option value="{{ $vehicle->id }}" km_current="{{ $vehicle->km_current }}" selected>{{ $vehicle->plate }}</option>
                          @else
                            <option value="{{ $vehicle->id }}" km_current="{{ $vehicle->km_current }}">{{ $vehicle->plate }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('vehicle_id')
                      <span id="fuel-error" class="error text-danger" for="input-fuel">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.auxiliary')}}</label>
                    <div class="form-group{{ $errors->has('auxiliary') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('auxiliary') ? ' is-invalid' : '' }}" required 
                      name="auxiliary" id="input-auxiliary" type="text" value="{{ old('auxiliary') }}"/>
                      @error('auxiliary')
                        <span id="auxiliary-error" class="error text-danger" for="input-auxiliary">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                </div>

                <div class="row">
                
                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.km_leave')}}</label>
                    <div class="form-group{{ $errors->has('km_leave') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('km_leave') ? ' is-invalid' : '' }} pl-1" required 
                      name="km_leave" id="input-km_leave" type="number" readonly step="0.01" value="{{ old('km_leave') }}"/>
                      @error('km_leave')
                        <span id="km_leave-error" class="error text-danger" for="input-km_leave">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.km_arrival')}}</label>
                    <div class="form-group{{ $errors->has('km_arrival') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('km_arrival') ? ' is-invalid' : '' }}" required 
                      name="km_arrival" id="input-km_arrival" type="number" step="0.01" value="{{ old('km_arrival') }}"/>
                      @error('km_arrival')
                        <span id="km_arrival-error" class="error text-danger" for="input-km_arrival">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.km_total')}}</label>
                    <div class="form-group{{ $errors->has('km_total') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('km_total') ? ' is-invalid' : '' }} pl-1" required 
                      name="km_total" id="input-km_total" type="number" readonly step="0.01" value="{{ old('km_total') }}"/>
                      @error('km_total')
                        <span id="km_total-error" class="error text-danger" for="input-km_total">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.total_liters')}}</label>
                    <div class="form-group{{ $errors->has('total_liters') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('total_liters') ? ' is-invalid' : '' }}" required 
                      name="total_liters" id="input-total_liters" type="number" step="0.01" value="{{ old('total_liters') }}"/>
                      @error('total_liters')
                        <span id="total_liters-error" class="error text-danger" for="input-total_liters">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                </div>

                <div class="row">
                
                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.average_transit')}}</label>
                    <div class="form-group{{ $errors->has('average_transit') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('average_transit') ? ' is-invalid' : '' }} pl-1" required 
                      name="average_transit" readonly id="input-average_transit" type="number" step="0.01" value="{{ old('average_transit') }}"/>
                      @error('average_transit')
                        <span id="average_transit-error" class="error text-danger" for="input-average_transit">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>         

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.liter_value')}}</label>
                    <div class="form-group{{ $errors->has('liter_value') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('liter_value') ? ' is-invalid' : '' }}" required 
                      name="liter_value" id="input-liter_value" type="number" step="0.01" value="{{ old('liter_value') }}"/>
                      @error('liter_value')
                        <span id="liter_value-error" class="error text-danger" for="input-liter_value">{{ $message }}</span>
                      @enderror
                    </div>
                  </div> 

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.daily_value')}}</label>
                    <div class="form-group{{ $errors->has('daily_value') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('daily_value') ? ' is-invalid' : '' }}" required 
                      name="daily_value" id="input-daily_value" type="number" step="0.01" value="{{ old('daily_value') }}"/>
                      @error('daily_value')
                        <span id="daily_value-error" class="error text-danger" for="input-daily_value">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>      

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.discharge_value')}}</label>
                    <div class="form-group{{ $errors->has('discharge_value') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('discharge_value') ? ' is-invalid' : '' }}" required 
                      name="discharge_value" id="input-discharge_value" type="number" step="0.01" value="{{ old('discharge_value') }}"/>
                      @error('discharge_value')
                        <span id="discharge_value-error" class="error text-danger" for="input-discharge_value">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>                            

                </div>

                <div class="row">
                
                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.refrigeration_value')}}</label>
                    <div class="form-group{{ $errors->has('refrigeration_value') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('refrigeration_value') ? ' is-invalid' : '' }}" 
                      name="refrigeration_value" id="input-refrigeration_value" type="number" step="0.01" value="{{ old('refrigeration_value') }}"/>
                      @error('refrigeration_value')
                        <span id="refrigeration_value-error" class="error text-danger" for="input-refrigeration_value">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>   

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.expenses_diverse')}}</label>
                    <div class="form-group{{ $errors->has('expenses_diverse') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('expenses_diverse') ? ' is-invalid' : '' }}" 
                      name="expenses_diverse" id="input-expenses_diverse" type="number" step="0.01" value="{{ old('expenses_diverse') }}"/>
                      @error('expenses_diverse')
                        <span id="expenses_diverse-error" class="error text-danger" for="input-expenses_diverse">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>    

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.transit_cost')}}</label>
                    <div class="form-group{{ $errors->has('transit_cost') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('transit_cost') ? ' is-invalid' : '' }}" required 
                      name="transit_cost" id="input-transit_cost" type="number" step="0.01" value="{{ old('transit_cost') }}"/>
                      @error('transit_cost')
                        <span id="transit_cost-error" class="error text-danger" for="input-transit_cost">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.transit_expense')}}</label>
                    <div class="form-group{{ $errors->has('transit_expense') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('transit_expense') ? ' is-invalid' : '' }}" required 
                      name="transit_expense" id="input-transit_expense" type="number" step="0.01" value="{{ old('transit_expense') }}"/>
                      @error('transit_expense')
                        <span id="transit_expense-error" class="error text-danger" for="input-transit_expense">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>                                                                    
                
                </div>

                <div class="row">
                
                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.weight')}}</label>
                    <div class="form-group{{ $errors->has('weight') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" required 
                      name="weight" id="input-weight" type="number" step="0.01" value="{{ old('weight') }}"/>
                      @error('weight')
                        <span id="weight-error" class="error text-danger" for="input-weight">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>    

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.date_leave')}}</label>
                    <div class="form-group{{ $errors->has('date_leave') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('date_leave') ? ' is-invalid' : '' }}" required 
                      name="date_leave" id="input-date_leave" type="date" value="{{ old('date_leave') }}"/>
                      @error('date_leave')
                        <span id="date_leave-error" class="error text-danger" for="input-date_leave">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>  

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.date_arrival')}}</label>
                    <div class="form-group{{ $errors->has('date_arrival') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('date_arrival') ? ' is-invalid' : '' }}" required 
                      name="date_arrival" id="input-date_arrival" type="date" value="{{ old('date_arrival') }}"/>
                      @error('date_arrival')
                        <span id="date_arrival-error" class="error text-danger" for="input-date_arrival">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>                                    
                
                </div>

              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('transits')}}" class="btn btn-secondary">
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
$('#input-refrigeration_value').val(0);
$('#input-expenses_diverse').val(0);

$('#input-km_leave').on('change', function(){  
  check_km_arrival();
  calculate_km_total();
  calculate_average_transit();
})

$('#input-km_arrival').on('change', function(){
  check_km_arrival();
  calculate_km_total();
  calculate_average_transit();
})

$('#input-total_liters').on('change',function(){
  calculate_average_transit();
})

$('#input-vehicle_id').on('change',function(){
  km_current = $("#input-vehicle_id").find(':selected').attr('km_current');
  $('#input-km_leave').val(km_current);  
  calculate_km_total();
  calculate_average_transit();
})

$('#input-liter_value').on('change',function(event){
  value = event.target.value;
  if(value < 0){
    $('#input-liter_value').val(0);
  }
})

$('#input-daily_value').on('change',function(event){
  value = event.target.value;
  if(value < 0){
    $('#input-daily_value').val(0);
  }
})

$('#input-discharge_value').on('change',function(event){
  value = event.target.value;
  if(value < 0){
    $('#input-discharge_value').val(0);
  }
})

$('#input-refrigeration_value').on('change',function(event){
  value = event.target.value;
  if(value < 0 || !value){
    $('#input-refrigeration_value').val(0);
  }
})

$('#input-expenses_diverse').on('change',function(event){
  value = event.target.value;
  if(value < 0 || !value){
    $('#input-expenses_diverse').val(0);
  }
})

$('#input-transit_cost').on('change',function(event){
  value = event.target.value;
  if(value < 0){
    $('#input-transit_cost').val(0);
  }
})

$('#input-transit_expense').on('change',function(event){
  value = event.target.value;
  if(value < 0){
    $('#input-transit_expense').val(0);
  }
})

$('#input-weight').on('change',function(event){
  value = event.target.value;
  if(value < 0){
    $('#input-weight').val(0);
  }
})

function calculate_km_total(){
  km_leave = $('#input-km_leave').val();
  km_arrival = $('#input-km_arrival').val();

  if(km_leave && km_arrival){
    km_total = parseFloat(Math.round(km_arrival - km_leave)).toFixed(2);
    if(km_total < 0){
      $('#input-km_arrival').val('');
      $('#input-km_total').val('');
      Swal.fire(
        '{{__("messages.oops")}}',
        '{{__("messages.invalid_km")}}',
        'error');   
    }else{
      $('#input-km_total').val(km_total);   
    }
  }
}

function calculate_average_transit(){
  km_total = $('#input-km_total').val();
  total_liters = $('#input-total_liters').val();

  if(km_total && total_liters){
    average_transit = parseFloat(km_total / total_liters).toFixed(2);
    $('#input-average_transit').val(average_transit);
  }
}

function check_km_arrival(){
  km_leave = $('#input-km_leave').val();
  km_arrival = $('#input-km_arrival').val();

  if(km_leave && km_arrival){
    if(km_arrival <= km_leave){
      $('#input-km_arrival').val('');
      $('#input-km_total').val('');
      Swal.fire(
        '{{__("messages.oops")}}',
        '{{__("messages.invalid_km")}}',
        'error');
    }
  }
}
</script>
@endsection
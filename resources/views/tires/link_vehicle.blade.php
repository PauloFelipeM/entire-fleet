@extends('layouts.app', ['activePage' => 'tires', 'title' => __('tire.title_pluralize')])

@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>    
        <li class="breadcrumb-item active"><a href="/tires">{{__('tire.title_pluralize')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('default.new')}}</li>
      </ol>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('/tires/update_link/'.$tire_id)}}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('default.new') }}</h4>
              </div>
              <div class="card-body ">

                <div class="row">

                  <div class="col-md-4">
                    <label class="col-form-label">{{__('tire.vehicle_id')}}</label>
                    <div class="form-group{{ $errors->has('vehicle_id') ? ' has-danger' : '' }}">                      
                      <select class="form-control{{ $errors->has('vehicle_id') ? ' is-invalid' : '' }}" name="vehicle_id" id="input-vehicle_id" required>
                        <option value="">{{__('default.select_a_value')}}</option>
                        @foreach($vehicles as $vehicle)
                          @if (Input::old('vehicle_id') == $vehicle->id)
                            <option value="{{ $vehicle->id }}" selected>{{ $vehicle->plate }}</option>
                          @else
                            <option value="{{ $vehicle->id }}">{{ $vehicle->plate }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('vehicle_id')
                      <span id="fuel-error" class="error text-danger" for="input-fuel">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label class="col-form-label">{{__('tire.vehicle_spot')}}</label>
                    <div class="form-group{{ $errors->has('vehicle_spot') ? ' has-danger' : '' }}">                      
                      <select class="form-control{{ $errors->has('vehicle_spot') ? ' is-invalid' : '' }}" name="vehicle_spot" id="input-vehicle_spot" required>
                        <option value="">{{__('default.select_a_value')}}</option>
                        @foreach($vehicle_spots as $key => $vehicle_spot)
                          @if (Input::old('vehicle_spot') == $key)
                            <option value="{{ $key }}" selected>{{ $vehicle_spot }}</option>
                          @else
                            <option value="{{ $key }}">{{ $vehicle_spot }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('vehicle_spot')
                      <span id="vehicle_spot-error" class="error text-danger" for="input-vehicle_spot">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label class="col-form-label">{{__('tire.change_date')}}</label>
                    <div class="form-group{{ $errors->has('change_date') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('change_date') ? ' is-invalid' : '' }}" required
                        name="change_date" id="input-change_date" type="date" value="{{ old('change_date') }}"/>
                      @error('change_date')
                      <span id="change_date-error" class="error text-danger" for="input-change_date">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                </div>  

                <div class="row">
                
                  <div class="col-md-12">
                    <label class="col-form-label">{{__('tire.comment')}}</label>
                    <div class="form-group{{ $errors->has('comment') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}"
                        name="comment" id="input-comment" type="text" value="{{ old('comment') }}"/>
                      @error('comment')
                      <span id="comment-error" class="error text-danger" for="input-comment">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                
                </div>             

              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('tires')}}" class="btn btn-secondary">
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
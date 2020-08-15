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

                <div class="col-md-6">
                  <div class="map" id="map_routes" style="height:500px;"></div>    
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <label class="col-form-label">{{__('route.title')}}</label>
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }} pl-1" required
                      name="title" id="input-title" type="text" readonly value="{{ old('title', $route->title) }}"/>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label class="col-form-label">{{__('route.masterpoint_origin')}}</label>
                    <div class="form-group{{ $errors->has('masterpoint_origin') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('masterpoint_origin') ? ' is-invalid' : '' }} pl-1" required 
                      name="masterpoint_origin" id="input-masterpoint_origin" readonly type="text" value="{{ $route->masterPointOrigin->title }}"/>
                    </div>
                      <select hidden disabled name="masterpoint_origin_id" id="input-masterpoint_origin_id" required>                        
                        @foreach($masterPoints as $masterPoint)
                          @if ($route->masterpoint_origin_id == $masterPoint->id)
                            <option address="{{ $masterPoint->address }}" value="{{ $masterPoint->id }}" selected>{{ $masterPoint->title }}</option>
                          @endif
                        @endforeach
                      </select>             
                  </div>

                  <div class="col-md-12">
                    <label class="col-form-label">{{__('route.masterpoint_destination')}}</label>
                    <div class="form-group{{ $errors->has('masterpoint_destination') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('masterpoint_destination') ? ' is-invalid' : '' }} pl-1" required 
                      name="masterpoint_destination" id="input-masterpoint_destination" readonly type="text" value="{{ $route->masterPointDestination->title }}"/>
                    </div>
                      <select hidden disabled name="masterpoint_destination_id" id="input-masterpoint_destination_id" required>                        
                        @foreach($masterPoints as $masterPoint)
                          @if ($route->masterpoint_destination_id == $masterPoint->id)
                            <option address="{{ $masterPoint->address }}" value="{{ $masterPoint->id }}" selected>{{ $masterPoint->title }}</option>
                          @endif
                        @endforeach
                      </select>             
                  </div>

                  <div class="col-md-12">
                    <label class="col-form-label">{{__('route.distance')}}</label>
                    <div class="form-group{{ $errors->has('distance') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('distance') ? ' is-invalid' : '' }} pl-1" required 
                      name="distance" id="input-distance" readonly type="text" value="{{ $route->distance }}"/>
                    </div>
                  </div>
                </div>

                </div>  

              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('routes')}}" class="btn btn-secondary">
                    {{__('default.btn_back')}}
                </a>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
@extends('layouts.app', ['activePage' => 'routes', 'title' => __('route.title_pluralize'), 'cads' => true])

@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>    
        <li class="breadcrumb-item active"><a href="/routes">{{__('route.title_pluralize')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('default.update')}}</li>
      </ol>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('/routes/store/'.$route->id)}}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('default.update') }}</h4>
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
                      <input class="input-upper form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" required
                      name="title" id="input-title" type="text" value="{{ old('title', $route->title) }}"/>
                      @error('title')
                        <span id="title-error" class="error text-danger" for="input-title">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label class="col-form-label">{{__('route.masterpoint_origin')}}</label>
                    <div class="form-group{{ $errors->has('masterpoint_origin_id') ? ' has-danger' : '' }}">                      
                      <select class="form-control{{ $errors->has('masterpoint_origin_id') ? ' is-invalid' : '' }}" name="masterpoint_origin_id" id="input-masterpoint_origin_id" required>
                        <option value="">{{__('default.select_a_value')}}</option>
                        @foreach($masterPoints as $masterPoint)
                          @if ($route->masterpoint_origin_id == $masterPoint->id)
                            <option address="{{ $masterPoint->address }}" value="{{ $masterPoint->id }}" selected>{{ $masterPoint->title }}</option>
                          @else
                            <option address="{{ $masterPoint->address }}" value="{{ $masterPoint->id }}">{{ $masterPoint->title }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('masterpoint_origin_id')
                      <span id="fuel-error" class="error text-danger" for="input-fuel">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label class="col-form-label">{{__('route.masterpoint_destination')}}</label>
                    <div class="form-group{{ $errors->has('masterpoint_destination_id') ? ' has-danger' : '' }}">                      
                      <select class="form-control{{ $errors->has('masterpoint_destination_id') ? ' is-invalid' : '' }}" name="masterpoint_destination_id" id="input-masterpoint_destination_id" required>
                        <option value="">{{__('default.select_a_value')}}</option>
                        @foreach($masterPoints as $masterPoint)
                          @if ($route->masterpoint_destination_id == $masterPoint->id)
                            <option address="{{ $masterPoint->address }}" value="{{ $masterPoint->id }}" selected>{{ $masterPoint->title }}</option>
                          @else
                            <option address="{{ $masterPoint->address }}" value="{{ $masterPoint->id }}">{{ $masterPoint->title }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('masterpoint_destination_id')
                      <span id="fuel-error" class="error text-danger" for="input-fuel">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label class="col-form-label">{{__('route.distance')}}</label>
                    <div class="form-group{{ $errors->has('distance') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('distance') ? ' is-invalid' : '' }} pl-1" required 
                      name="distance" id="input-distance" readonly type="text" value="{{ old('distance', $route->distance) }}"/>
                      @error('distance')
                        <span id="distance-error" class="error text-danger" for="input-distance">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>

                </div>  

              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('routes')}}" class="btn btn-secondary">
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
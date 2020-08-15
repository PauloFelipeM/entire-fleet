@extends('layouts.app', ['activePage' => 'masterpoints', 'title' => __('masterpoint.title_pluralize'), 'cads' => true])

@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>    
        <li class="breadcrumb-item active"><a href="/masterpoints">{{__('masterpoint.title_pluralize')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('default.new')}}</li>
      </ol>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('/masterpoints/store')}}" autocomplete="off" class="form-horizontal">
            @csrf
            <input name="latitude" id="latitude" value="{{old('latitude')}}" type="hidden"/>
            <input name="longitude" id="longitude" value="{{old('longitude')}}" type="hidden"/>
            
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('default.new') }}</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  
                 <div class="col-md-8">
                    <input id="master_point_search" class="map_search_controls" type="text" placeholder="{{__('default.map_search_control')}}">                  
                    <div class="map" id="master_point_map" style="height:500px;"></div>                    
                 </div>

                 <div class="col-md-4">
                  <div class="row">
                  
                    <div class="col-md-12">
                      <label class="col-form-label">{{__('masterpoint.title')}}</label>
                      <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                        <input class="input-upper form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" required 
                        name="title" id="input-title" type="text" value="{{ old('title') }}"/>
                        @error('title')
                          <span id="title-error" class="error text-danger" for="input-title">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="col-md-12">
                      <label class="col-form-label">{{__('masterpoint.address')}}</label>
                      <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }} pl-1" required 
                        name="address" id="input-address" readonly type="text" value="{{ old('address') }}"/>
                        @error('address')
                          <span id="address-error" class="error text-danger" for="input-address">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                  </div>
                 </div>

                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('masterpoints')}}" class="btn btn-secondary">
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
@endsection
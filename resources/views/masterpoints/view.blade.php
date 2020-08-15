@extends('layouts.app', ['activePage' => 'masterpoints', 'title' => __('masterpoint.title_pluralize'), 'cads' => true])

@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>    
        <li class="breadcrumb-item active"><a href="/masterpoints">{{__('masterpoint.title_pluralize')}}</a></li>
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
                  
                  <div class="col-md-8">                     
                     <div class="map" id="masterPointMap" style="height:500px;"></div>                    
                  </div>
 
                  <div class="col-md-4">
                   <div class="row">
                   
                     <div class="col-md-12">
                       <label class="col-form-label">{{__('masterpoint.title')}}</label>
                       <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                         <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }} pt-1" required 
                         name="title" readonly id="input-title" type="text" value="{{ old('title', $masterPoint->title) }}"/>
                         @error('title')
                           <span id="title-error" class="error text-danger" for="input-title">{{ $message }}</span>
                         @enderror
                       </div>
                     </div>
 
                     <div class="col-md-12">
                       <label class="col-form-label">{{__('masterpoint.address')}}</label>
                       <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                         <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }} pl-1" required 
                         name="address" id="input-address" readonly type="text" value="{{ old('address', $masterPoint->address) }}"/>
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
              </div>
            </div>
        </div>
      </div>
    </div>
</div>

<script>
    var center_coords = {lat: {{$masterPoint->latitude}}, lng: {{$masterPoint->longitude}} };
    var map = new google.maps.Map(document.getElementById('masterPointMap'), {
      zoom: 17,
      center: center_coords
    });
    var markers = [];
    var marker = new google.maps.Marker({
      position: center_coords,
      map: map
    });
</script>
@endsection
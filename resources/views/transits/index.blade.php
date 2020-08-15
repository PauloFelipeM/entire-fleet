@extends('layouts.app', ['activePage' => 'transits', 'title' => __('transit.title_pluralize')])

@section('content')
<div class="content">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>          
      <li class="breadcrumb-item active" aria-current="page">{{__('transit.title_pluralize')}}</li>
    </ol>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
                <div class="col-md-1">
                  <h4 class="card-title ">{{ __('default.list') }}</h4>
                </div>
                <div class="col-md-9">
                    <a href="{{url('transits')}}" class="btn btn-white btn-round btn-just-icon" data-toggle="tooltip" data-placement="top" title="{{__('transit.clear_filter')}}">
                      <i class="material-icons">clear</i>
                      <div class="ripple-container"></div>
                    </a>
                    <button type="submit" title="{{__('transit.search_placeholder')}}" onclick="openSearch()" class="btn btn-white btn-round btn-just-icon">
                      <i class="material-icons">search</i>
                      <div class="ripple-container"></div>
                    </button>                     
                </div>
                <div class="col-md-2">
                  <div class="float-right">
                    <a href="{{url('/transits/create')}}" class="btn btn-primary">{{ __('default.btn_create') }}</a>  
                  </div>
                </div>
            </div>
            <div id="search-overlay" class="overlay">
                <div class="row">
                  <div class="col-md-12">
                    <h3 class="text-center">{{__('transit.filter_transit')}}</h3>
                    <span class="closebtn float-left" onclick="closeSearch()" title="{{__('transit.filter_close')}}">x</span>
                  </div>
                </div>
              <div class="overlay-content">
                <form action="/transits" method="GET">
                
                <div class="row mt-2">
                  <div class="col-md-12">
                  
                  <div class="row">
                  <div class="col-md-4">
                    <select class="search form-control" name="route_id">
                      <option value="">{{__('transit.search_by_route')}}</option>
                      @foreach($routes as $route)
                        @if (request()->route_id == $route->id)
                          <option value="{{ $route->id }}" selected>{{ $route->title }}</option>
                        @else
                          <option value="{{ $route->id }}">{{ $route->title }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <select class="search form-control" name="vehicle_id">
                      <option value="">{{__('transit.search_by_vehicle')}}</option>
                      @foreach($vehicles as $vehicle)
                        @if (request()->vehicle_id == $vehicle->id)
                          <option value="{{ $vehicle->id }}" selected>{{ $vehicle->plate }}</option>
                        @else
                          <option value="{{ $vehicle->id }}">{{ $vehicle->plate }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <select class="search form-control" name="driver_id">
                      <option value="">{{__('transit.search_by_driver')}}</option>
                      @foreach($drivers as $driver)
                        @if (request()->driver_id == $driver->id)
                          <option value="{{ $driver->id }}" selected>{{ $driver->name }}</option>
                        @else
                          <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="row mt-3">

                  <div class="col-md-4">
                    <label class="col-form-label" style="color:white">{{__('transit.date_leave')}}</label>
                    <div class="form-group">
                      <input class="search form-control" name="date_leave" id="input-date_leave" type="date" value="{{ request()->date_leave }}"/>
                    </div>
                  </div>  

                  <div class="col-md-4">
                    <label class="col-form-label" style="color:white">{{__('transit.date_arrival')}}</label>
                    <div class="search form-group">
                      <input class="search form-control" name="date_arrival" id="input-date_arrival" type="date" value="{{ request()->date_arrival }}"/>
                    </div>
                  </div>

                </div>  

                <div class="row mt-3">
                  <div class="col-md-12">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button> 
                  </div>
                </div>  

                  </div>
                </div>

                </form>
              </div>
            </div>
          </div>
          <div class="card-body">
          @if(count($transits)==0)
            <div class="alert alert-secondary text-center" style="font-size:18px">{{__('default.data_not_found')}}</div>
          @else
            <div class="table-responsive">
              <table class="table table-responsive">
                <thead class=" text-primary">
                  <tr>                    
                    <th class="text-center" style="width: 80px;">{{Index::orderByLink('id', '#')}}</th>
                    <th>{{__('transit.route')}}</th>
                    <th>{{__('transit.vehicle')}}</th>
                    <th>{{__('transit.driver')}}</th>
                    <th>{{__('transit.km_leave')}}</th>
                    <th>{{__('transit.km_arrival')}}</th>
                    <th>{{__('transit.km_total')}}</th>
                    <th>{{__('transit.total_liters')}}</th>
                    <th>{{__('transit.average_transit')}}</th>
                    <th>{{__('transit.liter_value')}}</th>
                    <th class="d-none d-sm-table-cell">{{__('transit.date_leave')}}</th>
                    <th>{{__('transit.date_arrival')}}</th>
                    <th class="d-none d-sm-table-cell">{{ __('default.created_at') }}</th>
                    <!-- <th>{{ __('default.updated_at') }}</th> -->
                    <th width="1%"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($transits as $transit)
                  <tr>
                      <td class="text-center">{{ $transit->id }}</td> 
                      <td><a href="routes/view/{{$transit->route_id}}">{{$transit->route->title}}</a></td>
                      <td><a href="vehicles/view/{{$transit->vehicle_id}}">{{$transit->vehicle->plate}}</a></td>
                      <td><a href="drivers/view/{{$transit->driver_id}}">{{$transit->driver->name}}</a></td>
                      <td>{{$transit->km_leave}}</td>
                      <td>{{$transit->km_arrival}}</td>
                      <td>{{$transit->km_total}}</td>
                      <td>{{$transit->total_liters}}</td>
                      <td>{{$transit->average_transit}}</td>
                      <td>{{$transit->liter_value}}</td>
                      <td class="d-none d-sm-table-cell">
                          {{\Carbon\Carbon::parse($transit->date_leave)->format(__('default.format_date'))}}
                      </td>
                      <td>
                          {{\Carbon\Carbon::parse($transit->date_arrival)->format(__('default.format_date'))}}
                      </td>
                      <td class="d-none d-sm-table-cell">
                          {{\Carbon\Carbon::parse($vehicle->created_at)->format(__('default.format_date'))}}
                      </td>
                      <!-- <td>
                          {{\Carbon\Carbon::parse($vehicle->updated_at)->format(__('default.format_date'))}}
                      </td> -->
                      <td nowrap>
                          <a href="{{url('/transits/view/'.$transit->id)}}" class="btn btn-outline-secundary"
                              data-toggle="tooltip" data-placement="top" title="{{__('default.details')}}"><i class="fa fa-eye"></i></a>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$transits->appends(Input::except('page'))->links('includes.pagination')}}
            </div>
          @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
.search.form-control {
  color: white;
}
.search.form-control:focus {
  color: white;
}
.search.form-control option {
  color: black;
}

.overlay {
  height: 50%;
  width: 76%;
  display: none;
  position: fixed;  
  z-index: 1;
  top: 20%;
  left: 12%;
  background-color: rgb(0,0,0);
  background-color: rgba(39, 35, 87, 0.9);
}

.overlay-content {
  position: relative;
  top: 3%;
  width: 80%;
  text-align: center;
  margin-top: 30px;
  margin: auto;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 22px;
  font-size: 40px;
  cursor: pointer;
  color: white;
}

.overlay .closebtn:hover {
  color: #ccc;
}

.overlay input[type=text] {
  padding: 15px;
  font-size: 17px;
  border: none;
  float: left;
  width: 80%;
  background: white;
}

.overlay input[type=text]:hover {
  background: #f1f1f1;
}

.overlay button {
  width: 20%;
  padding: 15px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.overlay button:hover {
  background: #bbb;
}

@media (max-width: 780px){
  .overlay {
    height: 82%;
    top: 15%;
  }
  .overlay button {
    width: 0;
    padding: 0;
  }
}
</style>

<script>
function openSearch() {  
  $("#search-overlay").fadeIn("slow");
}

function closeSearch() {  
  $("#search-overlay").fadeOut("slow");
}
</script>
@endsection

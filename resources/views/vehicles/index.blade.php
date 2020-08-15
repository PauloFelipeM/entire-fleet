@extends('layouts.app', ['activePage' => 'vehicles', 'title' => __('vehicle.title_pluralize'), 'cads' => true])

@section('content')
<div class="content">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>          
      <li class="breadcrumb-item active" aria-current="page">{{__('vehicle.title_pluralize')}}</li>
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
                <div class="col-md-3">
                <form action="/vehicles" method="GET">
                @csrf
                  <div class="input-group no-border">
                      <input type="text" value="{{request()->search}}" id="page-header-search-input" name="search" class="form-control" placeholder="{{__('vehicle.search_placeholder')}}">
                      <a href="{{url('vehicles')}}" class="btn btn-white btn-round btn-just-icon ml-1 mr-1" data-toggle="tooltip" data-placement="top" title="{{__('transit.clear_filter')}}">
                        <i class="material-icons">clear</i>
                        <div class="ripple-container"></div>
                      </a>                      
                      <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                      </button>
                      </div>
                  </div>
                </form>
                <div class="col-md-8">
                  <div class="float-right">
                    <a href="{{url('/vehicles/create')}}" class="btn btn-primary">{{ __('default.btn_create') }}</a>    
                    <a href="{{url('/vehicles/trash')}}" title="{{__('default.btn_trash')}}" class="btn m-btn btn-secondary">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </div>
                </div>
            </div>
          </div>
          <div class="card-body">
          @if(count($vehicles)==0)
            <div class="alert alert-secondary text-center" style="font-size:18px">{{__('default.data_not_found')}}</div>
          @else
            <div class="table-responsive">
              <table class="table table-responsive">
                <thead class=" text-primary">
                  <tr>                    
                    <th class="text-center" style="width: 80px;">{{Index::orderByLink('id', '#')}}</th>
                    <th>{{Index::orderByLink('plate', __('vehicle.plate'))}}</th>
                    <th>{{__('vehicle.document')}}</th>
                    <th>{{__('vehicle.fuel')}}</th>
                    <th>{{__('vehicle.brand_id')}}</th>
                    <th>{{__('vehicle.vehicle_type_id')}}</th>
                    <th>{{__('vehicle.km_current')}}</th>
                    <th class="d-none d-sm-table-cell">{{ __('default.created_at') }}</th>
                    <th>{{ __('default.updated_at') }}</th>
                    <th width="1%"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($vehicles as $vehicle)
                  <tr>
                      <td class="text-center">{{ $vehicle->id }}</td>
                      <td class="font-w600">
                          <a href="{{url('/vehicles/view/'.$vehicle->id)}}">{{ $vehicle->plate }}</a>
                      </td>
                      <td>{{ $vehicle->document }}</td>
                      <td>{{ $vehicle->fuel_name }}</td>
                      <td>{{ $vehicle->brand->title }}</td>
                      <td>{{ $vehicle->vehicletype->title }}</td>
                      <td>{{ $vehicle->km_current }}</td>
                      <td class="d-none d-sm-table-cell">
                          {{\Carbon\Carbon::parse($vehicle->created_at)->format(__('default.format_date'))}}
                      </td>
                      <td>
                          {{\Carbon\Carbon::parse($vehicle->updated_at)->format(__('default.format_date'))}}
                      </td>
                      <td nowrap>
                          <a href="{{url('/vehicles/update/'.$vehicle->id)}}" class="btn btn-outline-secundary"
                              data-toggle="tooltip" data-placement="top" title="{{__('default.update')}}"><i class="fa fa-edit"></i></a>
                          <a href="javascript:modelDelete('{{$vehicle->id}}', '{{$vehicle->plate}}')" class="btn btn-danger"
                              data-toggle="tooltip" data-placement="top" title="{{__('default.btn_delete')}}"><i class="fa fa-remove"></i></a>                          
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$vehicles->appends(Input::except('page'))->links('includes.pagination')}}
            </div>
          @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
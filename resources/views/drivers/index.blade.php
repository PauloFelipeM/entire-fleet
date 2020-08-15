@extends('layouts.app', ['activePage' => 'drivers', 'title' => __('driver.title_pluralize'), 'cads' => true])

@section('content')
<div class="content">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>          
      <li class="breadcrumb-item active" aria-current="page">{{__('driver.title_pluralize')}}</li>
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
                <form action="/drivers" method="GET">
                @csrf
                  <div class="input-group no-border">
                      <input type="text" value="{{request()->search}}" id="page-header-search-input" name="search" class="form-control" placeholder="{{__('driver.search_placeholder')}}">
                      <a href="{{url('drivers')}}" class="btn btn-white btn-round btn-just-icon ml-1 mr-1" data-toggle="tooltip" data-placement="top" title="{{__('transit.clear_filter')}}">
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
                    <a href="{{url('/drivers/create')}}" class="btn btn-primary">{{ __('default.btn_create') }}</a>    
                    <a href="{{url('/drivers/trash')}}" title="{{__('default.btn_trash')}}" class="btn m-btn btn-secondary">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </div> 
                </div>
            </div>
          </div>
          <div class="card-body">
          @if(count($drivers)==0)
            <div class="alert alert-secondary text-center" style="font-size:18px">{{__('default.data_not_found')}}</div>
          @else
            <div class="table-responsive">
              <table class="table table-responsive">
                <thead class=" text-primary">
                  <tr>                    
                    <th class="text-center" style="width: 80px;">{{Index::orderByLink('id', '#')}}</th>
                    <th>{{Index::orderByLink('name', __('driver.name'))}}</th>
                    <th>{{__('driver.email')}}</th>
                    <th>{{__('driver.social_security')}}</th>
                    <th>{{__('driver.phone')}}</th>
                    <th>{{__('driver.driver_license')}}</th>
                    <th>{{__('driver.driver_license_category')}}</th>
                    <th>{{__('driver.driver_license_expiration')}}</th>
                    <th class="d-none d-sm-table-cell">{{ __('default.created_at') }}</th>
                    <th>{{ __('default.updated_at') }}</th>
                    <th width="1%"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($drivers as $driver)
                  <tr>
                      <td class="text-center">{{ $driver->id }}</td>
                      <td class="font-w600">
                          <a href="{{url('/drivers/view/'.$driver->id)}}">{{ $driver->name }}</a>
                      </td>
                      <td>{{ $driver->email }}</td>
                      <td>{{ $driver->social_security }}</td>
                      <td>{{ $driver->phone }}</td>
                      <td>{{ $driver->driver_license }}</td>
                      <td class="text-center">{{ $driver->license_category_name }}</td>
                      <td>
                        {{\Carbon\Carbon::parse($driver->driver_license_expiration)->format(__('default.format_date'))}}
                      </td>
                      <td class="d-none d-sm-table-cell">
                          {{\Carbon\Carbon::parse($driver->created_at)->format(__('default.format_date'))}}
                      </td>
                      <td>
                          {{\Carbon\Carbon::parse($driver->updated_at)->format(__('default.format_date'))}}
                      </td>
                      <td nowrap>
                          <a href="{{url('/drivers/update/'.$driver->id)}}" class="btn btn-outline-secundary"
                              data-toggle="tooltip" data-placement="top" title="{{__('default.update')}}"><i class="fa fa-edit"></i></a>
                          <a href="javascript:modelDelete('{{$driver->id}}', '{{$driver->name}}')" class="btn btn-danger"
                              data-toggle="tooltip" data-placement="top" title="{{__('default.btn_delete')}}"><i class="fa fa-remove"></i></a>                          
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$drivers->appends(Input::except('page'))->links('includes.pagination')}}
            </div>
          @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
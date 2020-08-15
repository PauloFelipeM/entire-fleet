@extends('layouts.app', ['activePage' => 'vehicletypes', 'title' => __('vehicletype.title_pluralize'), 'cads' => true])

@section('content')
<div class="content">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>          
      <li class="breadcrumb-item"><a href="/vehicletypes">{{__('vehicletype.title_pluralize')}}</i></a></li>  
      <li class="breadcrumb-item active" aria-current="page">{{__('default.trash')}}</li>
    </ol>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
                <div class="col-md-1">
                  <h4 class="card-title ">{{ __('default.list_trashed') }}</h4>
                </div>
                <div class="col-md-3">
                <form action="/vehicletypes/trash" method="GET">
                @csrf
                  <div class="input-group no-border">
                      <input type="text" value="{{request()->search}}" id="page-header-search-input" name="search" class="form-control" placeholder="{{__('vehicletype.search_placeholder')}}">
                      <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                      </button>
                      </div>
                </form>
                </div>
                <div class="col-md-8">
                    <a href="{{url('/vehicletypes/')}}" class="btn btn-primary float-right">{{ __('default.btn_back') }}</a>    
                </div>
            </div>
          </div>
          <div class="card-body">
          @if(count($vehicletypes)==0)
            <div class="alert alert-secondary text-center" style="font-size:18px">{{__('default.data_not_found')}}</div>
          @else
            <div class="table-responsive">
              <table class="table table-responsive">
                <thead class=" text-primary">
                  <tr>                    
                    <th class="text-center" style="width: 80px;">{{Index::orderByLink('id', '#')}}</th>
                    <th>{{Index::orderByLink('title', __('vehicletype.title'))}}</th>

                    <th class="d-none d-sm-table-cell">{{ __('default.created_at') }}</th>
                    <th>{{ __('default.updated_at') }}</th>
                    <th>{{ __('default.deleted_at') }}</th>
                    <th width="1%"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($vehicletypes as $vehicletype)
                  <tr>
                      <td class="text-center">{{ $vehicletype->id }}</td>
                      <td class="font-w600">
                          {{ $vehicletype->title }}
                      </td>
                      <td class="d-none d-sm-table-cell">
                          {{\Carbon\Carbon::parse($vehicletype->created_at)->format(__('default.format_date'))}}
                      </td>
                      <td>
                          {{\Carbon\Carbon::parse($vehicletype->updated_at)->format(__('default.format_date'))}}
                      </td>
                      <td>
                          {{\Carbon\Carbon::parse($vehicletype->deleted_at)->format(__('default.format_date'))}}
                      </td>
                      <td nowrap>
                          <a href="javascript:modelRestore('{{$vehicletype->id}}', '{{$vehicletype->title}}')" class="btn btn-outline-secundary"
                              data-toggle="tooltip" data-placement="top" title="{{__('default.btn_restore')}}"><i class="fas fa-trash-restore"></i></a>                        
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$vehicletypes->appends(Input::except('page'))->links('includes.pagination')}}
            </div>
          @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
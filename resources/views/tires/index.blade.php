@extends('layouts.app', ['activePage' => 'tires', 'title' => __('tire.title_pluralize')])

@section('content')
<div class="content">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>          
      <li class="breadcrumb-item active" aria-current="page">{{__('tire.title_pluralize')}}</li>
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
                <form action="/tires" method="GET">
                @csrf
                  <div class="input-group no-border">
                      <input type="text" value="{{request()->search}}" id="page-header-search-input" name="search" class="form-control" placeholder="{{__('tire.search_placeholder')}}">
                      <a href="{{url('tires')}}" class="btn btn-white btn-round btn-just-icon ml-1 mr-1" data-toggle="tooltip" data-placement="top" title="{{__('transit.clear_filter')}}">
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
                    <a href="{{url('/tires/create')}}" class="btn btn-primary">{{ __('default.btn_create') }}</a>
                  </div>
                </div>
            </div>
          </div>
          <div class="card-body">
          @if(count($tires)==0)
            <div class="alert alert-secondary text-center" style="font-size:18px">{{__('default.data_not_found')}}</div>
          @else
            <div class="table-responsive">
              <table class="table table-responsive">
                <thead class=" text-primary">
                  <tr>                    
                    <th class="text-center" style="width: 80px;">{{Index::orderByLink('id', '#')}}</th>
                    <th>{{Index::orderByLink('serie_number', __('tire.serie_number'))}}</th>
                    <th>{{__('tire.provider_id')}}</th>
                    <th>{{__('tire.km_total')}}</th>
                    <th>{{__('tire.value')}}</th>
                    <th>{{__('tire.status')}}</th>
                    <th>{{__('tire.validate_date')}}</th>
                    <th>{{__('tire.purchase_date')}}</th>
                    <th class="d-none d-sm-table-cell">{{ __('default.created_at') }}</th>
                    <th width="1%"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($tires as $tire)
                  <tr>
                      <td class="text-center">{{ $tire->id }}</td>
                      <td class="font-w600">
                        <a href="{{url('/tires/view/'.$tire->id)}}">{{ $tire->serie_number }}</a>
                      </td>
                      <td>
                        <a href="{{url('providers/view/'.$tire->provider->id)}}">{{ $tire->provider->name }}</a>
                      </td>
                      <td>{{ $tire->km_total }}</td>
                      <td>{{ $tire->value }}</td>
                      <td>
                        {{ $tire->status }}
                        <div>
                          <small>
                            @if($tire->vehicle_id)
                              {{__('tire.vehicle_id')}}: <a href="{{url('vehicles/view/'.$tire->vehicle->id)}}">{{ $tire->vehicle->plate }}</a>
                            @endif                        
                          </small>
                        </div>
                        <div>
                          <small>@if($tire->vehicle_spot) {{__('tire.vehicle_spot')}}: {{ $tire->spot_set }}@endif</small>
                        </div>                        
                        <div>
                          <small>
                            @if($tire->change_date)
                              {{__('tire.change_date')}}: {{\Carbon\Carbon::parse($tire->change_date)->format(__('default.format_date'))}}
                            @endif
                          </small> 
                        </div>                 
                      </td>                      
                      <td>
                          {{\Carbon\Carbon::parse($tire->validate_date)->format(__('default.format_date'))}}
                      </td>
                      <td>
                          {{\Carbon\Carbon::parse($tire->purchase_date)->format(__('default.format_date'))}}
                      </td>
                      <td class="d-none d-sm-table-cell">
                          {{\Carbon\Carbon::parse($tire->created_at)->format(__('default.format_date'))}}
                      </td>
                      <td nowrap>
                        @if($tire->vehicle_id)
                          <a href="javascript:unlinkVehicle('{{$tire->id}}', '{{$tire->plate}}')" class="btn btn-warning"
                              data-toggle="tooltip" data-placement="top" title="{{__('default.btn_unlink_vehicle')}}"><i class="fa fa-unlink"></i></a> 
                        @else
                          <a href="{{url('/tires/link/'.$tire->id)}}" class="btn btn-primary"
                              data-toggle="tooltip" data-placement="top" title="{{__('default.btn_link_vehicle')}}"><i class="fa fa-link"></i></a>
                        @endif
                          <a href="{{url('/tires/update/'.$tire->id)}}" class="btn btn-outline-secundary"
                              data-toggle="tooltip" data-placement="top" title="{{__('default.update')}}"><i class="fa fa-edit"></i></a>
                          <a href="javascript:modelDelete('{{$tire->id}}', '{{$tire->plate}}')" class="btn btn-danger"
                              data-toggle="tooltip" data-placement="top" title="{{__('default.btn_delete')}}"><i class="fa fa-remove"></i></a>                                                  
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$tires->appends(Input::except('page'))->links('includes.pagination')}}
            </div>
          @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function unlinkVehicle(id, title){   
    Swal.fire({
      title: '{{__("messages.unlink")}}',
      text: '{{__("messages.confirm_unlink")}} '+title+'?',
      type: "warning",
      buttons: true,
      dangerMode: true,
      confirmButtonText: '{{__("messages.confirm")}}',
      cancelButtonText: '{{__("messages.cancel")}}',      
      showCancelButton: true,
      reverseButtons: true
    }).then((result) =>{
        if(result.value){
          $.ajax({                
            url: window.location.origin + window.location.pathname + '/unlink/' + id,
            type: "GET",
            success: function(){
              Swal.fire({
                title: '{{__("messages.unlinked")}}', 
                text: '{{__("messages.success_unlink")}}', 
                type: "success"
                }).then(() => {
                    document.location.reload(true);
                });
            },
            error: function(error){              
              Swal.fire(
                '{{__("messages.oops")}}',
                '{{__("messages.error_unlink")}}',
                'error');
            },
          });
        }
    });
}
</script>
@endsection
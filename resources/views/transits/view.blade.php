@extends('layouts.app', ['activePage' => 'transits', 'title' => __('transit.title_pluralize')])

@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>    
        <li class="breadcrumb-item active"><a href="/transits">{{__('transit.title_pluralize')}}</a></li>
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
                  
                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.route')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="route" id="input-route" type="text" value="{{ $transit->route->title }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.vehicle')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="vehicle" id="input-vehicle" type="text" value="{{ $transit->vehicle->plate }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.driver')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="driver" id="input-driver" type="text" value="{{ $transit->driver->name }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.auxiliary')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="auxiliary" id="input-auxiliary" type="text" value="{{ $transit->auxiliary }}"/>
                    </div>
                  </div>

                </div>

                <div class="row">
                
                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.km_leave')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="km_leave" id="input-km_leave" type="text" value="{{ $transit->km_leave }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.km_arrival')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="km_arrival" id="input-km_arrival" type="text" value="{{ $transit->km_arrival }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.km_total')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="km_total" id="input-km_total" type="text" value="{{ $transit->km_total }}"/>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.total_liters')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="total_liters" id="input-total_liters" type="text" value="{{ $transit->total_liters }}"/>
                    </div>
                  </div>

                </div>

                <div class="row">
                
                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.average_transit')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="average_transit" id="input-average_transit" type="text" value="{{ $transit->average_transit }}"/>
                    </div>
                  </div>       

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.liter_value')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="liter_value" id="input-liter_value" type="text" value="{{ $transit->liter_value }}"/>
                    </div>
                  </div> 

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.daily_value')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="daily_value" id="input-daily_value" type="text" value="{{ $transit->daily_value }}"/>
                    </div>
                  </div>    

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.discharge_value')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="discharge_value" id="input-discharge_value" type="text" value="{{ $transit->discharge_value }}"/>
                    </div>
                  </div>                               

                </div>

                <div class="row">
                
                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.refrigeration_value')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="refrigeration_value" id="input-refrigeration_value" type="text" value="{{ $transit->refrigeration_value }}"/>
                    </div>
                  </div>      

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.expenses_diverse')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="expenses_diverse" id="input-expenses_diverse" type="text" value="{{ $transit->expenses_diverse }}"/>
                    </div>
                  </div>     

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.transit_cost')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="transit_cost" id="input-transit_cost" type="text" value="{{ $transit->transit_cost }}"/>
                    </div>
                  </div>     

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.transit_expense')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="transit_expense" id="input-transit_expense" type="text" value="{{ $transit->transit_expense }}"/>
                    </div>
                  </div>                                                                     
                
                </div>

                <div class="row">
                
                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.weight')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="weight" id="input-weight" type="text" value="{{ $transit->weight }}"/>
                    </div>
                  </div>    

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.date_leave')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="date_leave" id="input-date_leave" type="text" value="{{\Carbon\Carbon::parse($transit->date_leave)->format(__('default.format_date'))}}"/>
                    </div>
                  </div> 

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('transit.date_arrival')}}</label>
                    <div class="form-group">
                      <input class="form-control text-center" readonly
                        name="date_arrival" id="input-date_arrival" type="text" value="{{\Carbon\Carbon::parse($transit->date_arrival)->format(__('default.format_date'))}}"/>
                    </div>
                  </div>                                     
                
                </div>

              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('transits')}}" class="btn btn-secondary">
                    {{__('default.btn_back')}}
                </a>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
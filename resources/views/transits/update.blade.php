@extends('layouts.app', ['activePage' => 'transits', 'title' => __('transit.title_pluralize')])

@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>    
        <li class="breadcrumb-item active"><a href="/transits">{{__('transit.title_pluralize')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('default.update')}}</li>
      </ol>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('/transits/store/'.$transit->id)}}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('default.update') }}</h4>
              </div>
              <div class="card-body ">


              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('transits')}}" class="btn btn-secondary">
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
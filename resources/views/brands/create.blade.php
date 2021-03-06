@extends('layouts.app', ['activePage' => 'brands', 'title' => __('brand.title_pluralize'), 'cads' => true])

@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>    
        <li class="breadcrumb-item active"><a href="/brands">{{__('brand.title_pluralize')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('default.new')}}</li>
      </ol>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('/brands/store')}}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('default.new') }}</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  <label class="col-sm-1 col-form-label">{{__('brand.title')}}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="input-upper form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" required name="title" id="input-title" type="text" value="{{ old('title') }}"/>
                      @error('title')
                        <span id="title-error" class="error text-danger" for="input-title">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('brands')}}" class="btn btn-secondary">
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
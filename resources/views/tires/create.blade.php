@extends('layouts.app', ['activePage' => 'tires', 'title' => __('tire.title_pluralize')])

@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="fas fa-tachometer-alt"></i></a></li>    
        <li class="breadcrumb-item active"><a href="/tires">{{__('tire.title_pluralize')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('default.new')}}</li>
      </ol>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('/tires/store')}}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('default.new') }}</h4>
              </div>
              <div class="card-body ">

                <div class="row">

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('tire.serie_number')}}</label>
                    <div class="form-group{{ $errors->has('serie_number') ? ' has-danger' : '' }}">
                      <input class="input-upper form-control{{ $errors->has('serie_number') ? ' is-invalid' : '' }}" required
                        name="serie_number" id="input-serie_number" type="text" value="{{ old('serie_number') }}"/>
                      @error('serie_number')
                      <span id="serie_number-error" class="error text-danger" for="input-serie_number">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('tire.brand')}}</label>
                    <div class="form-group{{ $errors->has('brand') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}" 
                        required name="brand" id="input-brand" type="text" value="{{ old('brand') }}"/>
                      @error('brand')
                        <span id="brand-error" class="error text-danger" for="input-brand">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('tire.dimension')}}</label>
                    <div class="form-group{{ $errors->has('dimension') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('dimension') ? ' is-invalid' : '' }}" required
                        name="dimension" id="input-dimension" type="text" value="{{ old('dimension') }}"/>
                      @error('dimension')
                      <span id="dimension-error" class="error text-danger" for="input-dimension">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label class="col-form-label">{{__('tire.note_number')}}</label>
                    <div class="form-group{{ $errors->has('note_number') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('note_number') ? ' is-invalid' : '' }}" required
                        name="note_number" id="input-note_number" type="text" value="{{ old('note_number') }}"/>
                      @error('note_number')
                      <span id="note_number-error" class="error text-danger" for="input-note_number">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-4">
                    <label class="col-form-label">{{__('tire.provider_id')}}</label>
                    <div class="form-group{{ $errors->has('provider_id') ? ' has-danger' : '' }}">                      
                      <select class="form-control{{ $errors->has('provider_id') ? ' is-invalid' : '' }}" name="provider_id" id="input-provider_id" required>
                        <option value="">{{__('default.select_a_value')}}</option>
                        @foreach($providers as $provider)
                          @if (Input::old('provider_id') == $provider->id)
                            <option value="{{ $provider->id }}" selected>{{ $provider->name }}</option>
                          @else
                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('provider_id')
                      <span id="fuel-error" class="error text-danger" for="input-fuel">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">{{__('tire.km_total')}}</label>
                    <div class="form-group{{ $errors->has('km_total') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('km_total') ? ' is-invalid' : '' }}" 
                        required name="km_total" id="input-km_total" type="number" step="0.01" value="{{ old('km_total') }}"/>
                      @error('km_total')
                        <span id="km_total-error" class="error text-danger" for="input-km_total">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">{{__('tire.value')}}</label>
                    <div class="form-group{{ $errors->has('value') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}" 
                        required name="value" min="4" id="input-value" type="number" step="0.01" value="{{ old('value') }}"/>
                      @error('value')
                        <span id="value-error" class="error text-danger" for="input-value">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">{{__('tire.validate_date')}}</label>
                    <div class="form-group{{ $errors->has('validate_date') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('validate_date') ? ' is-invalid' : '' }}" 
                        required name="validate_date" id="input-validate_date" type="date" value="{{ old('validate_date') }}"/>
                      @error('validate_date')
                      <span id="validate_date-error" class="error text-danger" for="input-validate_date">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>    

                  <div class="col-md-2">
                    <label class="col-form-label">{{__('tire.purchase_date')}}</label>
                    <div class="form-group{{ $errors->has('purchase_date') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('purchase_date') ? ' is-invalid' : '' }}" 
                        required name="purchase_date" id="input-purchase_date" type="date" value="{{ old('purchase_date') }}"/>
                      @error('purchase_date')
                      <span id="purchase_date-error" class="error text-danger" for="input-purchase_date">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>               

                </div>                

              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('tires')}}" class="btn btn-secondary">
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
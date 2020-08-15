<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-3.jpg">
  <div class="logo">
    <a href="{{ url('/') }}" class="simple-text logo-normal">
      {{ __('default.title_web') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/home') }}">
          <i class="material-icons">dashboard</i>
          <p>{{ __('navbar.dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'transits' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/transits') }}">
          <i class="material-icons">directions_car</i>
          <p>{{ __('transit.title_pluralize') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'tires' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/tires') }}">
          <i class="material-icons">album</i>
          <p>{{ __('tire.title_pluralize') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#cads" aria-expanded="false">
          <i class="material-icons">library_books</i>
          <p>{{ __('navbar.cads') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="cads">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'brands' ? ' active' : '' }}">
              <a class="nav-link" href="{{url('brands')}}">
                <span class="sidebar-mini"> {{__('brand.mini')}} </span>
                <span class="sidebar-normal">{{ __('brand.title_pluralize') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'vehicletypes' ? ' active' : '' }}">
              <a class="nav-link" href="{{url('vehicletypes')}}">
                <span class="sidebar-mini"> {{__('vehicletype.mini')}} </span>
                <span class="sidebar-normal">{{ __('vehicletype.title_pluralize') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'vehicles' ? ' active' : '' }}">
              <a class="nav-link" href="{{url('vehicles')}}">
                <span class="sidebar-mini"> {{__('vehicle.mini')}} </span>
                <span class="sidebar-normal">{{ __('vehicle.title_pluralize') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'drivers' ? ' active' : '' }}">
              <a class="nav-link" href="{{url('drivers')}}">
                <span class="sidebar-mini"> {{__('driver.mini')}} </span>
                <span class="sidebar-normal">{{ __('driver.title_pluralize') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'masterpoints' ? ' active' : '' }}">
              <a class="nav-link" href="{{url('masterpoints')}}">
                <span class="sidebar-mini"> {{__('masterpoint.mini')}} </span>
                <span class="sidebar-normal">{{ __('masterpoint.title_pluralize') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'routes' ? ' active' : '' }}">
              <a class="nav-link" href="{{url('routes')}}">
                <span class="sidebar-mini"> {{__('route.mini')}} </span>
                <span class="sidebar-normal">{{ __('route.title_pluralize') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'providers' ? ' active' : '' }}">
              <a class="nav-link" href="{{url('providers')}}">
                <span class="sidebar-mini"> {{__('provider.mini')}} </span>
                <span class="sidebar-normal">{{ __('provider.title_pluralize') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>

@isset($cads)
<script>
  $('#cads').addClass('show');
</script>
@endisset
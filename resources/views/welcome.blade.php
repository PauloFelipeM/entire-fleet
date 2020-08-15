@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'welcome', 'title' => 'Entire Fleet'])

@auth

<script type="text/javascript">
    window.location = "{{ url('home') }}";
</script>

@else

@section('content')
<div class="container mt-5" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <h1 class="text-white text-center">{{ __('default.welcome') }}</h1>
      </div>
  </div>
</div>
@endsection

@endauth
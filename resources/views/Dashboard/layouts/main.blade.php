@extends('layouts.app')

@section('content')


@include('Dashboard.layouts.header')
<div class="container-fluid">
  <div class="row">
   @include('Dashboard.layouts.sidebar')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('container')
    </main>
  </div>
</div>

    
@endsection

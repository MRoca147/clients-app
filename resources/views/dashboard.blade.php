@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
          <div>
            <img src="{{asset('images/serempre.png')}}" alt="Serempre" class="p-1" style="width: 90%">
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
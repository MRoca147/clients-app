@extends('layouts.app', ['activePage' => 'cities', 'titlePage' => __('Ciudades')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Editar ciudad</h4>
            <p class="card-category"></p>
          </div>
          <div class="card-body">
            <form action="{{route('cities.update', $city)}}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group col-md-12">
                <label for="name">Código</label>
                <input type="text" class="form-control" name="cod" id="cod" placeholder="Codigo" value="{{$city->cod}}">
                @error('cod')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col-md-12">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{$city->cod}}">
                @error('name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</div>
@endsection
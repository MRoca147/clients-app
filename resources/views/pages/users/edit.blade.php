@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Usuarios')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Editar usuario</h4>
            <p class="card-category"></p>
          </div>
          <div class="card-body">
            <form action="{{route('users.update', $user)}}" method="POST">
              @csrf
              @method('put')
              <div class="form-group col-md-12">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{ $user->name }}">
                @error('name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col-md-12">
                <label for="name">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $user->email }}">
                @error('email')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col-md-12">
                <label for="name">Nueva Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" >
                @error('password')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col-md-12">
                <label for="name">Confirmar contraseña</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirmar contraseña">
                @error('password_confirmation')
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
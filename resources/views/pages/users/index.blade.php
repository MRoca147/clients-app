@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Usuarios')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Usuarios</h4>
            <p class="card-category">Listado de usuarios</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Nombre
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Opciones
                  </th>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>
                        {{$user->id}}
                      </td>
                      <td>
                        {{$user->name}}
                      </td>
                      <td>
                        {{$user->email}}
                      </td>
                      <td class="text-primary">
                        <button type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
                        @if ($user->id!=1)
                            <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                {!! $users->links() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
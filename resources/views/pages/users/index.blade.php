@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Usuarios')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Usuarios 
              <div class="float-right">
                <a href="{{route('users.create')}}" class="btn btn-success"><i class="material-icons">add</i> Crear</a>
              </div>
            </h4>
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
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                        @if ($user->id!=1)
                            <form id="deleteForm_{{$user->id}}" action="{{route('users.destroy', $user)}}" method="POST">@csrf @method('delete')
                              <button type="button" class="btn btn-danger btn-sm btn-submit"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
                            </form>
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
@push('js')
    <script type="text/javascript">
      $('.btn-submit').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
         title: '¿Desea eliminar al usuario?',
         showCancelButton: true,
         confirmButtonText: "Si, eliminar",
         cancelButtonText: "No, Cancela",
        }).then((result) => {
          if(result.value){
            form.submit()
          }
        })
      });
    </script>
@endpush
@endsection
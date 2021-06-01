@extends('layouts.app', ['activePage' => 'clients', 'titlePage' => __('Clientes')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Clientes 
              <div class="float-right">
                <a href="{{route('clients.create')}}" class="btn btn-success"><i class="material-icons">add</i> Crear</a>
              </div>
            </h4>
            <p class="card-category">Listado de clientes</p>
          </div>
          <div class="card-body">
            <div class="col-md-4 float-right">
              <form action="{{route('clients.index')}}">
                <div class="row">
                  <div class="col-md-9">
                    <label for="city">Ciudad</label>
                    <select class="form-control" name="city" id="city" style="width: 70%">
                      <option value="" selected disabled>Seleccione una opción</option>
                      @foreach ($cities as $city)
                          <option {{request()->city==$city->id}} value="{{$city->id}}">{{$city->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-warning btn-sm"><i class="material-icons">search</i></button>
                    <a href="{{ route('clients.index') }}" class="btn btn-primary btn-sm"><i class="material-icons">clear</i></a>
                  </div>
                </div>
              </form>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Código
                  </th>
                  <th>
                    Nombre
                  </th>
                  <th>
                    Ciudad
                  </th>
                  <th>
                    Opciones
                  </th>
                </thead>
                <tbody>
                  @foreach ($clients as $client)
                  <tr>
                    <td>
                      {{$client->id}}
                    </td>
                    <td>
                      {{$client->cod}}
                    </td>
                    <td>
                      {{$client->name}}
                    </td>
                    <td>
                      {{$client->getCity->name}}
                    </td>
                    <td class="text-primary">
                      <a href="{{ route('clients.edit', $client->id) }}" type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                      <form id="deleteForm_{{$client->id}}" action="{{route('clients.destroy', $client)}}" method="POST">@csrf @method('delete')
                        <button type="button" class="btn btn-danger btn-sm btn-submit"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
                      </form>                    
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                {!! $clients->links() !!}
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
         title: '¿Desea eliminar al cliente?',
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
@extends('layouts.app', ['activePage' => 'cities', 'titlePage' => __('Ciudades')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Ciudades
              <div class="float-right">
                <a href="{{route('cities.create')}}" class="btn btn-success"><i class="material-icons">add</i> Crear</a>
              </div>
            </h4>
            <p class="card-category">Listado de ciudades</p>
          </div>
          <div class="card-body">
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
                    Opciones
                  </th>
                </thead>
                <tbody>
                  @foreach ($cities as $city)
                  <tr>
                    <td>
                      {{$city->id}}
                    </td>
                    <td>
                      {{$city->cod}}
                    </td>
                    <td>
                      {{$city->name}}
                    </td>
                    <td class="text-primary">
                      <a href="{{ route('cities.edit', $city->id) }}" type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                      <form id="deleteForm_{{$city->id}}" action="{{route('cities.destroy', $city)}}" method="POST">@csrf @method('delete')
                        <button type="button" class="btn btn-danger btn-sm btn-submit"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
                      </form>                       
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                {!! $cities->links() !!}
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
         title: '¿Desea eliminar la ciudad?',
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
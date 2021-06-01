@extends('layouts.app', ['activePage' => 'cities', 'titlePage' => __('Ciudades')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Ciudades</h4>
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
                    Name
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
                      <button type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
                      <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
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
@endsection
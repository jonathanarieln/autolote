@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      @if ($client->is_legal)
        <div class="col-md-10">
      @else
        <div class="col-md-12">
      @endif
            <div class="card text-white bg-dark">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                  <table class = "table table-hover table-dark table-responsive">
                      <thead>
                          <tr>
                          <th>Id</th>
                          <th>Tipo Cliente</th>
                          @if ($client->is_legal)
                              <td>Nombre Contacto</td>
                              <td>Numero Telefonico Contacto</td>
                          @else
                              <td>Nombres</td>
                              <td>Apellidos</td>
                              <td>Fecha de Nacimiento</td>
                              <td>Numero de Telefono</td>
                              <td>Genero</td>
                              <td>Numero de Identidad</td>
                          @endif
                          <td>RTN</td>
                          <th>Editar</th>
                          <th>Eliminar</th>
                      </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>{{$client->id}}</td>
                              @if ($client->is_legal)
                                  <td>Juridico</td>
                                  <td>{{$client->legal->legal_name}}</td>
                                  <td>{{$client->legal->contact_phone_number}}</td>

                              @else
                                  <td>Natural</td>
                                  <td>{{$client->person->first_name}}</td>
                                  <td>{{$client->person->surname}}</td>
                                  <td>{{$client->person->birthdate}}</td>
                                  <td>{{$client->person->phone_number}}</td>
                                  <td>{{$client->person->gender->gender_name}}</td>
                                  <td>{{$client->person->identification_number}}</td>
                              @endif
                                <td>{{$client->RTN}}</td>
                              <td><a class="btn btn-secondary btn-sm" href="/clients/{{$client->id}}/edit">Editar</a></td>
                              <td>
                                  <form action="/clients/{{$client->id}}" method="POST">
                                      {{csrf_field()}}
                                      {{method_field('DELETE')}}
                                      <button type="submit" class="btn btn-secondary btn-sm">Eliminar</button>
                                  </form>
                              </td>
                          </tr>
                      </tbody>
                  </table>

                  <a class="btn btn-secondary" href="/clients">Ver Clientes</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
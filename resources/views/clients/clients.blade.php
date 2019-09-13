@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-dark">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                  <div class="col m-8">


                    <table class = "table table-hover table-dark table-responsive">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Telefono</th>
                            <th>Detalle</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{$client->id}}</td>
                                @if ($client->is_legal)
                                    <td>{{$client->legal->legal_name}}</td>
                                    <td>Juridico</td>
                                    <td>{{$client->legal->contact_phone_number}}</td>
                                @else
                                    <td>{{$client->person->first_name}}</td>
                                    <td>Natural</td>
                                    <td>{{$client->person->phone_number}}</td>
                                @endif
                                <td><a href="/clients/{{$client->id}}">Ver Detalles</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                  </div>

                  <div class="col m-4">

                    <a class="btn btn-dark btn-lg" href="clients/create" role="button">Nuevo Cliente</a>

                  </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
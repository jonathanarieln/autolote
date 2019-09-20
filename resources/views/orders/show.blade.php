@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

            <div class="card text-white bg-dark">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                  <table class = "table table-hover table-dark table-responsive">
                      <thead>
                          <tr>
                          <th>Id</th>
                          <th>Cliente</th>
                          <th>Usuario</th>
                          <th>Valor</th>
                          <th>Editar</th>
                          <th>Eliminar</th>
                      </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>{{$order->id}}</td>
                              @if ($order->client->is_legal)
                                <td>{{$order->client->legal->legal_name}}</td>
                              @else
                                <td>{{$order->client->person->first_name}}</td>
                              @endif
                              <td>{{$order->user->user_name}}</td>
                              <td>{{$order->value}}</td>
                              <td><a class="btn btn-secondary btn-sm" href="/orders/{{$order->id}}/edit">Editar</a></td>
                              <td>
                                  <form action="/orders/{{$order->id}}" method="POST">
                                      {{csrf_field()}}
                                      {{method_field('DELETE')}}
                                      <button type="submit" class="btn btn-secondary btn-sm">Eliminar</button>
                                  </form>
                              </td>
                          </tr>

                      </tbody>
                  </table>

                  @if (count($order->cars))
                    <h2>Vehículos</h2>
                    <table class = "table table-hover table-dark table-responsive">
                        <thead>
                            <tr>
                            <th>Id</th>
                            <th>Placa</th>
                            <th>Color</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Precio</th>
                        </tr>
                        </thead>
                        @foreach ($order->cars as $car)
                          <tbody>
                              <tr>
                                  <th>{{$car->id}}</th>
                                  <th>{{$car->plate}}</th>
                                  <th>{{$car->color->color_name}}</th>
                                  <th>{{$car->brand->brand_name}}</th>
                                  <th>{{$car->modelo->model_name}}</th>
                                  <th>{{$car->price}}</th>
                              </tr>
                        @endforeach

                     </table>
                  @endif

                  <a class="btn btn-secondary" href="/orders">Ver Ordenes</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
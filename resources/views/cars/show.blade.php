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
                          <th>Placa</th>
                          <th>Motor</th>
                          <th>Chasis</th>
                          <th>Año</th>
                          <th>Color</th>
                          <th>Ubicación</th>
                      </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>{{$car->id}}</td>
                              <td>{{$car->plate}}</td>
                              <td>{{$car->engine}}</td>
                              <td>{{$car->chassis}}</td>
                              <td>{{$car->year}}</td>
                              <td>{{$car->color->color_name}}</td>
                              <td>{{$car->location->location_name}}</td>
                          </tr>

                      </tbody>
                  </table>

                  @if (count($car->movements))
                    <h2>Movimientos</h2>
                    <table class = "table table-hover table-dark table-responsive">
                        <thead>
                            <tr>
                            <th>Id</th>
                            <th>Nombre Movimiento</th>
                            <th>Disponibilidad</th>
                            <th>Fecha Movimiento</th>
                        </tr>
                        </thead>
                        @foreach ($car->movements as $movement)
                          <tbody>
                              <tr>
                                  <th>{{$movement->id}}</th>
                                  <th>{{$movement->movement_name}}</th>
                                  <th>
                                  @if ($movement->available)
                                      Disponible
                                    @else
                                      No Disponible
                                  @endif
                                  </th>
                                  <th>{{$movement->created_at}}</th>
                              </tr>
                        @endforeach

                     </table>
                  @endif

                  <a class="btn btn-secondary" href="/cars">Ver Vehículos</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
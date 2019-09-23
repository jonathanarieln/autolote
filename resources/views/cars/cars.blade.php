@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card text-white bg-dark">
                <div class="card-header">Vehículos</div>

                <div class="card-body">

                    <table class = "table table-hover table-dark table-responsive">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Placa</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Color</th>
                            <th>Disponibilidad</th>
                            <th>Detalles</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($cars as $car)
                            <tr>
                                <td>{{$car->id}}</td>
                                <td>{{$car->plate}}</td>
                                <td>{{$car->brand->brand_name}}</td>
                                <td>{{$car->modelo->model_name}}</td>
                                <th>{{$car->color->color_name}}</th>
                                <th>
                                @if ($car->available)
                                    Disponible
                                  @else
                                    No Disponoble
                                @endif
                                </th>
                                <td><a href="/cars/{{$car->id}}">Ver Detalles</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
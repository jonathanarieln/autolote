@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-dark">
                <div class="card-header">Vehículos</div>

                <div class="card-body">

                    <table class = "table table-hover table-dark table-responsive">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>JSON</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($cars as $car)
                            <tr>
                                <td>{{$car->id}}</td>
                                <td>{{$car}}</td>
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
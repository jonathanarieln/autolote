@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-white bg-dark">
                <div class="card-header">Ordenes</div>

                <div class="card-body">

                    <table class = "table table-hover table-dark table-responsive">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tipo</th>
                            <th>Vehículos</th>
                            <th>Fecha</th>
                            <th>Detalles</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->order_type->order_type_name}}</td>
                                <td>{{count($order->cars)}}</td>
                                <td>{{$order->created_at}}</td>
                                <td><a href="/orders/{{$order->id}}">Ver Detalles</a></td>
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

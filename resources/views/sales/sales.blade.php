@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card text-white bg-dark">
                <div class="card-header">Ventas</div>

                <div class="card-body">

                    <table id="idSalesTable" class = "table table-hover table-dark table-responsive">
                        <thead>
                        <tr>
                            <th>Id Vendedor</th>
                            <th>Nombre Vendedor</th>
                            <th>Valor</th>
                            <th>% Comisión</th>
                            <th>Comisión a cobrar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->user_id}}</td>
                                <td>{{$order->user_name}}</td>
                                @if ($order->value<10000)
                                  <td>L.{{number_format($order->value,2,".",",")}}</td>
                                  <th>5%</th>
                                  <th>L.{{number_format($order->value*0.05,2,".",",")}}</th>
                                @elseif ($order->value<20000)
                                  <td>L.{{number_format($order->value,2,".",",")}}</td>
                                  <th>10%</th>
                                  <th>L.{{number_format($order->value*0.10,2,".",",")}}</th>
                                @elseif ($order->value<30000)
                                  <td>L.{{number_format($order->value,2,".",",")}}</td>
                                  <th>15%</th>
                                  <th>L.{{number_format($order->value*0.15,2,".",",")}}</th>
                                @elseif ($order->value>=30000)
                                  <td>L.{{number_format($order->value,2,".",",")}}</td>
                                  <th>20%</th>
                                  <th>L.{{number_format($order->value*0.20,2,".",",")}}</th>
                                @endif

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-secondary" onclick="generateSalesPdf()">Generar PDF</button>
                    <a class="float-right" href="./commissions">Ver tabla de comisiones</a>
                </div>
            </div>
    </div>
</div>
@endsection
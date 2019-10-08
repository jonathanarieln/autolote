@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card text-white bg-dark">
                <div class="card-header">Comisiones</div>

                <div class="card-body">

                    <table class = "table table-hover table-dark table-responsive">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Valor</th>
                            <th>% Comisión</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($commissions as $commission)
                            <tr>
                                <td>{{$commission->id}}</td>
                                <td>L.{{number_format($commission->value,2,".",",")}}</td>
                                <td>{{$commission->commission."%"}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-secondary" onclick="generateSalesPdf()">Generar PDF</button>
                </div>
            </div>
    </div>
</div>
@endsection
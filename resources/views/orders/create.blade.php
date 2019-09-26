@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card text-white bg-dark">
                <div class="card-header">Nueva Orden</div>

                <div class="card-body">

                  <main role="main">
                        <div class="container">
                            <h1 class="display-4">Seleccione la orden que desea crear:</h1>
                        </div>


                       <div class="container">
                           <!-- Example row of columns -->
                           <div class="row">
                               <div class="col-md-6">
                                   <h2>Orden de Arrendamiento</h2>
                                       <p>Orden especializada para el arrendamiento de vehículos. </p>

                                       <p><a class="btn btn-secondary"  href="/to_hire_order" role="button">
                                               Arrendar Vehículos... &raquo;</a></p>

                               </div>

                               <div class="col-md-6">
                                   <h2>Orden de Retorno de Arrendamiento</h2>
                                       <p>Orden especializada para retornar vehiculos. </p>

                                       <p><a class="btn btn-secondary"  href="/return_to_hire_order" role="button">
                                               Retornar Vehiculos Arrendamiento... &raquo;</a></p>

                               </div>

                               {{-- <div class="col-md-4">
                                   <h2>Orden de Mantenimiento</h2>
                                       <p>Orden especializada para mandar un vehiculo a mantenimiento. </p>

                                       <p><a class="btn btn-secondary"  href="/maintenance_order" role="button">
                                               Orden Mantenimiento... &raquo;</a></p>

                               </div> --}}

                               </div>

                               <hr>

                               <div class="row">
                               {{-- <div class="col-md-4">
                                     <h2>Orden de Retorno de Mantenimiento</h2>
                                         <p>Orden especializada para ingresar vehiculos nuevos al autolote. </p>

                                         <p><a class="btn btn-secondary"  href="/return_maintenance_order" role="button">
                                                 Retornar Vehiculos Mantenimiento... &raquo;</a></p>

                               </div> --}}
                               <div class="col-md-6">
                                   <h2>Orden de Venta</h2>
                                       <p>Orden especializada para vender vehiculos pertenecientes al autolote. </p>

                                       <p><a class="btn btn-secondary"  href="/sale_order" role="button">
                                               Orden de Venta... &raquo;</a></p>

                               </div>
                               <div class="col-md-6">
                                   <h2>Orden de Ingreso</h2>
                                       <p>Orden especializada para ingresar vehiculos nuevos al autolote. </p>

                                       <p><a class="btn btn-secondary"  href="/order_in" role="button">
                                               Orden Ingreso... &raquo;</a></p>

                               </div>
                               </div>
                           <hr>

                       </div> <!-- /container -->



                   </main>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
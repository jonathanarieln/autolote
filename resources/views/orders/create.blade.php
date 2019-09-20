@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                               <div class="col-md-3">
                                   <h2>Orden de Arrendamiento</h2>
                                       <p>Orden especializada para ingresar vehiculos nuevos al autolote. </p>

                                       <p><a class="btn btn-secondary"  href="/order_in" role="button">
                                               Orden Ingreso... &raquo;</a></p>

                               </div>
                               <div class="col-md-3">
                                   <h2>Orden de Mantenimiento</h2>
                                       <p>Orden especializada para ingresar vehiculos nuevos al autolote. </p>

                                       <p><a class="btn btn-secondary"  href="/order_in" role="button">
                                               Orden Ingreso... &raquo;</a></p>

                               </div>
                               <div class="col-md-3">
                                   <h2>Orden de Venta</h2>
                                       <p>Orden especializada para ingresar vehiculos nuevos al autolote. </p>

                                       <p><a class="btn btn-secondary"  href="/order_in" role="button">
                                               Orden Ingreso... &raquo;</a></p>

                               </div>
                               <div class="col-md-3">
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
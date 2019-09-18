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
                           <!-- Example row of columns -->
                           <div class="row">
                               <div class="col-md-4">
                                   <h2>Tipo Orden</h2>

                                       <p>Contenido de la columna 1 posiblemente un combo box con el tipo de orden. </p>

                                   <p><a class="btn btn-secondary" href="/errors/404" role="button">
                                           Aceptar... &raquo;</a></p>

                               </div>
                               <div class="col-md-4">
                                   <h2>Cliente</h2>
                                       <p>Contenido de la columna 2 aca se seleccionara el cliente si no hay cliente debe crear uno nuevo. </p>

                                       <p><a class="btn btn-secondary"  href="/errors/404" role="button">
                                               Aceptar... &raquo;</a></p>

                               </div>
                               <div class="col-md-4">
                                   <h2>Cliente nuevo</h2>
                                       <p>Aca ira un boton para un nuevo cliente o alguna otra cosa. </p>

                                       <p><a class="btn btn-secondary"  href="/clients/create" role="button">
                                               Nuevo Cliente... &raquo;</a></p>

                               </div>
                           </div>
                           <hr>

                       </div> <!-- /container -->

                       <!-- Main jumbotron for a primary marketing message or call to action -->
                       <div class="jumbotron bg-dark">
                           <div class="container">
                               <h1 class="display-4">Vehículos</h1>
                               <table class="table table-hover table-dark">
                                 <thead>
                                   <tr>
                                     <th>
                                       Marca
                                     </th>
                                     <th>
                                       Modelo
                                     </th>
                                     <th>
                                       Placa
                                     </th>
                                     <th>
                                       Precio Base
                                     </th>
                                     <th>
                                       Eliminar
                                     </th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                   <tr>
                                     <th>
                                       Toyota
                                     </th>
                                     <th>
                                       Yaris
                                     </th>
                                     <th>
                                       PPP 3355
                                     </th>
                                     <th>
                                       1548.36
                                     </th>
                                     <th>
                                       <a href="#">Eliminar</a>
                                     </th>
                                   </tr>
                                   <tr>
                                     <th>
                                       Toyota
                                     </th>
                                     <th>
                                       Corolla
                                     </th>
                                     <th>
                                       PDN 4234
                                     </th>
                                     <th>
                                       1204.55
                                     </th>
                                     <th>
                                       <a href="#">Eliminar</a>
                                     </th>
                                   </tr>
                                 </tbody>
                                 <tfoot>
                                   <tr>
                                     <th colspan="5">
                                       <button class="btn btn-block btn-secondary">Añadir nuevo vehiculo</button>
                                     </th>
                                   </tr>
                                 </tfoot>
                               </table>

                               <div class="container">
                                   <!-- Example row of columns -->
                                   <div class="row">
                                       <div class="col-md-4">
                                           <h2>Dia inicial</h2>

                                               <p>Si debe ir un dia inicial aca puede ir. </p>
                                               <input type="date" name="" value="">

                                           <p><a class="btn btn-secondary" href="/errors/404" role="button">
                                                   Aceptar... &raquo;</a></p>

                                       </div>
                                       <div class="col-md-4">
                                           <h2>Dia Final</h2>
                                               <p>si existe un duia final aca puede ir . </p>
                                               <input type="date" name="" value="">

                                               <p><a class="btn btn-secondary"  href="/errors/404" role="button">
                                                       Aceptar... &raquo;</a></p>

                                       </div>
                                       <div class="col-md-4">
                                           <h2>Precio:</h2>
                                               <h2>8450.35</h2>


                                       </div>
                                   </div>
                                   <hr>

                               </div> <!-- /container -->

                               <p><a class="btn btn-secondary btn-lg" href="/errors/404" role="button">
                                           Generar Orden &raquo;</a></p>

                           </div>
                       </div>

                   </main>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
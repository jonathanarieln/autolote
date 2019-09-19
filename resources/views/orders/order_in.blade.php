@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-white bg-dark">
                <div class="card-header">Orden de Ingreso</div>

                <div class="card-body">

                  <main role="main">



                       <div class="container">
                           <!-- Example row of columns -->
                           <div class="row">
                               <div class="col-md-6">
                                   <h2>Cliente</h2>

                                       <h3>Seleccione el cliente que al cual le compraremos los vehiculos</h3>

                                       <p><a class="btn btn-secondary"  href="/clients/create" role="button">
                                               Nuevo Cliente... &raquo;</a></p>

                               </div>
                               <div class="col-md-6">
                                   <h2>Instrucciones</h2>
                                       <p>pueden Ir las instrucciones Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>

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
                                       Placa
                                     </th>
                                     <th>
                                       Año
                                     </th>
                                     <th>
                                       Marca
                                     </th>
                                     <th>
                                       Modelo
                                     </th>
                                     <th>
                                       Precio Base
                                     </th>
                                     <th>
                                       Tipo Vehículo
                                     </th>
                                     <th>
                                       Ubicación
                                     </th>
                                     <th>
                                       Eliminar
                                     </th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                   @foreach ($cars as $car)
                                       <tr>
                                         <tr>
                                           <th>
                                             {{$car->plate}}
                                           </th>
                                           <th>
                                             {{$car->year}}
                                           </th>
                                           <th>
                                             {{$car->brand->brand_name}}
                                           </th>
                                           <th>
                                             {{$car->modelo->model_name}}
                                           </th>
                                           <th>
                                             {{$car->price}}
                                           </th>
                                           <th>
                                             {{$car->car_type->car_type_name}}
                                           </th>
                                           <th>
                                             {{$car->location->location_name}}
                                           </th>
                                           <th>
                                             <a href="#">Eliminar</a>
                                           </th>
                                         </tr>
                                       </tr>
                                   @endforeach
                                 </tbody>
                                 <tfoot>
                                   <tr>
                                     <th colspan="8">

                                       <p><a class="btn btn-block btn-secondary"  href="/order_in_new" role="button">
                                               Añadir nuevo vehículo &raquo;</a></p>

                                     </th>
                                   </tr>
                                 </tfoot>
                               </table>

                               <div class="container">
                                   <!-- Example row of columns -->
                                   <div class="row">

                                       <div class="col-md-12">
                                           <h2>Valor Total: L. {{$price}}</h2>

                                       </div>
                                   </div>
                                   <hr>

                               </div> <!-- /container -->

                               <p><a class="btn btn-secondary btn-lg" href="/order_clean" role="button">
                                           Limpiar Orden &raquo;</a></p>

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
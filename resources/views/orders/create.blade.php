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

                                       <p>Contenido de la columna 1. </p>

                                   <p><a class="btn btn-secondary" href="enlazo" role="button">
                                           Seguir... &raquo;</a></p>

                               </div>
                               <div class="col-md-4">
                                   <h2>Cliente</h2>
                                       <p>Contenido de la columna 2. </p>

                                       <p><a class="btn btn-secondary"  href="@yield('enlace-boton-columna2')" role="button">
                                               Seguir... &raquo;</a></p>

                               </div>
                               <div class="col-md-4">
                                   <h2>Titulo Columna 2</h2>
                                       <p>Contenido de la columna 2. </p>

                                       <p><a class="btn btn-secondary"  href="@yield('enlace-boton-columna2')" role="button">
                                               Seguir... &raquo;</a></p>

                               </div>
                           </div>
                           <hr>

                       </div> <!-- /container -->

                       <!-- Main jumbotron for a primary marketing message or call to action -->
                       <div class="jumbotron bg-dark">
                           <div class="container">
                               <h1 class="display-4">Titulo principal</h1>
                               <p>descripcion titulo principal</p>
                               <p><a class="btn btn-secondary btn-lg" href="enlaze" role="button">
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
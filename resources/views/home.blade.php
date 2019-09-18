@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card text-white bg-dark">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <main role="main">

                         <!-- Main jumbotron for a primary marketing message or call to action -->
                         <div class="jumbotron bg-dark">
                             <div class="container">
                                 <h1 class="display-4">Sistema Autolote</h1>
                                 <p align="justify">Bienvenido al sistema encargado de la gestión y manejo de los vehículos dentro del establecimiento.
                                 </p>
                                 <p><a class="btn btn-secondary btn-lg" href="/orders/create" role="button">
                                             Nueva Orden &raquo;</a></p>

                             </div>
                         </div>

                         <div class="container">
                             <!-- Example row of columns -->
                             <div class="row">
                                 <div class="col-md-6">
                                     <h2>Usuario:</h2>

                                     <p>Bienvenido {{Auth::user()->person->first_name}} {{Auth::user()->person->surname}}!!!!!</p>

                                 </div>
                                 <div class="col-md-6">
                                     <h2>Permisos:</h2>
                                     @if(@Auth::user()->hasPermissionTo('admin'))
                                         <p class="text-white">Usted tiene permisos de Administrador</p>
                                     @endif

                                     @if(@Auth::user()->hasPermissionTo('vendedor'))
                                         <p class="text-white">Usted tiene permisos de Vendedor</p>
                                     @endif

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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card text-white bg-dark">
                <div class="card-header">ERROR</div>

                <div class="card-body">

                    <h1 class="display-2">Llave foranea</h1>
                    <p>No puede eliminar este registro por que contiene otros registros que dependen de el para eliminarlo primero elimine dichos registros</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
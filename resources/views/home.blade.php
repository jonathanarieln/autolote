@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-dark">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Bienvenido {{Auth::user()->person->first_name}} {{Auth::user()->person->surname}}!!!!!</p>

                    @if(@Auth::user()->hasPermissionTo('admin'))
                        <p class="btn text-white">Usted tiene permisos de admin y tambien </p>
                    @endif

                    @if(@Auth::user()->hasPermissionTo('vendedor'))
                        <p class="btn text-white">Usted tiene permisos de vendedor</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

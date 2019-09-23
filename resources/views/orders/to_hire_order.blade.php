@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-white bg-dark">
                <div class="card-header">Orden de Arrendamiento</div>

                <div class="card-body">

                  <main role="main">

                    @if($errors->any())
                        <div class="alert alert-danger">
                        <p >Atencion!</p>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif

                       <div class="container">
                           <!-- Example row of columns -->
                           <div class="row">
                               <div class="col-md-6">
                                   <h2>Orden de Arrendamiento</h2>

                                       <h4>La orden de arrendamiento se encarga de ver que vehiculos saldran del establecimiento por
                                         razón de arrendamiento.</h4>



                                         <form action="/to_hire_order_type_store" method="POST">
                                             {{ csrf_field() }}
                                                <h3>Seleccione el cliente al cual le arrendaremos los vehiculos</h3>
                                                 <select type="text" class="form-control" name="client_id" value="{{ old('client_id') }}"  autocomplete="client_id">

                                                  @foreach ($clients as $client)
                                                   @if ($client->is_legal)
                                                     <option value="{{$client->id}}">{{$client->legal->legal_name}}</option>
                                                   @else
                                                      <option value="{{$client->id}}">{{$client->person->first_name." ".$client->person->surname}}</option>
                                                   @endif
                                                  @endforeach

                                                  </select>

                                                  <h2>Dias Orden</h2>

                                                  <h3>Seleccione la cantidad de dias que durara el arrendamiento:</h3>

                                                  <div class="form-group row">
                                                      <label for="days" class="col-md-4 col-form-label text-md-right">{{ __('Dias') }}</label>

                                                      <div class="col-md-6">
                                                          <input id="days" type="number" class="form-control @error('days') is-invalid @enderror" name="days" value="{{ old('days') }}"  autocomplete="days">

                                                          @error('days')
                                                              <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                              </span>
                                                          @enderror
                                                      </div>
                                                  </div>

                                                  <p><a class="btn btn-secondary"  href="/clients/create" role="button">
                                                          Nuevo Cliente... &raquo;</a></p>
                                                   <div style="overflow:auto;">
                                                     <div style="float:right;">
                                                       <p><a class="btn btn-secondary" href="/to_hire_order_clean" role="button">
                                                                   Limpiar Orden &raquo;</a></p>
                                                     <button type="submit" class="btn btn-secondary">Generar Orden &raquo;</button>
                                                   </div>
                                                 </div>

                                          </form>

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
                                   @foreach ($to_hire_temp_cars as $car)
                                       <tr>
                                         <tr>
                                           <th>
                                             {{$car->car->plate}}
                                           </th>
                                           <th>
                                             {{$car->car->year}}
                                           </th>
                                           <th>
                                             {{$car->car->brand->brand_name}}
                                           </th>
                                           <th>
                                             {{$car->car->modelo->model_name}}
                                           </th>
                                           <th>
                                             {{$car->car->car_type->car_type_name}}
                                           </th>
                                           <th>
                                             {{$car->car->location->location_name}}
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

                                       <p><a class="btn btn-block btn-secondary"  href="/to_hire_order_new" role="button">
                                               Añadir nuevo vehículo &raquo;</a></p>

                                     </th>
                                   </tr>
                                 </tfoot>
                               </table>

                               <div class="container">
                                   <!-- Example row of columns -->
                                   <div class="row">

                                       <div class="col-md-12">
                                           {{-- <h2>Valor Total: L. {{$price}}</h2> --}}

                                       </div>
                                   </div>
                                   <hr>

                               </div> <!-- /container -->



                           </div>
                       </div>

                   </main>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
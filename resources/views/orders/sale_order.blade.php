@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-white bg-dark">
                <div class="card-header">Orden de Venta</div>

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
                                   <h2>Orden de Venta</h2>

                                       <h4>Esta orden se encarga de la venta de vehículos.</h4>



                               </div>

                               <div class="col-md-6">
                                 <form action="/sale_order_type_store" method="POST">
                                     {{ csrf_field() }}

                                     <h3>Seleccione el cliente al cual le compraremos los vehiculos</h3>
                                      <select type="text" class="form-control" name="client_id" value="{{ old('client_id') }}"  autocomplete="client_id">

                                       @foreach ($clients as $client)
                                        @if ($client->is_legal)
                                          <option value="{{$client->id}}">{{$client->legal->legal_name}}</option>
                                        @else
                                           <option value="{{$client->id}}">{{$client->person->first_name." ".$client->person->surname}}</option>
                                        @endif
                                       @endforeach

                                       </select>

                                       <p><a class="btn btn-secondary"  href="/clients/create" role="button">
                                               Nuevo Cliente... &raquo;</a></p>


                                        <h3>Seleccione el auto que vendera</h3>
                                         <select type="text" class="form-control" name="car_id" value="{{ old('car_id') }}"  autocomplete="car_id" required>


                                            @foreach ($cars as $car)

                                                  <option value="{{$car->id}}">{{$car->plate." ".$car->modelo->model_name}}</option>


                                            @endforeach

                                          </select>

                                          <h3>Ingrese el precio</h3>
                                          <div class="form-group row">
                                              <label for="value" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                                              <div class="col-md-6">
                                                  <input id="value" type="number" class="form-control @error('value') is-invalid @enderror" name="value" value="{{ old('value') }}"  autocomplete="value">

                                                  @error('value')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>


                                           <div style="overflow:auto;">
                                             <div style="float:right;">
                                             <button type="submit" class="btn btn-secondary">Generar Orden &raquo;</button>
                                           </div>
                                         </div>

                                  </form>

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
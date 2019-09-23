@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-white bg-dark">
                <div class="card-header">Orden de Retorno de Arrendamiento</div>

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
                                   <h2>Orden de Retorno de Arrendamiento</h2>

                                       <h4>La orden de retorno de arrendamiento se encarga de regresar los vehiculos arrendados al establecimiento.</h4>



                               </div>

                               <div class="col-md-6">
                                 <form action="/return_to_hire_order_type_store" method="POST">
                                     {{ csrf_field() }}
                                        <h3>Seleccione el numero de orden de arrendamiento que se refiere a los vehiculos</h3>
                                         <select type="text" class="form-control" name="order_id" value="{{ old('order_id') }}"  autocomplete="order_id">


                                            @foreach ($orders as $order)

                                              @if ($order->client->is_legal)
                                                  <option value="{{$order->id}}">{{$order->id." ".$order->client->legal->legal_name}}</option>
                                              @else
                                                  <option value="{{$order->id}}">{{$order->id." ".$order->client->person->first_name}}</option>
                                              @endif

                                            @endforeach

                                          </select>


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
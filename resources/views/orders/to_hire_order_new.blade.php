@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-dark">
                <div class="card-header">Agregar Vehiculo a la orden</div>

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


                       {{-- pasamos por el metodo post al formulario order_in para ingresar el nuevo vehiculo --}}
                       <form action="/to_hire_order" method="post">
                         @csrf

                         <div class="form-group row">
                             <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Automovil') }}</label>

                             <div class="col-md-6">
                                 <select id="car_id" type="text" class="form-control @error('car_id') is-invalid @enderror" name="car_id" value="{{ old('car_id') }}"  autocomplete="car_id">
                                   @foreach($cars as $car)
                                   <option value="{{$car->id}}">{{$car->brand->brand_name." ".$car->modelo->model_name." ".$car->plate." "}}</option>
                                   @endforeach
                                </select>
                                 @error('car_id')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>


                         <input type="submit" class="btn btn-secondary" value="Agregar Vehículo">
                       </form>


                   </main>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
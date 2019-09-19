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
                       <form class="" action="/order_in" method="post">
                         @csrf

                         <div class="form-group row">
                             <label for="plate" class="col-md-4 col-form-label text-md-right">{{ __('Placa') }}</label>

                             <div class="col-md-6">
                                 <input id="plate" type="text" class="form-control @error('plate') is-invalid @enderror" name="plate" value="{{ old('plate') }}"  autocomplete="plate">

                                 @error('plate')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="engine" class="col-md-4 col-form-label text-md-right">{{ __('Motor') }}</label>

                             <div class="col-md-6">
                                 <input id="engine" type="text" class="form-control @error('engine') is-invalid @enderror" name="engine" value="{{ old('engine') }}"  autocomplete="engine">

                                 @error('engine')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="chassis" class="col-md-4 col-form-label text-md-right">{{ __('Chasis') }}</label>

                             <div class="col-md-6">
                                 <input id="chassis" type="text" class="form-control @error('chassis') is-invalid @enderror" name="chassis" value="{{ old('chassis') }}"  autocomplete="chassis">

                                 @error('chassis')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Año') }}</label>

                             <div class="col-md-6">
                                 <input id="year" type="number" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}"  autocomplete="year">

                                 @error('year')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                             <div class="col-md-6">
                                 <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}"  autocomplete="price">

                                 @error('price')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="color_id" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

                             <div class="col-md-6">
                                <select id="color_id" type="text" class="form-control @error('color_id') is-invalid @enderror" name="color_id" value="{{ old('color_id') }}"  autocomplete="color_id">
                                   @foreach($colors as $color)
                                   <option value="{{$color->id}}">{{$color->color_name}}</option>
                                   @endforeach
                                </select>
                                 @error('color_id')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Marca') }}</label>

                             <div class="col-md-6">
                                 <select id="brand_id" type="text" class="form-control @error('brand_id') is-invalid @enderror" name="brand_id" value="{{ old('brand_id') }}"  autocomplete="brand_id">
                                   @foreach($brands as $brand)
                                   <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                   @endforeach
                                </select>
                                 @error('brand_id')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="modelo_id" class="col-md-4 col-form-label text-md-right">{{ __('Modelo') }}</label>

                             <div class="col-md-6">
                                 <select id="modelo_id" type="text" class="form-control @error('modelo_id') is-invalid @enderror" name="modelo_id" value="{{ old('modelo_id') }}"  autocomplete="modelo_id">
                                   @foreach($models as $model)
                                   <option value="{{$model->id}}">{{$model->model_name}}</option>
                                   @endforeach
                                </select>
                                 @error('modelo_id')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="car_type_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Vehículo') }}</label>

                             <div class="col-md-6">
                                 <select id="car_type_id" type="text" class="form-control @error('car_type_id') is-invalid @enderror" name="car_type_id" value="{{ old('car_type_id') }}"  autocomplete="car_type_id">
                                   @foreach($car_types as $car_types)
                                   <option value="{{$car_types->id}}">{{$car_types->car_type_name}}</option>
                                   @endforeach
                                </select>
                                 @error('car_type_id')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="location_id" class="col-md-4 col-form-label text-md-right">{{ __('Ubicación') }}</label>

                             <div class="col-md-6">
                                 <select id="location_id" type="text" class="form-control @error('location_id') is-invalid @enderror" name="location_id" value="{{ old('location_id') }}"  autocomplete="location_id">
                                   @foreach($locations as $location)
                                   <option value="{{$location->id}}">{{$location->location_name}}</option>
                                   @endforeach
                                </select>

                                 @error('location_id')
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
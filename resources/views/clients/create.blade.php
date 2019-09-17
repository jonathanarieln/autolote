@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-dark">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

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

                  <form id="client_form_id" action="/clients" method="POST">
                      {{ csrf_field() }}

                      <!-- Circles which indicates the steps of the form: -->
                      <div style="text-align:center;">
                        <span class="step" id="step1"></span>
                        <span class="step" id="step2"></span>
                        <span class="step" id="step3"></span>
                      </div>

                      <div class="tab" id="tab1">

                        	<h2>Que clase de cliente creara:</h2>

                              <input type="radio" value="Natural" id="radioPerson" name="person" checked>
                              <label for="Natural">Persona Natural</label>


                              <input type="radio" value="Juridico" name="person">
                              <label for="Juridico">Persona Juridica</label>


                          <div style="overflow:auto;">
                            <div style="float:right;">
                              <button type="button" class="btn btn-dark" onclick="siguienteTab1()">Siguiente</button>
                            </div>
                          </div>

                        </div>

                        <div class="tab" id="tab2">

                          	<h2>Persona Natural:</h2>

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('first_name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"  autocomplete="first_name">

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('surname') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}"  autocomplete="surname">

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('birthdate') }}</label>

                                <div class="col-md-6">
                                    <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}"  autocomplete="birthdate">

                                    @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('phone_number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}"  autocomplete="phone_number">

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender_id" class="col-md-4 col-form-label text-md-right">{{ __('gender_id') }}</label>

                                <div class="col-md-6">
                                  <input type="radio" id="gender_id" name="gender_id" value="1" checked> Masculino<br>
                                  <input type="radio" id="gender_id" name="gender_id" value="2"> Femenino<br>
                                  <input type="radio" id="gender_id" name="gender_id" value="3"> Other
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="identification_number" class="col-md-4 col-form-label text-md-right">{{ __('identification_number') }}</label>

                                <div class="col-md-6">
                                    <input id="identification_number" type="text" class="form-control @error('identification_number') is-invalid @enderror" name="identification_number" value="{{ old('identification_number') }}"  autocomplete="identification_number">

                                    @error('identification_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="RTN_natural" class="col-md-4 col-form-label text-md-right">{{ __('RTN_natural') }}</label>

                                <div class="col-md-6">
                                    <input id="RTN_natural" type="text" class="form-control @error('RTN_natural') is-invalid @enderror" name="RTN_natural" value="{{ old('RTN_natural') }}"  autocomplete="RTN_natural">

                                    @error('RTN_natural')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div style="overflow:auto;">
                              <div style="float:right;">
                                <button type="button" class="btn btn-dark" onclick="volverTab1()">Anterior</button>
                                <button type="button" class="btn btn-dark" onclick="siguienteTab2()">Siguiente</button>
                              </div>
                            </div>

                        </div>

                        <div class="tab" id="tab3">

                          	<h2>Persona Juridica:</h2>

                            <div class="form-group row">
                                <label for="legal_name" class="col-md-4 col-form-label text-md-right">{{ __('legal_name') }}</label>

                                <div class="col-md-6">
                                    <input id="legal_name" type="text" class="form-control @error('legal_name') is-invalid @enderror" name="legal_name" value="{{ old('legal_name') }}"  autocomplete="legal_name">

                                    @error('legal_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contact_name" class="col-md-4 col-form-label text-md-right">{{ __('contact_name') }}</label>

                                <div class="col-md-6">
                                    <input id="contact_name" type="text" class="form-control @error('contact_name') is-invalid @enderror" name="contact_name" value="{{ old('contact_name') }}"  autocomplete="contact_name">

                                    @error('contact_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="contact_phone_number" class="col-md-4 col-form-label text-md-right">{{ __('contact_phone_number') }}</label>

                                <div class="col-md-6">
                                    <input id="contact_phone_number" type="text" class="form-control @error('contact_phone_number') is-invalid @enderror" name="contact_phone_number" value="{{ old('contact_phone_number') }}"  autocomplete="contact_phone_number">

                                    @error('contact_phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="RTN_juridico" class="col-md-4 col-form-label text-md-right">{{ __('RTN_juridico') }}</label>

                                <div class="col-md-6">
                                    <input id="RTN_juridico" type="text" class="form-control @error('RTN_juridico') is-invalid @enderror" name="RTN_juridico" value="{{ old('RTN_juridico') }}"  autocomplete="RTN_juridico">

                                    @error('RTN_juridico')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div style="overflow:auto;">
                              <div style="float:right;">
                                <button type="button" class="btn btn-dark" onclick="volverTab1()">Anterior</button>
                                <button type="button" class="btn btn-dark" onclick="siguienteTab2()">Siguiente</button>
                              </div>
                            </div>

                        </div>

                        <div class="tab" id="tab4">

                          	<h2>Confirmar:</h2>

                            <h5 id="label_person"></h5>
                            <h5 id="label_first_name"></h5>
                            <h5 id="label_surname"></h5>
                            <h5 id="label_birtdate"></h5>
                            <h5 id="label_phone_number"></h5>
                            <h5 id="label_gender"></h5>
                            <h5 id="label_identification_number"></h5>
                            <h5 id="label_RTN_natural"></h5>
                            <h5 id="label_legal_name"></h5>
                            <h5 id="label_contact_number"></h5>
                            <h5 id="label_contact_phone_number"></h5>
                            <h5 id="label_RTN_juridico"></h5>

                            <div style="overflow:auto;">
                              <div style="float:right;">

                              <button type="button" class="btn btn-dark" onclick="volverTab2()">Anterior</button>
                              <button type="submit" class="btn btn-dark">Confirmar</button>

                            </div>
                          </div>



                        </div>

                   </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
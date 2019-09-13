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

                      <div class="container">

                        	<h2 style="color: #AAAAAA;">Que clase de cliente creara:</h2>
                            <ul>
                            <li>
                              <input type="radio" id="f-option" name="selector">
                              <label for="f-option" style="color: #AAAAAA;">Persona Natural</label>

                              <div class="check"></div>
                            </li>

                            <li>
                              <input type="radio" id="s-option" name="selector">
                              <label for="s-option" style="color: #AAAAAA;">Persona Juridica</label>

                              <div class="check"><div class="inside"></div></div>
                            </li>

                          </ul>
                        </div>

                      <button type="submit" class="btn btn-dark">Siguiente</button>
                   </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-dark">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                  <table class = "table table-hover table-dark table-responsive">
                      <thead>
                          <th>JSON cliente</th>
                          <th>JSON contacto</th>
                      </thead>
                      <tbody>
                        <th>
                             {{$client}}
                        </th>
                        @if ($client->is_legal)
                            <th>{{$client->legal}}</td>
                        @else
                            <td>{{$client->person}}</td>
                        @endif
                      </tbody>
                  </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
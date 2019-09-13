@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-dark">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                  <table class = "table table-hover table-responsive">
                      <thead>
                      <tr>
                          <th>Id</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($Clients as $Client)
                          <tr>
                              <td>{{$Client->Id}}</td>
                          </tr>
                      @endforeach
                      </tbody>
                  </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
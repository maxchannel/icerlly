@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h1>Registro</h1>

                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('message') }}
                    </div>
                @endif

                {{ Form::open(['route'=>'signup_register', 'method'=>'POST', 'role'=>'form']) }}

                {{ Field::text('full_name',null,['placeholder'=>'Nombre para mostrar']) }}

                {{ Field::email('email',null,['placeholder'=>'Email válido']) }}

                {{ Field::text('username',null,['placeholder'=>'Username']) }}

                {{ Field::password('password') }}

                <button type="submit" class="btn btn-success">Registrarme</button>

                {{ Form::close() }}

           </div>
            <div class="col-md-3">
            </div>
        </div>
    </div> <!-- /container -->

@stop
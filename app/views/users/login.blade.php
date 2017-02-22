@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            <h2 class="form-signin-heading">Iniciar Sesión</h2>
            {{ Form::open(['route'=>'login_send', 'method'=>'POST', 'role'=>'form', 'class'=>'form-signin']) }}

            {{ Form::text('username', null, ['class'=>'form-control', 'placeholder'=>'Username']) }}

            {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) }}
            
            <div class="checkbox">
                <label class="remember-me">
                    {{ Form::checkbox('remember') }} Recordarme
                </label>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>

            @if(Session::has('login_error'))
                </br><div class="alert alert-danger" role="alert"><p>Error en username o password</p></div>
            @endif
            {{ Form::close() }}

           </div>
            <div class="col-md-4">
            </div>
        </div>
    </div> <!-- /container -->
@stop
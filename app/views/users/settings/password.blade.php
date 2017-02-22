@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h1>Editar Contraseña</h1>
                <ul class="nav nav-tabs nav-justified">
                    <li role="presentation"><a href="{{ route('settings_profile') }}">Perfil</a></li>
                    <li role="presentation" class="active"><a href="{{ route('settings_password') }}">Contraseña</a></li>
                    <li role="presentation"><a href="{{ route('settings_avatar') }}">Avatar</a></li>
                    <li role="presentation"><a href="{{ route('settings_payment') }}">Pagos</a></li>
                </ul></br>

                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('message') }}
                    </div>
                @endif

                {{ Form::model($user,['route'=>'settings_password_update', 'method'=>'PUT', 'role'=>'form']) }}

                {{ Field::password('password') }}

                {{ Field::password('password_confirmation') }}

                <button type="submit" class="btn btn-primary">Actualizar</button>

                {{ Form::close() }}

           </div>
            <div class="col-md-3">
            </div>
        </div>
    </div> <!-- /container -->

@stop
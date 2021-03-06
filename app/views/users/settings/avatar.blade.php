@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h1>Editar Avatar</h1>
                <ul class="nav nav-tabs nav-justified">
                    <li role="presentation"><a href="{{ route('settings_profile') }}">Perfil</a></li>
                    <li role="presentation"><a href="{{ route('settings_password') }}">Contraseña</a></li>
                    <li role="presentation" class="active"><a href="{{ route('settings_avatar') }}">Avatar</a></li>
                    <li role="presentation"><a href="{{ route('settings_payment') }}">Pagos</a></li>
                </ul></br>

                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('message') }}
                    </div>
                @endif

                <label>Actual:</label>
                <img src="{{ asset('images/avatar/'.$avatar->name) }}" class="profile-avatar-settings" /></br></br>

                {{ Form::open(['route'=>'settings_avatar_update', 'method'=>'PUT', 'role'=>'form', 'enctype' => 'multipart/form-data']) }}

                {{ Form::file('file', ['accept' => 'image/*']) }}

                {{ $errors->first('file', '</br><div class="alert alert-danger" role="alert"><p>:message</p></div>') }}

                </br><button type="submit" class="btn btn-primary">Actualizar</button>

                {{ Form::close() }}

           </div>
            <div class="col-md-3">
            </div>
        </div>
    </div> <!-- /container -->

@stop
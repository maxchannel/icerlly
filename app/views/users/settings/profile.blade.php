@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h1>Editar Perfil</h1>
                <ul class="nav nav-tabs nav-justified">
                    <li role="presentation" class="active"><a href="{{ route('settings_profile') }}">Perfil</a></li>
                    <li role="presentation"><a href="{{ route('settings_password') }}">Contraseña</a></li>
                    <li role="presentation"><a href="{{ route('settings_avatar') }}">Avatar</a></li>
                    <li role="presentation"><a href="{{ route('settings_payment') }}">Pagos</a></li>
                </ul></br>

                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('message') }}
                    </div>
                @endif

                @if(isnt_confirmed(Auth::user()->id))
                    <div class="alert alert-danger" role="alert">
                        <p>Tu cuenta no esta confirmada, te recomendamos revisar tu email (Spam también) para poder agregar pagos a tu cuenta.</br> <a href="{{route('confirm_email')}}" class="alert-link">Confirmar código ahora</a></p>
                    </div>
                @endif

                {{ Form::model($user,['route'=>'settings_profile_update', 'method'=>'PUT', 'role'=>'form', 'novalidate']) }}

                {{ Field::text('full_name') }}

                {{ Field::textarea('description',null,['placeholder'=>'Máximo 200 caracteres']) }}

                {{ Field::text('location',null,['placeholder'=>'Máximo 27 caracteres']) }}
                
                {{ Field::text('website_url',null,['placeholder'=>'Máximo 60 caracteres']) }}

                <button type="submit" class="btn btn-primary">Actualizar</button>

                {{ Form::close() }}

           </div>
            <div class="col-md-3">
            </div>
        </div>
    </div> <!-- /container -->

@stop
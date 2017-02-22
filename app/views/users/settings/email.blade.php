@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h1>Editar Perfil</h1>
                <ul class="nav nav-tabs nav-justified">
                    <li role="presentation"><a href="{{ route('settings_profile') }}">Perfil</a></li>
                    <li role="presentation" class="active"><a href="{{ route('settings_email') }}">Email</a></li>
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
                        <p>Al parecer tu cuenta no esta confirmada, te recomendamos revisar tu email (revisa también en la carpeta Spam) para poder agregar Pagos a tu cuenta, copia y pega el códgo <a href="{{route('confirm_email')}}" class="alert-link">Haciendo Click aquí</a></p>
                    </div>
                @endif

                <div class="alert alert-warning" role="alert">
                    <p>Tu nuevo email debe ser confirmado <a href="{{route('confirm_email')}}" class="alert-link">Haciendo Click aquí</a></p>
                </div>

                {{ Form::model($user,['route'=>'settings_email_update', 'method'=>'PUT', 'role'=>'form']) }}

                {{ Field::email('email') }}

                <button type="submit" class="btn btn-primary">Actualizar</button>

                {{ Form::close() }}

           </div>
            <div class="col-md-3">
            </div>
        </div>
    </div> <!-- /container -->

@stop
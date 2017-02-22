@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                @if(!$send_apply and !is_partner(Auth::user()->id))
                    <h1>Solicitud de Partners</h1>
                    <p>Todos los usuarios son bienvenidos, analizaremos tu solicitud y responderemos en un plazo de 24-48 horas.</p>
                    <p>Te enviaremos un email con la respuesta, te recomendamos enviarnos un tweet con el hashtag #MonetizandoConIcerlly a <a href="https://twitter.com/icerlly" target="_blank">@icerlly</a> para saber que ya aplicaste y agilizar el proceso.</p>

                    {{ Form::open(['route'=>'apply_register','method'=>'POST','role'=>'form', 'novalidate']) }}    

                    {{ Field::select('adsense',[''=>'Seleccionar','1'=>'Si', '0'=>'No'],null,['class'=>'form-control']) }}    

                    {{ Field::text('full_name',null,['placeholder'=>'Nombre y apellidos']) }} 

                    {{ Field::text('telephone',null,['placeholder'=>'Teléfono de contacto']) }}    

                    {{ Field::text('account',null,['placeholder'=>'Cuenta pública en twitter']) }}    

                    {{ Form::hidden('username', Auth::user()->username) }}
                    {{ Form::hidden('user_id', Auth::user()->id) }}    

                    <button type="submit" class="btn btn-primary">Enviar</button>    

                    {{ Form::close() }}
                @else
                    </br><div class="alert alert-success" role="alert">Aplicación hecha, te enviaremos un tweet y un email cuando se apruebe.</div>
                @endif
                

           </div>
            <div class="col-md-3">
            </div>
        </div>
    </div> <!-- /container -->

@stop
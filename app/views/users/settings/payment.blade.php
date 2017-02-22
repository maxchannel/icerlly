@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h1>Editar Pagos</h1>
                <ul class="nav nav-tabs nav-justified">
                    <li role="presentation"><a href="{{ route('settings_profile') }}">Perfil</a></li>
                    <li role="presentation"><a href="{{ route('settings_password') }}">Contraseña</a></li>
                    <li role="presentation"><a href="{{ route('settings_avatar') }}">Avatar</a></li>
                    <li role="presentation" class="active"><a href="{{ route('settings_payment') }}">Pagos</a></li>
                </ul></br>

                @if(!is_partner(Auth::user()->id))
                    <div class="alert alert-danger" role="alert">
                        <p>Para poder agregar y modificar pagos necesitas enviar una aplicación de partners.</br> <a href="{{route('apply')}}" class="alert-link">Aplicar Ahora</a></p>
                    </div>
                @else
                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session::get('message') }}
                        </div>
                    @endif     

                    @if(isnt_confirmed(Auth::user()->id))
                        <div class="alert alert-danger" role="alert">
                            <p>Al parecer tu cuenta no esta confirmada, te recomendamos revisar tu email (revisa también en la carpeta Spam) para poder agregar Pagos a tu cuenta, copia y pega el códgo.</p>
                        </div>
                    @else
                        <div class="alert alert-warning" role="alert">
                            <p>Toma en cuenta que cada vez que modifiques tu número, tendrá que ser aprobado para poder mostrar anuncios. Contacto: <a href="https://twitter.com/icerlly" target="_blank"class="alert-link">@icerlly</a></p>
                        </div>
                        <div class="alert alert-info" role="alert">
                            <p>Para el Adsense editor number:</p>
                            <p>1.- Inicia sesión en: <a href="http://www.google.com/intl/es/adsense/start/" target="_blank">www.google.com/adsense</a></p>
                            <p>2.- Ve a: Configuración-->Cuenta-->Información sobre la cuenta</p>
                            <p>3.- Copia y pega el ID de editor en este formulario</p>
                        </div>   
                        <div class="alert alert-info" role="alert">
                            <p>Para el Adsense ad id:</p>
                            <p>1.- Inicia sesión en: <a href="http://www.google.com/intl/es/adsense/start/" target="_blank">www.google.com/adsense</a></p>
                            <p>2.- Ve a: Mis anuncios-->Nuevo bloque de anuncios-->Crea un auncio Adaptable (IMPORTANTE QUE SEA Adaptable)</p>
                            <p>3.- Vuelve a Mis anuncios y copia el ID de ese anuncio y pegalo en este formulario</p>
                        </div>   

                        @if(Auth::user()->payment->approved != 0)
                            <p>Estado actual: <span class="label label-success">Aprobado</span></p>
                        @else
                             <p>Estado actual: <span class="label label-danger">No Aprobado</span></p>
                        @endif

                        {{ Form::model($payment,['route'=>'settings_payment_update', 'method'=>'PUT', 'role'=>'form', 'novalidate']) }}         

                        {{ Field::text('adsense_editor_number',null,['placeholder'=>'Máximo 100 caracteres']) }}

                        {{ Field::text('adsense_ad_id',null,['placeholder'=>'Máximo 100 caracteres']) }}               

                        <button type="submit" class="btn btn-primary">Actualizar</button>         

                        {{ Form::close() }}
                    @endif

                @endif

           </div>
            <div class="col-md-3">
            </div>
        </div>
    </div> <!-- /container -->

@stop

@section('add_script')
<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
@stop
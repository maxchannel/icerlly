@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h1>Primer Paso</h1>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>¿Quieres probar el sistema de microblogging?</h3>
                        <a href="{{ route('share') }}" class="btn btn-success">Enviar Tweet</a>
                        <h3>¿Ya tienes Cuenta de Adsense?</h3>
                        <a href="{{ route('apply') }}" class="btn btn-success">Aplicar para Partner</a>
                        <h3>Ver que crean otros usuarios</h3>
                        <a href="{{ route('discover') }}" class="btn btn-success">Explorar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div> <!-- /container -->

@stop
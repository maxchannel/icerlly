@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h1>Bienvenido</h1>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Ya eres parte de Icerlly</h3>
                        <p>Podrás monetizar todo el contenido que crees en nuestra plataforma.</p>
                        <p>Dicen que en Icerlly se puede hacer todo lo siguiente:</p>
                        <ul>
                            <li>Tuitear a 180 caracteres y monetizar</li>
                            <li>Hacer Tuitazos… y que te los paguen</li>
                            <li>Dejar de ser “Influencer" y empieza a Monetizar el contenido</li>
                            <li>Ganar dinero en tu tiempo libre</li>
                            <li>Trabajar desde tu casa... en internet</li>
                        </ul>
                        <p>¿Será? Compruebalo y cuéntanos!</p>
                        <p>Ahora da siguiente para tomar alguna acción :)</p>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('welcome_action') }}" class="btn btn-primary">Siguiente</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div> <!-- /container -->

@stop
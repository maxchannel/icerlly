@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h1>Lista de Funciones</h1>
                <a class="btn btn-success" href="{{ route('signup') }}" role="button">Registrarse</a></br></br>
                <p>Icerlly esta en beta.</p>
                <p>Elaboramos esta lista para que conoscas un poco las funciones que estan por venir al sitio.</p>
                <p>Preguntas, Comentarios y Sugerencias son bienvenidas:</p>
                <a href="https://twitter.com/icerlly" target="_blank">@icerlly</a>
                <h3>Coming Soon...</h3>
                <ul>
                    <li>Incorporación de Hashtag</li>
                    <li>Buscador de Posts</li>
                    <li>Notificaciones</li>
                    <li>Descubrir</li>
                    <li>Mensajes Privados</li>
                    <li>Cuentas Privadas</li>
                    <li>iOS & Android apps</li>
                    <li>Sandbox para todas tus cosas</li>
                    <li>Integración de Videos (Youtube, Vimeo & Dailymotion)</li>
                    <li>Compresión de Imágenes</li>
                    <li>Respuesta a Posts</li>
                </ul>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div> <!-- /container -->

@stop
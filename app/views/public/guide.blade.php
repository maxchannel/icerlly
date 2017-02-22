@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h1>Guía para el uso de Icerlly</h1>
                <a class="btn btn-success" href="{{ route('signup') }}" role="button">Registrarse</a></br></br>
                <p>La siguiente es una lista de preguntas frecuentes y tips que te damos para que el uso de la plataforma sea la optima.</p>
                <h3>¿Qué Necesito?</h3>
                <p>Registrarte y una cuenta en Google Adsense, si ya tienes las 2 cosas tienes el camino recorrido para empezar.</p>
                <h3>¿Contrato?</h3>
                <p>Icerlly es gratis, no requiere contrato.</p>
                <h3>¿Eres Influencer?</h3>
                <p>Dejamos atras el concepto de "influencer" para que pases directamente a monetizar el contenido que crees, entre más creativo... mejor.</p>
                <p>Dejémonos de cosas de si eres o no influencer, aquí monetizas tu contenido y punto.</p>
                <h3>¿Cómo cobro mis pagos?</h3>
                <p>Como puedes usar aquí mismo tu cuenta de Adsense entonces el pago se hara directamente a tu cuenta bancaria configurada en Adsense.</p>
                <h3>¿Cómo se ve una cuenta en Icerlly?</h3>
                <p>El siguiente es el perfil del Fundador: <a href="{{ route('profile', ['max']) }}">@max</a></p>
                <h3>¿Quíen me pagará?</h3>
                <p>Los anunciantes a traves del programa Google Adsense.</p>
                <h3>¿Cómo consigo que mi contenido sea más visto?</h3>
                <p>Tenemos un sistema para compartir tus tweets directamente en Twitter, pero puedes promocionar tu cuenta en Facebook, Reddit, YouTube, entre más gente te conozca mejor.</p>
                <p>La clave es compartir el contenido en tus redes sociales más conocidas. Recomendamos usar los botones sociales que hemos integrado.</p>
                <h3>¿Cómo me registro en Icerlly.com?</h3>
                <a class="btn btn-success" href="{{ route('signup') }}" role="button">Click Aquí</a></br></br></br>
            </div>
           <div class="col-md-3">
            </div>
        </div>
    </div> <!-- /container -->

@stop
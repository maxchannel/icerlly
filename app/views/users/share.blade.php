@extends('layouts.master')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h1>Comparte un Tweet</h1>
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="{{ route('share') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Tweet</a></li>
                    <li role="presentation"><a href="{{ route('share_image') }}"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Imágen</a></li>
                </ul></br>

                {{ Form::open(['route'=>'share_post', 'method'=>'POST', 'role'=>'form', 'novalidate']) }}
                <div class="form-group">
                    {{ Form::textarea('post', null, ['class'=>'form-control post-area', 'placeholder'=>'Máximo 180 caracteres']) }}
                    {{ $errors->first('post', '</br><div class="alert alert-danger" role="alert"><p>:message</p></div>') }}
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
                {{ Form::close() }}

                </br><p class="pro-tip"><span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span> ProTip: Compartir lo posteado en facebook y twitter te dara más visibilidad dentro de la plataforma.</p>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div> <!-- /container -->
@stop
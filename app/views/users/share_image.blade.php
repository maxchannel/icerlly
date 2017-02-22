@extends('layouts.master')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h1>Comparte un Imágen</h1>
                <ul class="nav nav-pills">
                    <li role="presentation"><a href="{{ route('share') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Tweet</a></li>
                    <li role="presentation" class="active"><a href="{{ route('share_image') }}"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Imágen</a></li>
                </ul></br>

                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('message') }}
                    </div>
                @endif

                {{ Form::open(['route'=>'share_image_post', 'method'=>'POST', 'role'=>'form', 'novalidate', 'enctype' => 'multipart/form-data']) }}
                <div class="form-group">
                    {{ Form::file('file',['accept' => 'image/*']) }}
                </div>
                <div class="form-group">
                    {{ Form::textarea('post', null, ['class'=>'form-control post-area', 'placeholder'=>'Máximo 180 caracteres']) }}
                    </br>
                    @if($errors->has())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert"><p>{{ $error }}</p></div>
                        @endforeach
                    @endif
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
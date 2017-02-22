@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8" ng-app="IcerllyApp">
                <h1>Email</h1>
                <ul class="nav nav-tabs nav-justified">
                    <li role="presentation"><a href="{{ route('admin') }}">Home</a></li>
                    <li role="presentation"><a href="{{ route('admin_partners') }}">Aplicación</a></li>
                    <li role="presentation"><a href="{{ route('admin_numbers') }}">Editores</a></li>
                    <li role="presentation" class="active"><a href="{{ route('admin_email') }}">Email</a></li>
                    <li role="presentation"><a href="{{ route('admin_users') }}">Usuarios</a></li>
                    <li role="presentation"><a href="{{ route('admin_marketing') }}">Marketing</a></li>
                </ul></br>

                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('message') }}
                    </div>
                @endif

                <h3>Email:</h3>

                {{ Form::open(['route'=>'admin_email_send', 'method'=>'POST', 'role'=>'form']) }}
                <label>contacto@icerlly.com</label>
                {{ Field::text('to',null,['placeholder'=>'To']) }}
                {{ Field::text('subject',null,['placeholder'=>'Subject']) }}
                {{ Field::textarea('content',null,['placeholder'=>'Content']) }}
                </br><button type="submit" class="btn btn-primary">Enviar</button>
                {{ Form::close() }}

           </div>
            <div class="col-md-2">
            </div>
        </div>
    </div> <!-- /container -->

@stop

@section('add_script')
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
{{ HTML::script('assets/js/xcode.js') }}
@stop
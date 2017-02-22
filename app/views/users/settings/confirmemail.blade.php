@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h1>Confirmación de Email</h1>

                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('message') }}
                    </div>
                @endif

                @if(isnt_confirmed(Auth::user()->id))
                    {{ Form::open(['route'=>'confirm_email_update','method'=>'PUT','role'=>'form']) }}

                    <div class="form-group">
                        <label>email: {{ Auth::user()->email }}</label>
                    </div>    

                    {{ Field::text('key') }}    

                    {{ Form::hidden('user_id', Auth::user()->id) }}    

                    <button type="submit" class="btn btn-primary">Confirmar</button>    

                    {{ Form::close() }}
                @else
                    <div class="alert alert-success" role="alert">Tu cuenta ya esta confirmada.</div>
                    <a href="{{ route('settings_profile') }}" class="btn btn-primary">Volver</a>
                @endif
                

           </div>
            <div class="col-md-3">
            </div>
        </div>
    </div> <!-- /container -->

@stop
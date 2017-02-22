@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8" ng-app="IcerllyApp">
                <h1>Payment</h1>
                <ul class="nav nav-tabs nav-justified">
                    <li role="presentation"><a href="{{ route('admin') }}">Home</a></li>
                    <li role="presentation"><a href="{{ route('admin_partners') }}">Aplicación</a></li>
                    <li role="presentation" class="active"><a href="{{ route('admin_numbers') }}">Editores</a></li>
                    <li role="presentation"><a href="{{ route('admin_email') }}">Email</a></li>
                    <li role="presentation"><a href="{{ route('admin_users') }}">Usuarios</a></li>
                    <li role="presentation"><a href="{{ route('admin_marketing') }}">Marketing</a></li>
                </ul></br>

                <h3>Estadísticas:</h3>
                <p>Pagos aprobados: {{ $conteo_payments }}</p>

                <h3>Editor Number:</h3>
                <table class="table table-hover" ng-controller="SearchCtrl">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Adsense</th>
                            <th>Anuncio ID</th>
                            <th>Approved</th>
                            <th>Aprobar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                    <tr>
                          <th scope="row">{{{ $payment->id }}}</th>
                          <td><a href="{{ route('profile',$payment->user->username) }}" target="_blank">{{$payment->user->username}}</a></td>
                          <td>{{{ $payment->adsense_editor_number }}}</td>
                          <td>{{{ $payment->adsense_ad_id }}}</td>
                          <td>{{{ $payment->approved }}}</td>
                          <td><a href="" class="font-icon share-fav-active" ng-click="numbA({{{ $payment->id }}})"><span class="glyphicon glyphicon-ok"></span></a> </td>
                    </tr> 
                    @endforeach
                    </tbody>
                </table>
                {{ $payments->links() }}

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
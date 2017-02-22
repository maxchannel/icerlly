@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8" ng-app="IcerllyApp">
                <h1>Partners</h1>
                <ul class="nav nav-tabs nav-justified">
                    <li role="presentation"><a href="{{ route('admin') }}">Home</a></li>
                    <li role="presentation" class="active"><a href="{{ route('admin_partners') }}">Aplicación</a></li>
                    <li role="presentation"><a href="{{ route('admin_numbers') }}">Editores</a></li>
                    <li role="presentation"><a href="{{ route('admin_email') }}">Email</a></li>
                    <li role="presentation"><a href="{{ route('admin_users') }}">Usuarios</a></li>
                    <li role="presentation"><a href="{{ route('admin_marketing') }}">Marketing</a></li>
                </ul></br>

                <h3>Estadísticas:</h3>
                <p>Partners: {{ $conteo_partners}}</p>
                <p>Aplicaciones: {{ $conteo_applies}}</p>

                <h3>Aplicaron:</h3>
                <table class="table table-hover" ng-controller="SearchCtrl">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fullname</th>
                            <th>Username</th>
                            <th>Telephone</th>
                            <th>Twitter</th>
                            <th>Adsense</th>
                            <th>Aprobar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($applies as $apply)
                    <tr>
                          <th scope="row">{{{ $apply->id }}}</th>
                          <td>{{{ $apply->full_name }}}</td>
                          <td><a href="{{ route('profile',$apply->username) }}" target="_blank">{{$apply->username}}</a></td>
                          <td>{{{ $apply->telephone }}}</td>
                          <td>{{{ $apply->account }}}</td>
                          <td>{{{ $apply->adsense }}}</td>
                          <td><a href="" class="font-icon share-fav-active" ng-click="xCode({{$apply->user_id}},{{$apply->id}})"><span class="glyphicon glyphicon-ok"></span></a> </td>
                    </tr> 
                    @endforeach
                    </tbody>
                </table>
                {{ $applies->links() }}

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
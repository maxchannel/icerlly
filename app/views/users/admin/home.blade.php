@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <h1>Admin Panel</h1>
                <ul class="nav nav-tabs nav-justified">
                    <li role="presentation" class="active"><a href="{{ route('admin') }}">Home</a></li>
                    <li role="presentation"><a href="{{ route('admin_partners') }}">Aplicación</a></li>
                    <li role="presentation"><a href="{{ route('admin_numbers') }}">Editores</a></li>
                    <li role="presentation"><a href="{{ route('admin_email') }}">Email</a></li>
                    <li role="presentation"><a href="{{ route('admin_users') }}">Usuarios</a></li>
                    <li role="presentation"><a href="{{ route('admin_marketing') }}">Marketing</a></li>
                </ul></br>

                <h3>Estadísticas:</h3>
                <p>Usuarios: {{$conteo}}</p>
                <p>Admins: {{$admins_count}}</p>

                <h3>Últimos registros:</h3>
                <table class="table table-hover" ng-controller="SearchCtrl">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fullname</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                          <th scope="row">{{{ $user->id }}}</th>
                          <td>{{{ $user->full_name }}}</td>
                          <td><a href="{{ route('profile',$user->username) }}" target="_blank">{{$user->username}}</a></td>
                    </tr> 
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}

           </div>
            <div class="col-md-2">
            </div>
        </div>
    </div> <!-- /container -->

@stop
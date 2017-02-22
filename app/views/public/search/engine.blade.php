@extends('layouts.master')


@section('content')
    <div class="container" ng-app="IcerllyApp" >
        <div class="row" ng-controller="SearchCtrl">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h1>Busqueda:</h1>

                <ul class="nav nav-tabs nav-justified">
                    <li role="presentation" class="active"><a href="@{{ route('search') }}">Personas</a></li>
                    <li role="presentation"><a href="{{ route('search_t') }}">Tweets</a></li>
                </ul></br>

                @{{ searchInput }}
                <input type="text" class="form-control" ng-model="searchInput" ng-change="search()">
                </br>
                <div class="list-group" ng-repeat="user in users">
                    <a href="../@{{ user.username }}" class="list-group-item">
                        <h4 class="list-group-item-heading">@{{ user.full_name }}</h4>
                        <p class="list-group-item-text">@{{ user.description }}</p>
                    </a>
                </div>

            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div> <!-- /container -->
@stop

@section('add_script')
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
{{ HTML::script('assets/js/search.js') }}
@stop
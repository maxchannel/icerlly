@extends('layouts.master')

@section('add_head_script')
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<link href="{{ asset('assets/css/icon.min.css') }}" rel="stylesheet">
@stop

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">{{{ $user->full_name }}}</h4>
             </div>
             <div class="modal-body">
                <img src="{{ asset('images/avatar/'.$user->avatar->name) }}" class="profile-avatar" />
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
           </div>
         </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10 skycrapper">
                <!-- Ad -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if($user->payment->approved != 0)
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-{{ $user->payment->adsense_editor_number }}"
                             data-ad-slot="{{ $user->payment->adsense_ad_id }}"
                             data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                        @else
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8002585975415354"
                             data-ad-slot="6509110537"
                             data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                        @endif

                    </div>
                </div>
                <!-- Ad -->
            </div>
            <div class="col-md-1">
            </div>
        </div>

        <div class="row">

            <div class="col-xs-12 col-sm-4 col-md-3" >
                <!-- Profile & description -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row" ng-app="IcerllyApp">
                            <div class="col-xs-12 col-sm-12 col-md-12" >
                                <a href="" data-toggle="modal" data-target="#myModal"><img src="{{ asset('images/avatar/'.$user->avatar->name) }}" class="profile-avatar" /></a>
                                <p class="post-content"><a href="{{ route('profile', [$user->username]) }}">{{{ $user->full_name }}}</a></p>
                                <p>@{{{ $user->username }}}</p>

                                @if(Auth::check() and Auth::user()->id != $user->id and $ifFollow == false)
                                    <p ng-controller="SearchCtrl" >
                                        <button ng-init="unfollow = false" ng-show='unfollow' class="btn btn-danger" ng-click="unfollowUser({{Auth::user()->id}},{{$user->id}})">Unfollow</button>
                                        <button ng-init="unfollow = false" ng-hide='unfollow' class="btn btn-primary" ng-click="followUser({{Auth::user()->id}},{{$user->id}})">Follow</button>
                                    </p>
                                @elseif(Auth::check() and Auth::user()->id != $user->id and $ifFollow == true)
                                    <p ng-controller="SearchCtrl" >
                                        <button ng-init="unfollow = true" ng-show='unfollow' class="btn btn-danger" ng-click="unfollowUser({{Auth::user()->id}},{{$user->id}})">Unfollow</button>
                                        <button ng-init="unfollow = true" ng-hide='unfollow' class="btn btn-primary" ng-click="followUser({{Auth::user()->id}},{{$user->id}})">Follow</button>
                                    </p>
                                @elseif(!Auth::check() and $ifFollow == 'no')
                                    <p><a href="{{ route('login') }}" class="btn btn-primary">Seguir</a></p>
                                @endif

                                <p>{{{ $user->description }}}</p>
                                @if($user->location != "")
                                    <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> {{{ $user->location }}}</p>
                                @endif
                                @if($user->website_url != "")
                                    <p><span class="glyphicon glyphicon-link" aria-hidden="true"></span> <a href="{{ $user->website_url }}" target="_blank" >{{ $user->website_url }}</a></p>
                                @endif
                                <p><span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                    Se unió 
                                    <script>
                                    moment.locale("es");
                                    document.writeln(moment.utc("{{ $user->created_at }}", "YYYYMMDD hh:mm:ss").fromNow());
                                    </script>
                                </p>
                                <p>Followers: <a href="{{ route('followers', [$user->username]) }}">{{{ $user->followers->count() }}}</a></p>
                                <p>Following: <a href="{{ route('following', [$user->username]) }}">{{{ $user->following->count() }}}</a></p>
                                <p>Tweets: {{{ $user->posts->count() }}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Profile & description -->
            </div>

            <div class="col-xs-12 col-sm-8 col-md-6" id="tuits">

                @foreach($followers as $follower)
                    <!-- User -->
                    <div class="panel panel-default post " ng-app="IcerllyApp">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <p class="post-content"><a href="{{ route('profile', [$follower->user->username]) }}"><img src="{{ asset('images/avatar/'.$follower->user->avatar->name) }}" class="post-avatar-indie" /></a> <a href="{{ route('profile', [$follower->user->username]) }}">{{{ $follower->user->full_name }}}</a></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- User -->
                @endforeach
                {{ $followers->links() }}
                
            </div>

            <div class="col-xs-12 col-sm-3 col-md-3 hidden-sm">
                <!-- Login -->
                @if(!Auth::check())
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a class="btn btn-success btn-lg" href="{{route('login')}}" ><span class="glyphicon glyphicon-ice-lolly-tasted" aria-hidden="true"></span> Login</a>
                            <a class="btn btn-default btn-lg" href="{{route('signup')}}" >Signup</a>
                        </div>
                    </div>
                @endif
                <!-- Login -->
                <!-- Ad -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if($user->payment->approved != 0)
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- responsive2 -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-{{ $user->payment->adsense_editor_number }}"
                             data-ad-slot="{{ $user->payment->adsense_ad_id }}"
                             data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                        @else
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- responsive2 -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8002585975415354"
                             data-ad-slot="6509110537"
                             data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                        @endif
                    </div>
                </div>
                <!-- Ad -->
                <!-- Footer -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="{{ route('guide') }}" class="footer-link">Ayuda</a>
                        <a href="{{ route('ads') }}" class="footer-link">Eslogan</a>
                        <a href="{{ route('feature') }}" class="footer-link">Funciones</a>
                    </div>
                </div>
                <!-- Footer -->
            </div>
            </div>
        </div>

    </div> <!-- /container -->
@stop

@section('add_script')
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
{{ HTML::script('assets/js/follow.js') }}
{{ HTML::script('assets/js/infinite.min.js') }}
{{ HTML::script('assets/js/pagInfinite.js') }}
@stop
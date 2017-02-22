@extends('layouts.master')

@section('add_head_script')
<link href="{{ asset('assets/css/icon.min.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10 skycrapper">
                <!-- Ad -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if($post->user->payment->approved != 0)
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-{{ $post->user->payment->adsense_editor_number }}"
                             data-ad-slot="{{ $post->user->payment->adsense_ad_id }}"
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
            <div class="col-md-3">
            </div>
            <div class="col-md-6">

                <!-- Post -->
                <div class="panel panel-default post " ng-app="IcerllyApp">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <p><a href="{{ route('profile', [$post->user->username]) }}"><img src="{{ asset('images/avatar/'.$post->user->avatar->name) }}" class="post-avatar-indie" /></a> <a href="{{ route('profile', [$post->user->username]) }}" class="post-avatar-name">{{ $post->user->full_name }}</a> - <a href="{{ route('post', [$post->user->username, $post->id]) }}" class="post-date">
                                    <script>
                                    moment.locale("es");
                                    document.writeln(moment.utc("{{ $post->created_at }}", "YYYYMMDD hh:mm:ss").fromNow());
                                    </script>
                                </a></p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <p class="post-content">{{{ $post->content }}}</p>
                                @foreach($post->images as $image)
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                         <div class="modal-dialog">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">{{{ $post->user->full_name }}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('images/post/'.$image->name) }}" class="profile-avatar" />
                                                    {{{ $post->content }}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                             </div>
                                         </div>
                                    </div>
                                    <!-- Modal -->
                                    <a href="" data-toggle="modal" data-target="#myModal"><img src="{{ asset('images/post/'.$image->name) }}" class="img-responsive" alt="{{{ $post->content }}}"/></a></br>
                                @endforeach
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <ul class="list-inline" ng-controller="SearchCtrl">

                                    @if(Auth::check())

                                        @if(Auth::user()->id != $post->user->id )
                                            @if(ifFav(Auth::user()->id, $post->id) == false)
                                                <li>
                                                    <a href="" ng-init="unfaved=false" ng-show='unfaved' class="font-icon share-fav-active" ng-click="unfavPost({{Auth::user()->id}},{{$post->id}})"><span class="glyphicon glyphicon-star"></span></a> 
                                                    <a href="" ng-init="unfaved=false" ng-hide='unfaved' class="font-icon share-fav" ng-click="favPost({{Auth::user()->id}},{{$post->id}})"><span class="glyphicon glyphicon-star"></span></a>
                                                </li>
                                            @elseif(ifFav(Auth::user()->id, $post->id) == true)
                                                <li>
                                                    <a href="" ng-init="unfaved=true" ng-show='unfaved' class="font-icon share-fav-active" ng-click="unfavPost({{Auth::user()->id}},{{$post->id}})"><span class="glyphicon glyphicon-star"></span></a> 
                                                    <a href="" ng-init="unfaved=true" ng-hide='unfaved' class="font-icon share-fav" ng-click="favPost({{Auth::user()->id}},{{$post->id}})"><span class="glyphicon glyphicon-star"></span></a>
                                                </li>
                                            @endif        

                                            @if(ifRepost(Auth::user()->id, $post->id) == false)
                                                <li>
                                                    <a href="" ng-init="unrepost=false" ng-show='unrepost' class="font-icon share-repost-active" ng-click="unrePost({{Auth::user()->id}},{{$post->id}})"><span class="glyphicon glyphicon-retweet"></span></a> 
                                                    <a href="" ng-init="unrepost=false" ng-hide='unrepost' class="font-icon share-repost" ng-click="rePost({{Auth::user()->id}},{{$post->id}})"><span class="glyphicon glyphicon-retweet"></span></a>
                                                </li>
                                            @elseif(ifRepost(Auth::user()->id, $post->id) == true)
                                                <li>
                                                    <a href="" ng-init="unrepost=true" ng-show='unrepost' class="font-icon share-repost-active" ng-click="unrePost({{Auth::user()->id}},{{$post->id}})"><span class="glyphicon glyphicon-retweet"></span></a> 
                                                    <a href="" ng-init="unrepost=true" ng-hide='unrepost' class="font-icon share-repost" ng-click="rePost({{Auth::user()->id}},{{$post->id}})"><span class="glyphicon glyphicon-retweet"></span></a>
                                                </li>
                                            @endif
                                        @else
                                            <li><span class="glyphicon glyphicon-star font-icon"></span></li>
                                            <li><span class="glyphicon glyphicon-retweet font-icon"></span></li>
                                        @endif

                                    @else
                                        <li><a href="{{ route('login') }}" class="font-icon share-fav"><span class="glyphicon glyphicon-star"></span></a> </li>
                                        <li><a href="{{ route('login') }}" class="font-icon share-repost"><span class="glyphicon glyphicon-retweet"></span></a></li>
                                    @endif

                                    <li><a class="font-icon share-icon" href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://icerlly.com/{{$post->user->username}}/post/{{$post->id}}','myWindow', 'status = 1, height = 420, width = 820, resizable = 0');"><i class="facebook icon"></i></a></li>
                                    <li><a class="font-icon share-icon" target="_blank" href="https://twitter.com/intent/tweet?url=http://icerlly.com/{{$post->user->username}}/post/{{$post->id}}&amp;via=icerlly&amp;text=Acabo de publicar en Icerlly:&utm_source=self&utm_medium=singlenav&utm_campaign=botontw"><i class="twitter icon"></i></a></li>
                                    <li><a class="fb-send" data-href="http://icerlly.com/{{$post->user->username}}/post/{{$post->id}}" data-colorscheme="light"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Post -->

                <!-- Ad -->
                </br><div class="panel panel-default">
                    <div class="panel-body">
                        @if($post->user->payment->approved != 0)
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- responsive2 -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-{{ $post->user->payment->adsense_editor_number }}"
                             data-ad-slot="{{ $post->user->payment->adsense_ad_id }}"
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
                <!-- Footer -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="{{ route('guide') }}" class="footer-link">Guía</a>
                        <a href="{{ route('ads') }}" class="footer-link">Eslogan</a>
                        <a href="{{ route('feature') }}" class="footer-link">Funciones</a>
                    </div>
                </div>
                <!-- Footer -->
            </div>
            <div class="col-md-3">
            </div>
        </div>
@stop

@section('add_script')
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
{{ HTML::script('assets/js/fav.js') }}
@stop
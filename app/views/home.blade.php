@extends('layouts.master')

@section('add_head_script')
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<link href="{{ asset('assets/css/icon.min.css') }}" rel="stylesheet">
<script>window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));</script>
@stop

@section('content')

    @if(Auth::check())
    <div class="container panel-index">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Estadísticas</h3>
                    </div>
                    <div class="panel-body">
                        <p>Tweets: {{ Auth::user()->posts->count() }}</p>
                        <p>
                            Te uniste:
                            <script>
                            moment.locale("es");
                            document.writeln(moment.utc("{{ Auth::user()->created_at }}", "YYYYMMDD hh:mm:ss").fromNow());
                            </script>
                        </p>
                        @if(!is_partner(Auth::user()->id))
                            <a class="btn btn-success btn-lg" href="{{route('apply')}}" ><span class="glyphicon glyphicon-ice-lolly-tasted" aria-hidden="true"></span> Partners</a>
                        @else
                            @if(Auth::user()->payment->approved != 0)
                            <p>Partner: <span class="label label-success">Con Anuncios</span></p>
                            @else
                                 <p>Partner: <span class="label label-danger">Sin Anuncios</span></p>
                            @endif
                        @endif
                        
                    </div>
                </div>
            </div>

            <div class="col-md-6" id="tuits">

                @foreach($followings as $user)

                    @foreach($user->following->posts as $post)
                        <!-- Post -->
                        <div class="panel panel-default post " ng-app="IcerllyApp">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <p><a href="{{ route('profile', [$post->user->username]) }}"><img src="{{ asset('images/avatar/'.$post->user->avatar->name) }}" class="post-avatar-indie" /></a> <a href="{{ route('profile', [$post->user->username]) }}" class="post-avatar-name">{{ $post->user->full_name }}</a> - <a href="{{ route('post', [$post->user->username, $post->id]) }}" class="post-date">
                                            <?php $dt = Carbon::createFromFormat('Y-m-d H:i:s',$post->created_at); ?>
                                            {{ $dt->diffForHumans() }}
                                        </a></p>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <p class="post-content">{{{ $post->content }}}</p>
                                        @foreach($post->images as $image)
                                        <img src="{{ asset('images/post/'.$image->name) }}" class="img-responsive" alt="{{{ $post->content }}}"/></br>
                                        @endforeach
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <ul class="list-inline" ng-controller="SearchCtrl">
                                            @if(!Auth::check())
                                                <li><a href="{{ route('login') }}" class="share-icon"><span class="glyphicon glyphicon-star"></span></a> </li>
                                                <li><a href="{{ route('login') }}" class="share-icon"><span class="glyphicon glyphicon-retweet"></span></a></li>
                                            @endif        

                                            <li><a class="font-icon share-icon" href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://icerlly.com/{{$post->user->username}}/post/{{$post->id}}','myWindow', 'status = 1, height = 420, width = 820, resizable = 0');"><i class="facebook icon"></i></a></li>
                                            <li><a class="font-icon share-icon" target="_blank" href="https://twitter.com/intent/tweet?url=http://icerlly.com/{{$post->user->username}}/post/{{$post->id}}&amp;via=icerlly&amp;text=Acabo de publicar en Icerlly:&utm_source=self&utm_medium=singlenav&utm_campaign=botontw"><i class="twitter icon"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Post -->
                    @endforeach

                
                @endforeach
                {{ $followings->links() }}

            </div>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Avisos:</h3>
                    </div>
                    <div class="panel-body">
                        <p>Siguientes funciones a implementar:</p>
                        <p>-Respuestas en Post</p>
                        <p>-Descubrir Post</p>
                        <p>-Notificaciones para usuario</p>
                        <p>Siguenos en: <a href="https://twitter.com/icerlly" target="_blank">@icerlly</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /container -->

    @else
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" id="landing">
        <div class="container">
            <h1 class="letter-div">#MonetizaTusTweets</h1>
            <p class="eslogan">
                Icerlly te permite monetizar contenido creado en nuestra red social</br>
            </p>
            <p><a class="btn btn-success btn-lg" href="{{ route('signup') }}" role="button">Empezar a Monetizar</a></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>¿Cómo Funciona?</h2>
                <p>Regístrate y publica post en la plataforma, después aplica para ser parter, nosotros te guiaremos en todo el proceso hasta que tengas una cuenta de AdSense asociada.</p>
                <p><a class="btn btn-default" href="{{ route('signup') }}" role="button">Registrarme</a></p>
            </div>
            <div class="col-md-4">
                <h2>Social Media que te paga</h2>
                <p>Así es, podría decirse que al usar Icerlly te pagamos por usarla, el cuanto crecerás depende directamente de ti, si pasa de ser un hobby a un trabajo :)</p>
                <p><a class="btn btn-default" href="{{ route('signup') }}" role="button">Registrarme</a></p>
           </div>
            <div class="col-md-4">
                <h2>Twitter Empoderado</h2>
                <p>Twiiter se ha quedado atras en cuanto a la monetización del contenido de sus usuarios, caso contrario a YouTube que permite monetizar los videos de sus usuarios, si tienes cuenta en YouTube sabras de que hablamos ;)</p>
                <p><a class="btn btn-default" href="{{ route('signup') }}" role="button">Registrarme</a></p>
            </div>
        </div>
    </div></br><!-- /container -->
    @endif


@stop


@section('add_script')
{{ HTML::script('assets/js/infinite.min.js') }}
{{ HTML::script('assets/js/pagInfinite.js') }}
@stop
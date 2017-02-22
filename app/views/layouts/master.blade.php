<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jumbotron.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    @section('add_head_script')
    @show
</head>
<body>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');    

      ga('create', 'UA-56414420-3', 'auto');
      ga('send', 'pageview');    

    </script>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}"><span class="glyphicon glyphicon-ice-lolly-tasted" aria-hidden="true" style="color: #31E832"></span> Icerlly</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                @if(Auth::check())
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('share') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Share</a></li>
                        <li><a href="{{ route('profile', [Auth::user()->username]) }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a></li>
                        <li><a href="{{ route('discover') }}"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> Descubrir</a></li>
                        <li><a href="{{ route('search') }}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="icon icon-wh i-profile"></span> {{ Auth::user()->full_name }}  <span class="caret"></span>
                            </a>
                            
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('settings_profile') }}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Configuración</a></li>
                                <li><a href="{{ route('settings_payment') }}"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Pagos</a></li>
                                <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <ul class="nav navbar-nav">
                        <!-- <li><a href="{{ route('feature') }}"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> Popular</a></li> -->
                        <li><a href="{{ route('feature') }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Funciones</a></li>
                        <li><a href="{{ route('search') }}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <a href="{{ route('login') }}" class="btn btn-primary"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Login</a>
                        <a href="{{ route('signup') }}" class="btn btn-success">Registrarse</a>
                    </form>
                @endif
            </div><!--/.navbar-collapse -->
        </div>
    </nav>

    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

    @section('add_script')
    @show

</body>
</html>
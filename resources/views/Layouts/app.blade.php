<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Orientation</title>

    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roboto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/creation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loading-bar.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('fonts/glyphicons-halflings-regular.ttf') }}">
    <link rel="shortcut icon" href="{{ asset('fonts/glyphicons-halflings-regular.woff') }}">
    <link rel="shortcut icon" href="{{ asset('fonts/glyphicons-halflings-regular.ttf') }}">
{{-- chargement des sources Turbolink --}}

<!-- angular -->
    <script type="text/javascript" src="{{ asset('js/angular.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/angular-animate.min.js') }}"></script>
    <!-- loading bar -->

    <script type="text/javascript" src="{{ asset('js/loading-bar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/TURBO.js') }}"></script>

    {{-- chargement des sources Turbolink --}}

    {{-- chargement des sources du Chatter --}}
        @yield('css')
    {{-- chargement des sources du Chatter --}}

     {{-- chargement des sources supplémentaires du Chatter changement de vue --}}

        @if(Request::is( Config::get('chatter.routes.home') ) || Request::is( Config::get('chatter.routes.home') . '/*' ))
                    <!-- LINK TO YOUR CUSTOM STYLESHEET -->
             <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        @endif

     {{-- chargement des sources supplémentaires du Chatter changement de vue --}}


    {{-- renomage de nom pour le forum (titre) --}}

         @if( Request::is( Config::get('chatter.routes.home')) )
            <title>Orientation.ci</title>
        @elseif( Request::is( Config::get('chatter.routes.home') . '/' . Config::get('chatter.routes.category') . '/*' ) && isset( $discussion ) )
       <title>{{ $discussion->category->name }} - Orientation.ci</title>
        @elseif( Request::is( Config::get('chatter.routes.home') . '/*' ) && isset($discussion->title))
       <title>{{ $discussion->title }} - Orientation.ci</title>
        @endif

     {{-- renomage de nom pour le forum (titre) --}}
    

</head>
<body  ng-app="LoadingBarExample" ng-controller="ExampleCtrl">
<div id="app">
    <style>#navt{ padding: 0px;} body{padding-top: 50px;}</style>
    <nav id="navt" class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ route('infos_acceuil') }}">Orientation.ci</a>
            </div>


            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="{{ route('infos_news') }}"><span class="glyphicon glyphicon-new-window"></span> Actualites</a></li>
                    <li><a href="{{ route('infos_concours') }}"><span class="glyphicon glyphicon-certificate"></span> Concours</a></li>
                    <li><a href="{{ route('infos_acceuil') }}"><span class="glyphicon glyphicon-user"></span> Acceuil</a></li><li><a href="{{ url('/forums') }}"><span class="glyphicon glyphicon-user"></span> Forum</a></li>
                    {{-- Menu Deroulant 01 --}}
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-list-alt"> Orientation
                                <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('infos_filieres') }}"><span class="glyphicon glyphicon-leaf"> Filieres</a></li>
                            <li><a href="{{ route('infos_ecole') }}"><span class="glyphicon glyphicon-education"></span> Ecole</a></li>
                        </ul>
                    </li>
                    {{-- Menu Deroulant 01 --}}
                    {{-- Menu Deroulant 02 --}}
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-align-justify">
                             Job <span class="caret"></span> </a></span>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('infos_stage') }}"><span class="glyphicon glyphicon-tag"> Stage</a></li>
                            <li><a href="{{ route('infos_emplois') }}"><span class="glyphicon glyphicon-euro"> Emplois</a></li>
                        </ul>
                    </li>
                    {{-- Menu Deroulant 02 --}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest

                        <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> Login</a></li>

                        

                        <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
                    @else

                            {{-- Partie Que seule l'utilisateur peut voir--}}



                            <li class="dropdown">
                                <a id="drop_link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                {{-- Image et style pour la barre de navigation --}}

                                <img id="img_logout" src="avatars/{{ Auth::user()->avatar}}" alt="Users"/>
                                <style>
                                    #drop_link
                                    {
                                        position: relative;
                                        padding-left: 50px;
                                    }
                                    #img_logout
                                    {
                                        width:32px;
                                        height:32px;
                                        position: absolute;
                                        left:10px;
                                        top: 10px;
                                        border-radius:75%;
                                    }
                                </style>

                                {{-- Image et style pour la barre de navigation --}}

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('infos_profil') }}"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
                             
                             <li><a href="{{ route('edit') }}"><span class="glyphicon glyphicon-user"></span> Modifier mon profile</a></li>

                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                   
                                </ul>
                            </li>
                            @endguest

                            {{-- Partie Que seule l'utilisateur peut voir--}}
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

{{-- Gestions||Affichages des vues --}}
@yield('contenu_acceuil')
@yield('contenu_actualites')
@yield('contenu_concours')
@yield('contenu_connection')
@yield('contenu_ecole')
@yield('contenu_emplois')
@yield('contenu_filieres')
@yield('contenu_forum')
@stack('contenu_inscription')
@stack('contenu_stage')
@yield('contenu_stage')
@stack('contenu_profil')

{{-- Gestions||Affichages des vues --}}






<!-- Scripts -->
{{--  <script src="{{ asset('js/app.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
@yield('js')

</body>
</html>

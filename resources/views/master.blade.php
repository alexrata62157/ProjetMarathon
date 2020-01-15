<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Horizon</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="Horizon Logo" href="/ressources/horizon_logo.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="css/normalize.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">

    <!-- 
<link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
 -->

    <!-- Icônes
    <script src="https://kit.fontawesome.com/c51a60e485.js" crossorigin="anonymous"></script>-->
    <link href="/Ressources/fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet">
    <link href="ressources/font/fontawesome/sprites/brands.svg" rel="stylesheet">

</head>
<body>

<!-- Authentication Links -->
<nav>
    <a href="{{route('series.index')}}" title="Series">Séries</a>


        <a href="{{route('accueil')}}">
        <img id="logo" src="{{ url('ressources/horizon_logo.png')  }}" alt="Horizon Logo">
        </a>

        <div class="compte">
    @guest
        <a class="connexion bouton" href="{{ route('login') }}">Login/Register</a>
    @else
        <a href=" {{ route('user') }}">{{ Auth::user()->name }}</a>
        <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                Logout
            </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endguest
    </div>
</nav>


<div id="main">
    @yield('content')
</div>

<footer>
<div>2019 | ©SuperNanas</div>
</footer>
<!-- Scripts -->

<script>
    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>


</body>
</html>
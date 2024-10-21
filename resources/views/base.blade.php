<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/myApp/base.css') }}" rel="stylesheet">
    @yield('style')
  </head>

  <body>
    <div class="container">
        <!-- Barre latérale avec menu hamburger -->
        <div class="sidebar" id="sidebar">
            <span class="hamburger" onclick="toggleMenu()">&#9776;</span>
            <div class="menu" id="menu">
                <a href="{{ route ('acceuil') }}" onclick="showHome()">Acceuil</a>
                <a href="{{ route ('clients') }}" onclick="showClients()">Gestion des Clients</a>
                <a href="{{ route ('contrats') }}" onclick="showContrats()">Gestion des Contrats</a>
                <a href="{{ route ('sinistres') }}" onclick="showSinistres()">Gestion des Sinistres</a>
                <a href="{{ route ('relations') }}" onclick="showRelation()">Relation entre les Clients et les Contrats</a>
                <a href="{{ route ('historiques') }}" onclick="showHistorique()">Historique des Contrats</a>
                <!-- Autres éléments de menu -->
            </div>
        </div>

        <!-- Contenu qui change en fonction des choix de menu -->
        <div class="content" id="content">
        @yield('content')
        </div>
    </div>

    <script src="{{ asset('js/myApp/base.js') }}"></script>
    @yield('js')
</body>
</html>
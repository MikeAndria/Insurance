@extends ('base')
@section('title')
    Acceuil
@endsection

@section('style')
    <link rel='stylesheet' href='{{ asset ("css/myApp/acceuil.css") }}'
@endsection

@section('content')
    <h2>Bienvenue sur l'application de gestion d'assurance</h2>
    <div class="card-container">
        <div class="cards">

            <a href=" {{ route ('clients')}} ">
                <div class="card">
                    <h3>Nombre de Clients</h3>
                    <p>{{ $total_clients}}</p>
                </div>
            </a>

            <a href="{{ route ('contrats')}}">
                <div class="card">
                    <h3>Nombre de Contrats</h3>
                    <p>{{ $total_contrats}}</p>
                </div>
            </a>

            <a href="{{ route ('sinistres')}}">
                <div class="card">
                    <h3>Nombre de Sinistres</h3>
                    <p>{{ $total_sinistres}}</p>
                </div>
            </a>

            <a href="{{ route ('clients_avec_contrat')}}">
                <div class="card">
                    <h3>Clients avec Contrats (%)</h3>
                    <p>{{ $nbr_clientAvecContrat }}%</p>
                </div>
            </a>

            <a href="{{ route ('contrats_vie')}}">
                <div class="card">
                    <h3>Contrats Vie (%)</h3>
                    <p>{{ $nbr_contratsVie }}%</p>
                </div>
            </a>

            <a href="{{ route ('clients_individuel')}}">
                <div class="card">
                    <h3>Clients individuel (%)</h3>
                    <p>{{ $nbr_clientsIndividuel }}%</p>
                </div>
            </a>

            <a href="{{ route ('clients_sans_contrat')}}">
                <div class="card">
                    <h3>Clients sans Contrats (%)</h3>
                    <p>{{ $nbr_clientSansContrat }}%</p>
                </div>
            </a>

            <a href="{{ route ('contrats_non_vie')}}">
                <div class="card">
                    <h3>Contrats non Vie (%)</h3>
                    <p>{{ $nbr_contratsNonVie }}%</p>
                </div>
            </a>

            <a href="{{ route ('clients_groupe')}}">
                <div class="card">
                    <h3>Clients groupe (%)</h3>
                    <p>{{ $nbr_clientsGroupe }}%</p>
                </div>
            </a>

        </div>
    </div>
@endsection



@extends ('base')
@section('title')
    Gestion des clients
@endsection

<!-- Section style css -->
@section('style')
    <link href="{{ asset('css/myApp/add.css' )}}" rel='stylesheet'>
    <link href="{{ asset('css/myApp/delete.css' )}}" rel='stylesheet'>
    <link href="{{ asset('css/myApp/edit.css' )}}" rel='stylesheet'>
@endsection

<!-- Section contenu de la page -->
@section('content')
    <h2>Gestion des Contrats</h2>
    
    <!-- Bouton d'ajout pour ouvrir la modale -->
    <button id="openAddContratModalBtn" class="btn-add">Ajouter</button>

    <!-- Modale -->

    <!-- modale pour ajouter un contrat -->
    <div id="addContratModal" class="add-modal">
        <div class="add-modal-content">
            <span class="close" id="closeAddContratModalBtn">&times;</span>
            <h2>Ajouter un nouveau contrat</h2>
            <!-- Formulaire d'ajout de client -->
            <form id="add-form" action="{{ route ('contrats.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="client_id">Client associé</label>
                    <select id="client_id" name="client_id" required>
                        @foreach ($clients as $client)
                            <option value={{ $client->client_id }}>{{ $client->client_id.'-'.$client->nom.' '.$client->prenom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="type">Type de contrat</label>
                    <select id="type" name="type" required>
                        <option value="vie">Vie</option>
                        <option value="non-vie">Non-Vie</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="date_souscription">Date de souscription</label>
                    <input type="date" id="date_souscription" name="date_souscription" required>
                </div>

                <div class="form-group">
                    <label for="montant_assure">Montant assuré</label>
                    <input type="number" id="montant_assure" name="montant_assure" required>
                </div>

                <div class="form-group">
                    <label for="duree">Dureé</label>
                    <input type="number" id="duree" name="duree" required>
                </div>
                
                <button type="submit" class="btn-save">Ajouter</button>
            </form>
        </div>
    </div>

    
    <!-- modale pour la modification d'un contrat -->
    <div id="editContratModal" class="edit-modal">
        <div class="edit-modal-content">
            <span class="close" id="closeEditContratModalBtn">&times;</span>
            <h2>Modifier le contrat</h2>
            <form id="edit-contrat-form" action="{{ route('contrats.update', 'contrat-id') }}" method="POST">
                @csrf
                @method('PUT') <!-- Spécifie que c'est une requête PUT -->

                <div class="form-group">
                    <label for="client_id">Client associé</label>
                    <select id="client_id" name="client_id" required>
                        <option id='defaul-client-value'></option>
                        @foreach ($clients as $client)
                            <option value={{ $client->client_id }}>{{ $client->client_id.'-'.$client->nom.' '.$client->prenom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="type">Type de contrat</label>
                    <select id="type" name="type" required>
                        <option id='defaul-type-value'></option>
                        <option value="vie">Vie</option>
                        <option value='non-vie'>Non-Vie</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="date_souscription">Date de souscription</label>
                    <input type="date" id="edit-date_souscription" name="date_souscription" required>
                </div>

                <div class="form-group">
                    <label for="montant_assure">Montant assuré</label>
                    <input type="number" id="edit-montant_assure" name="montant_assure" required>
                </div>

                <div class="form-group">
                    <label for="duree">Dureé</label>
                    <input type="number" id="edit-duree" name="duree" required>
                </div>
                
                <button type="submit" class="btn-save">Modifier</button>
            </form>
        </div>
    </div>

    <!-- Fenêtre modale pour la confirmation de suppression -->
    <div id="delete-contrat-modal" class="delete-modal">
        <div class="delete-modal-content">
            <span class="close" onclick="closeContratModal()">&times;</span>
            <p>Êtes-vous sûr de vouloir supprimer ce contrat ?</p>
            <a href="" id="confirm-delete-contrat-link">
                <button>OUI</button>
            </a>
            <button onclick="closeContratModal()">NON</button>
        </div>
    </div>

    <!-- Recherche d'un client -->
    <form action="{{ route ('recherche_contrat') }}" method="GET">
        <div class="search-bar">
        <label for="contrat_id"></label>
        <input type="number" id="contrat_id" name="contrat_id" placeholder="Rechercher un contrat par son numéro..." required>
        <button type="submit">Rechercher</button>
        </div>
    </form>

    <!-- Filtrage-->
    <div class="filter-section">
        <a href="{{ route ('contrats') }}">Tous les contrats</a>
        <a href="{{ route ('contrats_vie') }}">Vie</a>
        <a href="{{ route ('contrats_non_vie') }}">Non-Vie</a>
    </div>

    <!-- Affichage des messages -->
    @if ($message) 
        <h3>{{ $message }}</h3>
    @endif
    
    @if(session('success'))
        <h3>{{ session('success') }}</h3>
    @endif

    <!-- Liste des contrats -->
    <table>
        <thead>
            <tr>
                <th>Numéro du contrat</th>
                <th>Client associé</th>
                <th>Type du contrat</th>
                <th>Montant assuré </br>(en Ariary)</th>
                <th>Date de souscription </br> (j-m-A)</th>
                <th>Durée <br>(en mois)</th>
                <th>Fin du contrat </br> (j-m-A)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contrats as $contrat)
                <tr>
                    <td>{{ $contrat->contrat_id }}</td>
                    <td>{{ $contrat->client->nom.' '.$contrat->client->prenom }}</td>
                    <td>{{ $contrat->type }}</td>
                    <td>{{ $contrat->montant_assure }}</td>
                    <td>{{ $contrat->date_souscription->format('d-m-Y')}}</td>
                    <td>{{ $contrat->duree }}</td>
                    <td>{{ $contrat->date_fin-> format('d-m-Y')}}</td>
                    <td class="action-icons">
                    <button id='openEditContratModalBtn' onclick="openEditContratModalBtn({{ $contrat->contrat_id }}, {{ $contrat->client_id }}, '{{ $contrat->client->nom.' '.$contrat->client->prenom }}', '{{ $contrat->type }}', '{{ $contrat->montant_assure }}', '{{ $contrat->date_souscription}}', {{ $contrat->duree }})">
                        <i class="edit-icon">✏️</i>
                    </button>
                    <button id="delete-contrat" class="delete-icon" data-id="{{ $contrat->contrat_id }}" onclick="confirmDeleteContrat({{ $contrat->contrat_id }})">
                    🗑️
                    </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

<!-- Section script js -->
@section('js')
    <script src="{{ asset('js/myApp/addContrat.js') }}"></script>
    <script src="{{ asset('js/myApp/deleteContrat.js') }}"></script>
    <script src="{{ asset('js/myApp/editContrat.js') }}"></script>
@endsection
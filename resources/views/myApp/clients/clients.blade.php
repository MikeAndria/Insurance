@extends ('base')
@section('title')
    Gestion des clients
@endsection
@section ('style')
    <link href="{{ asset('css/myApp/add.css' )}}" rel='stylesheet'>
    <link href="{{ asset('css/myApp/delete.css' )}}" rel='stylesheet'>
@endsection
@section('content')
    <h2>Gestion des Clients</h2>
    <!-- Bouton d'ajout pour ouvrir la modale -->
    <button id="openAddModalBtn" class="btn-add">Ajouter</button>

    <!-- Modale -->

    <!-- modale pour ajouter un client -->
    <div id="addClientModal" class="add-modal">
        <div class="add-modal-content">
            <span class="close" id="closeAddModalBtn">&times;</span>
            <h2>Ajouter un nouveau client</h2>
            <!-- Formulaire d'ajout de client -->
            <form id="add-form" action="{{ route ('clients.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom(s)</label>
                    <input type="text" id="prenom" name="prenom" required>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" id="adresse" name="adresse" required>
                </div>
                <div class="form-group">
                    <label for="date_naissance">Date de naissance</label>
                    <input type="date" id="date_de_naissance" name="date_de_naissance" required>
                </div>
                <div class="form-group">
                    <label for="type_contrat_souscrit">Type de contrat souscrit</label>
                    <select id="type_contrat_souscrit" name="type_contrat_souscrit" required>
                        <option value="individuel">Individuel</option>
                        <option value="groupe">Groupe</option>
                    </select>
                </div>
                <button type="submit" class="btn-save">Ajouter</button>
            </form>
        </div>
    </div>

    <!-- modale pour la modification d'un client -->
    <div id="editClientModal" class="edit-modal">
        <div class="edit-modal-content">
            <span class="close" id="closeEditModalBtn">&times;</span>
            <h2>Modifier le client</h2>
            <!-- Formulaire d'ajout de client -->
            <form id="edit-client-form" action="{{ route('clients.update', 'client-id') }}" method="POST">
                @csrf
                @method('PUT') <!-- Spécifie que c'est une requête PUT -->
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="edit-nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom(s)</label>
                    <input type="text" id="edit-prenom" name="prenom" required>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" id="edit-adresse" name="adresse" required>
                </div>
                <div class="form-group">
                    <label for="date_naissance">Date de naissance</label>
                    <input type="date" id="edit-date_de_naissance" name="date_de_naissance" required>
                </div>
                <div class="form-group">
                    <label for="type_contrat_souscrit">Type de contrat souscrit</label>
                    <select id="type_contrat_souscrit" name="type_contrat_souscrit" required>
                        <option id='default-value'></option>
                        <option value="individuel">Individuel</option>
                        <option value="groupe">Groupe</option>
                    </select>
                </div>
                <button type="submit" class="btn-save">Modifier</button>
            </form>
        </div>
    </div>

    <!-- Fenêtre modale pour la confirmation de suppression -->
    <div id="delete-modal" class="delete-modal">
        <div class="delete-modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p>Êtes-vous sûr de vouloir supprimer ce client ?</p>
            <a href="" id="confirm-delete-link">
                <button>OUI</button>
            </a>
            <button onclick="closeModal()">NON</button>
        </div>
    </div>

    <!-- Recherche d'un client -->
    <form action="{{ route ('recherche_client') }}" method="GET">
        <div class="search-bar">
        <label for="client_id"></label>
        <input type="number" id="client_id" name="client_id" placeholder="Rechercher un client par son numéro..." required>
        <button type="submit">Rechercher</button>
        </div>
    </form>

    <!-- Filtre -->
    <div class="filter-section">
        <a href="{{ route ('clients') }}">Les clients</a>
        <a href="{{ route ('clients_sans_contrat') }}">Clients sans contrat</a>
        <a href="{{ route ('clients_avec_contrat') }}">Clients avec contrat</a>
        <a href="{{ route ('clients_individuel') }}">Individuel</a>
        <a href="{{ route ('clients_groupe') }}">Groupe</a>
    </div>

    <!-- Affichage des messages -->
    @if ($message) 
        <h3>{{ $message }}</h3>
    @endif
    
    @if(session('success'))
        <h3>{{ session('success') }}</h3>
    @endif

    <!-- Liste des clients -->
    <table>
        <thead>
            <tr>
                <th> Numéro du client </th>
                <th>Nom</th>
                <th>Prénoms</th>
                <th>Adresse</th>
                <th>Date de naissance </br> (j-m-A)</th>
                <th>Type du contrat souscrit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->client_id }}</td>
                    <td>{{ $client->nom }}</td>
                    <td>{{ $client->prenom }}</td>
                    <td>{{ $client->adresse }}</td>
                    <td>{{ $client->date_de_naissance->format('d-m-Y')}}</td>
                    <td>{{ $client->type_contrat_souscrit }}</td>
                    <td class="action-icons">
                    <button id='openEditModalBtn' onclick="openEditModal({{ $client->client_id }}, '{{ $client->nom }}', '{{ $client->prenom }}', '{{ $client->adresse }}', '{{ $client->date_de_naissance}}', '{{ $client->type_contrat_souscrit }}')">
                        <i class="edit-icon">✏️</i>
                    </button>
                    <button id="delete-client" class="delete-icon" data-id="{{ $client->client_id }}" onclick="confirmDelete({{ $client->client_id }})">
                    🗑️
                    </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('js')
    <script src="{{ asset('js/myApp/addClient.js') }}"></script>
    <script src="{{ asset('js/myApp/deleteClient.js') }}"></script>
    <script src="{{ asset('js/myApp/editClient.js') }}"></script>
@endsection


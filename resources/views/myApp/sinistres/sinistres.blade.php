@extends ('base')
@section('title')
    Gestion des Sinistres
@endsection

@section('style')
    <link href="{{ asset('css/myApp/add.css' )}}" rel='stylesheet'>
    <link href="{{ asset('css/myApp/delete.css' )}}" rel='stylesheet'>
    <link href="{{ asset('css/myApp/edit.css' )}}" rel='stylesheet'>
@endsection

@section('content')
    <h2>Gestion des Sinistres</h2>

    <!-- Bouton d'ajout pour ouvrir la modale -->
    <button id="openAddSinistreModalBtn" class="btn-add">Ajouter</button>

    <!-- Modale -->

    <!-- modale pour ajouter un sinistre -->
    <div id="addSinistreModal" class="add-modal">
        <div class="add-modal-content">
            <span class="close" id="closeAddSinistreModalBtn">&times;</span>
            <h2>Ajouter un nouveau sinistre</h2>
            <!-- Formulaire d'ajout de sinistre -->
            <form id="add-form" action="{{ route ('sinistres.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="contrat_id">Contrat associé</label>
                    <select id="contrat_id" name="contrat_id" required>
                        @foreach ($contrats as $contrat)
                            <option value={{ $contrat->contrat_id }}>{{ $contrat->contrat_id.'-'.$contrat->client->nom.' '.$contrat->client->prenom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date_declaration">Date de déclaration</label>
                    <input type="date" id="date_declaration" name="date_declaration" required>
                </div>

                <div class="form-group">
                    <label for="montant_indemnise">Montant indemnisé</label>
                    <input type="number" id="montant_indemnise" name="montant_indemnise" required>
                </div>

                <button type="submit" class="btn-save">Ajouter</button>
            </form>
        </div>
    </div>

    <!-- Recherche d'un client -->
    <form action="{{ route ('recherche_sinistre') }}" method="GET">
        <div class="search-bar">
        <label for="sinistre_id"></label>
        <input type="number" id="sinistre_id" name="sinistre_id" placeholder="Rechercher un sinistre par son numéro..." required>
        <button type="submit">Rechercher</button>
        </div>
    </form>

    <!-- Filtrage-->
    <div class="filter-section">
        <a href="{{ route ('sinistres') }}">Les sinistres</a>
        <a href="#">Non reglé</a>
        <a href="#">Reglé</a>
    </div>

    <!-- Fenêtre modale pour la confirmation de suppression -->
    <div id="delete-sinistre-modal" class="delete-modal">
        <div class="delete-modal-content">
            <span class="close" onclick="closeSinistreModal()">&times;</span>
            <p>Êtes-vous sûr de vouloir supprimer ce sinistre ?</p>
            <a href="" id="confirm-delete-sinistre-link">
                <button>OUI</button>
            </a>
            <button onclick="closeSinistreModal()">NON</button>
        </div>
    </div>

    <!-- modale pour la modification d'un sinistre -->
    <div id="editSinistreModal" class="edit-modal">
        <div class="edit-modal-content">
            <span class="close" id="closeEditSinistreModalBtn">&times;</span>
            <h2>Modifier le sinistre</h2>
            <form id="edit-sinistre-form" action="{{ route('sinistres.update', 'sinistre-id') }}" method="POST">
                @csrf
                @method('PUT') <!-- Spécifie que c'est une requête PUT -->

                <div class="form-group">
                    <label for="contrat_id">Contrat associé</label>
                    <select id="contrat_id" name="contrat_id" required>
                        <option id='defaul-contrat-value'></option>
                        @foreach ($contrats as $contrat)
                            <option value={{ $contrat->contrat_id }}>{{ $contrat->contrat_id.'-'.$contrat->client->nom.' '.$contrat->client->prenom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date_declaration">Date de déclaration</label>
                    <input type="date" id="edit-date_declaration" name="date_declaration" required>
                </div>

                <div class="form-group">
                    <label for="montant_indemnise">Montant indemnisé</label>
                    <input type="number" id="edit-montant_indemnise" name="montant_indemnise" required>
                </div>

                <button type="submit" class="btn-save">Modifier</button>
            </form>
        </div>
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
                <th>Numéro du sinistre</th>
                <th>Numéro du contrat associé</th>
                <th>Client associé</th>
                <th>Montant indemnisé <br> (en Ariary)</th>
                <th>Date de déclaration <br> (j-m-A)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sinistres as $sinistre)
                <tr>
                    <td>{{ $sinistre->sinistre_id }}</td>
                    <td>{{ $sinistre->contrat_id }}</td>
                    <td>{{ $sinistre->contrat->client->nom.' '.$sinistre->contrat->client->prenom }}</td>
                    <td>{{ $sinistre->montant_indemnise }}</td>
                    <td>{{ $sinistre->date_declaration->format('d-m-Y') }}</td>
                    <td class="action-icons">
                    <button id='openEditSinistreModalBtn' onclick="openEditSinistreModalBtn({{ $sinistre->sinistre_id }}, {{ $sinistre->contrat_id }}, '{{ $sinistre->contrat->client->nom.' '.$sinistre->contrat->client->prenom }}', '{{ $sinistre->montant_indemnise }}', '{{ $sinistre->date_declaration}}')">
                        <i class="edit-icon">✏️</i>
                    </button>
                    <button id="delete-sinistre" class="delete-icon" data-id="{{ $sinistre->sinistre_id }}" onclick="confirmDeleteSinistre({{ $sinistre->sinistre_id }})">
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
    <script src="{{ asset('js/myApp/addCSinistre.js') }}"></script>
    <script src="{{ asset('js/myApp/deleteSinistre.js') }}"></script>
    <script src="{{ asset('js/myApp/editSinistre.js') }}"></script>
@endsection
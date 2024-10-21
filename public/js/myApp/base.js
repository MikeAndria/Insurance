 // Fonction pour afficher/masquer le menu avec ajustement du layout
 function toggleMenu() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active');
}
/*
// Affichage de la page d'acceuil
function showHome() {
    document.getElementById('content').innerHTML = `
    <h2>Bienvenue sur l'application de gestion d'assurance</h2>
    <p>Sélectionnez un menu pour commencer à gérer vos clients, contrats, sinistres et bien plus encore.</p>`
}

// Affichage de la gestion des clients
function showClients() {
    document.getElementById('content').innerHTML = `
        <h2>Gestion des Clients</h2>
        <div class="search-bar">
            <input type="text" placeholder="Rechercher un client par nom...">
            <button>Rechercher</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénoms</th>
                    <th>Adresse</th>
                    <th>Date de naissance</th>
                    <th>Type du contrat souscrit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ANDRIAMORASATA</td>
                    <td>Michael Stefany</td>
                    <td>113F Belanitra Ilafy</td>
                    <td>2000-05-24</td>
                    <td>Individuel</td>
                    <td class="action-icons">
                    <a href='#'><i class="edit-icon">✏️</i></a>
                    <a href='#'><i class="delete-icon">🗑️</i></a>
                    </td>
                </tr>
                <!-- Autres clients -->
            </tbody>
        </table>
        <div class="filter-section">
            <a href="#">Clients sans contrat</a>
            <a href="#">Clients avec contrat</a>
            <a href="#">Individuel</a>
            <a href="#">Groupe</a>
        </div>
        `;
}

// Affichage de la gestion des contrats
function showContrats() {
    document.getElementById('content').innerHTML = `
        <h2>Gestion des Contrats</h2>
        <div class="search-bar">
            <input type="text" placeholder="Rechercher un contrat...">
            <button>Rechercher</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Numéro de contrat</th>
                    <th>Client</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>123456</td>
                    <td>Jean Dupont</td>
                    <td>01/01/2023</td>
                    <td>01/01/2024</td>
                    <td class="action-icons">
                        <a href='#'><i class="edit-icon">✏️</i></a>
                        <a href='#'><i class="delete-icon">🗑️</i></a>
                    </td>
                </tr>
                <!-- Autres contrats -->
            </tbody>
        </table>`;
}
*/
function confirmDeleteSinistre(id) {
    document.getElementById("delete-sinistre-modal").style.display = "block"; // Affiche le modal

    // Génère l'URL de suppression avec l'ID du client
    let deleteUrl = `/sinistres/delete/${id}`;

    // Met à jour l'attribut href du bouton de confirmation
    document.getElementById('confirm-delete-sinistre-link').setAttribute('href', deleteUrl);
}

function closeSinistreModal() {
    document.getElementById("delete-sinistre-modal").style.display = "none"; // Cache le modal
}
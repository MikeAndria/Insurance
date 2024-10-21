function confirmDeleteContrat(id) {
    document.getElementById("delete-contrat-modal").style.display = "block"; // Affiche le modal

    // Génère l'URL de suppression avec l'ID du client
    let deleteUrl = `/contrats/delete/${id}`;

    // Met à jour l'attribut href du bouton de confirmation
    document.getElementById('confirm-delete-contrat-link').setAttribute('href', deleteUrl);
}

function closeContratModal() {
    document.getElementById("delete-contrat-modal").style.display = "none"; // Cache le modal
}
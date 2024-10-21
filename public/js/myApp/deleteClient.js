function confirmDelete(id) {
    document.getElementById("delete-modal").style.display = "block"; // Affiche le modal

    // Génère l'URL de suppression avec l'ID du client
    let deleteUrl = `/clients/delete/${id}`;

    // Met à jour l'attribut href du bouton de confirmation
    document.getElementById('confirm-delete-link').setAttribute('href', deleteUrl);
}

function closeModal() {
    document.getElementById("delete-modal").style.display = "none"; // Cache le modal
}

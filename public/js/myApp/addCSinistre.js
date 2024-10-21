
// Récupérer la modale
var sinistre_modal = document.getElementById("addSinistreModal");

// Récupérer le bouton qui ouvre la modale
var btn = document.getElementById("openAddSinistreModalBtn");

// Récupérer l'élément <span> qui ferme la modale
var span = document.getElementById("closeAddSinistreModalBtn");

// Quand l'utilisateur clique sur le bouton, ouvrir la modale
btn.onclick = function() {
    sinistre_modal.style.display = "flex"; // Affiche la modale en tant que flexbox
}

// Quand l'utilisateur clique sur <span> (x), fermer la modale
span.onclick = function() {
    sinistre_modal.style.display = "none";
}

// Quand l'utilisateur clique en dehors de la modale, la fermer
window.onclick = function(event) {
  if (event.target == sinistre_modal) {
    sinistre_modal.style.display = "none";
  }
}
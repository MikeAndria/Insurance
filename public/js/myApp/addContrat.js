
// Récupérer la modale
var contrat_modal = document.getElementById("addContratModal");

// Récupérer le bouton qui ouvre la modale
var btn = document.getElementById("openAddContratModalBtn");

// Récupérer l'élément <span> qui ferme la modale
var span = document.getElementById("closeAddContratModalBtn");

// Quand l'utilisateur clique sur le bouton, ouvrir la modale
btn.onclick = function() {
    contrat_modal.style.display = "flex"; // Affiche la modale en tant que flexbox
}

// Quand l'utilisateur clique sur <span> (x), fermer la modale
span.onclick = function() {
    contrat_modal.style.display = "none";
}

// Quand l'utilisateur clique en dehors de la modale, la fermer
window.onclick = function(event) {
  if (event.target == contrat_modal) {
    contrat_modal.style.display = "none";
  }
}

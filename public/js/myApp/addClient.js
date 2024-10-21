
// Récupérer la modale
var modal = document.getElementById("addClientModal");

// Récupérer le bouton qui ouvre la modale
var btn = document.getElementById("openAddModalBtn");

// Récupérer l'élément <span> qui ferme la modale
var span = document.getElementById("closeAddModalBtn");

// Quand l'utilisateur clique sur le bouton, ouvrir la modale
btn.onclick = function() {
  modal.style.display = "flex"; // Affiche la modale en tant que flexbox
}

// Quand l'utilisateur clique sur <span> (x), fermer la modale
span.onclick = function() {
  modal.style.display = "none";
}

// Quand l'utilisateur clique en dehors de la modale, la fermer
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }s
}

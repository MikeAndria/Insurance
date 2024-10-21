  // Fonction pour ouvrir la popup de modification avec les informations du client
  function openEditModal(client_id, nom, prenom, adresse, date_de_naissance, type_contrat) {
    var date = date_de_naissance.slice(0, 10);
    document.getElementById("editClientModal").style.display = "flex";

    // Pré-remplir le formulaire avec les informations du client
    document.getElementById("edit-nom").value = nom;
    document.getElementById("edit-prenom").value = prenom;
    document.getElementById("edit-adresse").value = adresse;
    document.getElementById("edit-date_de_naissance").value = date;
    document.getElementById("default-value").value = type_contrat;

    document.getElementById("default-value").innerText = type_contrat;
    // Modifier dynamiquement l'URL du formulaire
    var form = document.getElementById("edit-client-form");
    form.action = "/clients/" + client_id; // Mettre l'ID du client dans l'URL
    
    // Récupérer la modale
    var modal = document.getElementById("editClientModal");


    // Récupérer l'élément <span> qui ferme la modale
    var span = document.getElementById("closeEditModalBtn");

    // Quand l'utilisateur clique sur <span> (x), fermer la modale
    span.onclick = function() {
      modal.style.display = "none";
    }

    // Quand l'utilisateur clique en dehors de la modale, la fermer
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }


  }



  // Fonction pour ouvrir la popup de modification avec les informations du sinistre
  function openEditSinistreModalBtn(sinistre_id, contrat_associe, client_associe, montant_indemnise, date_declaration) {
    var date = date_declaration.slice(0, 10);
    document.getElementById("editSinistreModal").style.display = "flex";

    // Pré-remplir le formulaire avec les informations du sinistre
    document.getElementById("edit-date_declaration").value = date;
    document.getElementById("edit-montant_indemnise").value = montant_indemnise;
    document.getElementById("defaul-contrat-value").value = contrat_associe;

    document.getElementById("defaul-contrat-value").innerText = contrat_associe + '-' + client_associe;

    // Modifier dynamiquement l'URL du formulaire
    var form = document.getElementById("edit-sinistre-form");
    form.action = "/sinistres/" + sinistre_id; // Mettre l'ID du sinistre dans l'URL
    
    // Récupérer la modale
    var modal = document.getElementById("editSinistreModal");


    // Récupérer l'élément <span> qui ferme la modale
    var span = document.getElementById("closeEditSinistreModalBtn");

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



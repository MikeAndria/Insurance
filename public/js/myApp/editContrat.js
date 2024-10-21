  // Fonction pour ouvrir la popup de modification avec les informations du contrat
  function openEditContratModalBtn(contrat_id, client_id, client_associe, type, montant_assure, date_souscription, duree) {
    var date = date_souscription.slice(0, 10);
    document.getElementById("editContratModal").style.display = "flex";

    // Pré-remplir le formulaire avec les informations du contrat
    document.getElementById("edit-duree").value = duree;
    document.getElementById("edit-date_souscription").value = date;
    document.getElementById("edit-montant_assure").value = montant_assure;
    document.getElementById("defaul-client-value").value = client_id;
    document.getElementById("defaul-type-value").value = type;
    

    document.getElementById("defaul-client-value").innerText = client_id + '-' + client_associe;
    document.getElementById("defaul-type-value").innerText = type;

    // Modifier dynamiquement l'URL du formulaire
    var form = document.getElementById("edit-contrat-form");
    form.action = "/contrats/" + contrat_id; // Mettre l'ID du contrat dans l'URL
    
    // Récupérer la modale
    var modal = document.getElementById("editContratModal");


    // Récupérer l'élément <span> qui ferme la modale
    var span = document.getElementById("closeEditContratModalBtn");

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



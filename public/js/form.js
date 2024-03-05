// Fonction pour afficher une partie spécifique du formulaire
function afficherPartie(idPartie) {
    // Masquer toutes les parties
    var parties = document.getElementsByClassName("partie");
    for (var i = 0; i < parties.length; i++) {
      parties[i].style.display = "none";
    }
    // Afficher la partie spécifiée
    document.getElementById(idPartie).style.display = "block";
  }
  
  // Fonction pour soumettre le formulaire
  function submitForm() {
    // Ici, vous pouvez ajouter le code pour traiter le formulaire, par exemple, en envoyant les données à un serveur
    alert("Formulaire soumis !");
  }
  
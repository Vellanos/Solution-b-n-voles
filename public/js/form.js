function afficherPartie(idPartie,idPartieOld) {
  var isValid = validateForm(idPartieOld); // Valide le formulaire
  if (isValid) {
    var parties = document.getElementsByClassName("partie");
    for (var i = 0; i < parties.length; i++) {
      parties[i].style.display = "none";
    }
    document.getElementById(idPartie).style.display = "block";
  }
}

function validateForm(idPartieOld) {
  var nom = document.getElementById("nom").value;
  var prenom = document.getElementById("prenom").value;
  var age = document.getElementById("age").value;
  var sexe = document.getElementById("sexe").value;
  var telephone = document.getElementById("telephone").value;
  var email = document.getElementById("email").value;
  var region = document.getElementById("region").value;
  var disponibiliteJour = document.getElementById("disponibilite-jour").value;
  var disponibiliteHoraire = document.getElementById(
    "disponibilite-horaire"
  ).value;
  var expressionLibre = document.getElementById("expression-libre").value;

  var isValid = true;

  // Réinitialiser les messages d'erreur
  document.getElementById("nomError").innerHTML = "";
  document.getElementById("prenomError").innerHTML = "";
  document.getElementById("ageError").innerHTML = "";
  document.getElementById("telephoneError").innerHTML = "";
  document.getElementById("emailError").innerHTML = "";
  document.getElementById("disponibiliteJourError").innerHTML = "";
  document.getElementById("disponibiliteHoraireError").innerHTML = "";
  document.getElementById("expressionLibreError").innerHTML = "";

  
  if (idPartieOld === "partie1") {
    // Validation du nom
    if (nom.length < 3 || nom.length > 30) {
      document.getElementById("nomError").innerHTML =
        "Le nom doit contenir entre 3 et 30 caractères.";
      isValid = false;
    }

    // Validation du prénom
    if (prenom.length < 3 || prenom.length > 30) {
      document.getElementById("prenomError").innerHTML =
        "Le prénom doit contenir entre 3 et 30 caractères.";
      isValid = false;
    }

    // Validation de l'âge
    if (age < 18 || age > 45) {
      document.getElementById("ageError").innerHTML =
        "L'âge doit être compris entre 18 et 45.";
      isValid = false;
    }

    // Validation du numéro de téléphone
    if (telephone.length !== 10) {
      document.getElementById("telephoneError").innerHTML =
        "Le numéro de téléphone doit comporter 10 chiffres.";
      isValid = false;
    }

    // Validation de l'email
    if (!/\S+@\S+\.\S+/.test(email)) {
      document.getElementById("emailError").innerHTML =
        "Veuillez entrer une adresse email valide.";
      isValid = false;
    }
  }

  if (idPartieOld === "partie2") {
    // Validation de la disponibilité jour
    if (disponibiliteJour.length === 0) {
      document.getElementById("disponibiliteJourError").innerHTML =
        "Veuillez sélectionner au moins une option.";
      isValid = false;
    }

    // Validation de la disponibilité horaire
    if (disponibiliteHoraire.length === 0) {
      document.getElementById("disponibiliteHoraireError").innerHTML =
        "Veuillez sélectionner au moins une option.";
      isValid = false;
    }
  }

  if (idPartieOld === "partie2") {
    // Validation de l'expression libre
    if (expressionLibre.length < 30 || expressionLibre.length > 500) {
      document.getElementById("expressionLibreError").innerHTML =
        "L'expression libre doit contenir entre 30 et 500 caractères.";
      isValid = false;
    }
  }

  return isValid;
}

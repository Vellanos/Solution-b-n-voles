function validateForm() {
  var region = document.getElementById("region").value;
  var date = document.getElementById("date").value;
  var eventName = document.getElementById("eventName").value;
  var comment = document.getElementById("comment").value;

  var isValid = true;

  // Réinitialiser les messages d'erreur
  document.getElementById("regionError").innerHTML = "";
  document.getElementById("dateError").innerHTML = "";
  document.getElementById("eventNameError").innerHTML = "";
  document.getElementById("commentError").innerHTML = "";

  // Validation de la région
  if (region === "") {
    document.getElementById("regionError").innerHTML =
      "Veuillez sélectionner une région.";
    isValid = false;
  }

  // Validation de la date
  if (date === "") {
    document.getElementById("dateError").innerHTML =
      "Veuillez sélectionner une date.";
    isValid = false;
  }

  // Validation du nom de l'événement
  if (eventName.length < 3 || eventName.length > 50) {
    document.getElementById("eventNameError").innerHTML =
      "Le nom de l'événement doit contenir entre 3 et 50 caractères.";
    isValid = false;
  }

  // Validation du commentaire
  if (comment === "") {
    isValid = true;
  } else if ((comment.length < 5 && comment.length > 0) || comment.length > 100) {
    document.getElementById("commentError").innerHTML =
      "Le commentaire doit contenir entre 5 et 100 caractères.";
  }

  return isValid;
}

<?php

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Vérification des champs
  $errors = array();

  // Validation du champ nom
  if (empty($_POST["nom"])) {
    $errors[] = "Le champ nom est requis.";
  } else {
    // Nettoyage et validation du champ nom
    $nom = htmlspecialchars($_POST["nom"]);
    // Vous pouvez ajouter d'autres règles de validation ici si nécessaire
  }

  // Validation du champ prénom
  if (empty($_POST["prenom"])) {
    $errors[] = "Le champ prénom est requis.";
  } else {
    // Nettoyage et validation du champ prénom
    $prenom = htmlspecialchars($_POST["prenom"]);
    // Vous pouvez ajouter d'autres règles de validation ici si nécessaire
  }

  // Validation du champ age
  if (empty($_POST["age"])) {
    $errors[] = "Le champ âge est requis.";
  } else {
    // Nettoyage et validation du champ age
    $age = htmlspecialchars($_POST["age"]);
    // Vous pouvez ajouter d'autres règles de validation ici si nécessaire
  }

  // Validation du champ sexe
  if (empty($_POST["sexe"])) {
    $errors[] = "Le champ sexe est requis.";
  } else {
    // Nettoyage et validation du champ sexe
    $sexe = htmlspecialchars($_POST["sexe"]);
    // Vous pouvez ajouter d'autres règles de validation ici si nécessaire
  }

  // Validation du champ téléphone
  if (empty($_POST["telephone"])) {
    $errors[] = "Le champ téléphone est requis.";
  } else {
    // Nettoyage et validation du champ téléphone
    $telephone = htmlspecialchars($_POST["telephone"]);
    // Vous pouvez ajouter d'autres règles de validation ici si nécessaire
  }

  // Validation du champ email
  if (empty($_POST["email"])) {
    $errors[] = "Le champ email est requis.";
  } else {
    // Nettoyage et validation du champ email
    $email = htmlspecialchars($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "L'adresse email n'est pas valide.";
    }
  }

  // Validation du champ région
  if (empty($_POST["region"])) {
    $errors[] = "Le champ région est requis.";
  } else {
    // Nettoyage et validation du champ région
    $region = htmlspecialchars($_POST["region"]);
    // Vous pouvez ajouter d'autres règles de validation ici si nécessaire
  }

  // Validation du champ disponibilité jour
  if (!isset($_POST["disponibilite-jour"]) || !is_array($_POST["disponibilite-jour"])) {
    $errors[] = "Le champ disponibilité jour est requis.";
  } else {
    // Nettoyage et validation du champ disponibilité jour
    $disponibiliteJour = implode(", ", $_POST["disponibilite-jour"]);
    // Vous pouvez ajouter d'autres règles de validation ici si nécessaire
  }

  // Validation du champ disponibilité horaire
  if (!isset($_POST["disponibilite-horaire"]) || !is_array($_POST["disponibilite-horaire"])) {
    $errors[] = "Le champ disponibilité horaire est requis.";
  } else {
    // Nettoyage et validation du champ disponibilité horaire
    $disponibiliteHoraire = implode(", ", $_POST["disponibilite-horaire"]);
    // Vous pouvez ajouter d'autres règles de validation ici si nécessaire
  }

  // Validation du champ post privilégié (facultatif)
  if (isset($_POST["post-privilégie"]) && is_array($_POST["post-privilégie"])) {
    // Nettoyage et validation du champ post privilégié
    $postPrivilégie = implode(", ", $_POST["post-privilégie"]);
    // Vous pouvez ajouter d'autres règles de validation ici si nécessaire
  } else {
    $postPrivilégie = "";
  }

  // Validation du champ expression libre
  if (empty($_POST["expression-libre"])) {
    $errors[] = "Le champ expression libre est requis.";
  } else {
    // Nettoyage et validation du champ expression libre
    $expressionLibre = htmlspecialchars($_POST["expression-libre"]);
    // Vous pouvez ajouter d'autres règles de validation ici si nécessaire
  }

  // Si aucun erreur, enregistrement dans un fichier CSV
  if (empty($errors)) {
    // Création ou ouverture du fichier CSV en mode écriture
    $csvFile = fopen("../chemin/vers/le/fichier/donnees.csv", "a");

    // Création d'une ligne de données à insérer dans le fichier CSV
    // Création d'une ligne de données à insérer dans le fichier CSV
    $data = array(
      $nom,
      $prenom,
      $age,
      $sexe,
      $telephone,
      $email,
      $region,
      $disponibiliteJour,
      $disponibiliteHoraire,
      $postPrivilégie,
      $expressionLibre
    );

    // Écriture de la ligne dans le fichier CSV
    fputcsv($csvFile, $data);

    // Fermeture du fichier CSV
    fclose($csvFile);

    // Redirection vers la page souhaitée après l'enregistrement
    header("Location: ../pageDeContact");
    exit();
  } else {
    // Redirection vers la page du formulaire avec les erreurs
    header("Location: ../form.php?errors=" . urlencode(implode("\n", $errors)));
    exit();
  }
}

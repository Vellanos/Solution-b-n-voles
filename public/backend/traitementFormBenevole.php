<?php
session_start();
require_once './class/benevole.php';
require_once './class/dbEvent.php';

function generateUniqueID($benevoleData) {
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $id_length = 5;
  $id = '';

  do {
    $id = '';
    for ($i = 0; $i < $id_length; $i++) {
        $id .= $characters[rand(0, strlen($characters) - 1)];
    }
    $exists = false;
    foreach ($benevoleData as $benevole) {
      if ($benevole[0] === $id) {
        $exists = true;
        break;
      }
    }
  } while ($exists);

  return $id;
}


function sanitizeInput($input)
{
  return htmlentities($input);
}


if (!empty($_POST) && isset(
  $_POST['nom'],
  $_POST['prenom'],
  $_POST['age'],
  $_POST['sexe'],
  $_POST['telephone'],
  $_POST['email'],
  $_POST['region'],
  $_POST['disponibilite-jour'],
  $_POST['disponibilite-horaire'],
  $_POST['expression-libre'],
)) {

  $nom = sanitizeInput($_POST['nom']);
  $prenom = sanitizeInput($_POST['prenom']);
  $age = sanitizeInput($_POST['age']);
  $sexe = sanitizeInput($_POST['sexe']);
  $telephone = sanitizeInput($_POST['telephone']);
  $email = sanitizeInput($_POST['email']);
  $region = sanitizeInput($_POST['region']);
  $disponibilite_jour = sanitizeInput($_POST['disponibilite-jour']);
  $disponibilite_horaire = sanitizeInput($_POST['disponibilite-horaire']);
  $post_privilegie = isset($_POST['post-privilegie']) ? sanitizeInput($_POST['post-privilegie']) : "";
  $expression_libre = sanitizeInput($_POST['expression-libre']);


  $newDbConnection = new dbEvent('./class/db.csv');
  $benevoleData = $newDbConnection->readFromCsv();

  $csv = $newDbConnection->openCsv();

  $id = generateUniqueID($benevoleData);

  $_SESSION['id'] = $id;

  $newBenevole = new Benevole($id, $nom, $prenom, $age, $sexe, $telephone, $email, $region, $disponibilite_jour, $disponibilite_horaire, $post_privilegie, $expression_libre);

  if ($csv !== false) {

    $newDbConnection->writeIntoCsv($csv, $newBenevole->convertToArray());

    $newDbConnection->closeCsv($csv);

    header("Location: ../pages/codeUnique.php");

    exit;
  }
} else {
  header("Location: ../pages/form.php");
}

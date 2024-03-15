<?php
session_start();
require_once './../backend/class/dbEvent.php';

if (
  isset($_SESSION['benevole']) && !empty($_SESSION['benevole'])) {

  $benevoleData = $_SESSION['benevole'];
  $idEvents = $_SESSION['assignedMissions'];

  $id = $benevoleData[0];
  $nom = $benevoleData[1];
  $prenom = $benevoleData[2];
  $age = $benevoleData[3];
  $sexe = $benevoleData[4];
  $telephone = $benevoleData[5];
  $email = $benevoleData[6];
  $region = $benevoleData[7];
  $disponibilite_jour = $benevoleData[8];
  $disponibilite_horaire = $benevoleData[9];
  $post_privilegie = $benevoleData[10];
  $expression_libre = $benevoleData[11];

  $assignedEvents = [];


  $db = new dbEvent('../backend/class/dbEvent.csv');
  $eventsData = $db->readFromCsv();

  if (!empty($idEvents))
  foreach ($eventsData as $event) {
    if (in_array($event[0], $idEvents)) {
      $assignedEvents[] = $event;
    }
  }
} else {
  echo "Session de bénévole non trouvée. Assurez-vous de vous connecter d'abord.";
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La Colonie</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/info.css">
</head>

<body>
  <?php include("../assets/components/header.php") ?>
  <div class="container mt-5">
    <h1 class="text-center mb-4">Vos informations personnelles</h1>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-body">
            <p class="card-title"><?php echo $nom; ?></p>
            <p class="card-text"><?php echo $prenom; ?></p>
            <p class="card-text"><?php echo $age; ?> ans</p>
            <p class="card-text"><?php echo $sexe; ?></p>
            <p class="card-text">Tel : <?php echo $telephone; ?></p>
            <p class="card-text">Email: <?php echo $email; ?></p>
            <p class="card-text">Région: <?php echo $region; ?></p>
            <p class="card-text">Disponibilité jour: <?php echo $disponibilite_jour; ?></p>
            <p class="card-text">Disponibilité horaire: <?php echo $disponibilite_horaire; ?></p>
            <p class="card-text">Poste privilégié: <?php echo $post_privilegie; ?></p>
            <p class="card-text">Expression libre: <?php echo $expression_libre; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <h2 class="text-center mb-4">Vos missions</h2>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card-wrapper">
          <?php
          foreach ($assignedEvents as $event) {
            echo '<div class="card mb-3" style="width: 18rem;">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $event[3] . '</h5>';
            echo '<h6 class="card-subtitle mb-2 text-body-secondary">' . $event[2] . '</h6>';
            echo '<h6 class="card-subtitle mb-2 text-body-secondary">' . $event[1] . '</h6>';
            echo '<p class="card-text">' . $event[4] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
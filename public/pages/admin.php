<?php

session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/admin.css">
</head>

<body>
    <?php include("../assets/components/header.php") ?>
    <h1>PAGE ADMIN</h1>
    <h2>Liste des évènements</h2>
    <div class="card-wrapper">
        <?php
        require_once '../backend/class/dbEvent.php';

        $db = new dbEvent('../backend/class/dbEvent.csv');

        $eventsData = $db->readFromCsv();

        foreach ($eventsData as $event) {
            echo '<div class="card" style="width: 18rem;">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $event[3] . '</h5>';
            echo '<h6 class="card-subtitle mb-2 text-body-secondary">' . $event[2] . '</h6>';
            echo '<h6 class="card-subtitle mb-2 text-body-secondary">' . $event[1] . '</h6>';
            echo '<p class="card-text">' . $event[4] . '</p>';
            // echo '<a href="#" class="card-link">Voir l\'évènement</a>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="../backend/traitementFormEvent.php">
                    <?php
                    if (isset($_SESSION['errorEvent'])) {
                        echo '<div class="alert alert-danger">' . $_SESSION['errorEvent'] . '</div>';
                        unset($_SESSION['errorEvent']);
                    }
                    ?>
                    <div class="mb-3">
                        <label for="region" class="form-label">Region</label>
                        <select name="region" id="region" class="form-select" required>
                            <option value="">Choisir une région...</option>
                            <option>Auvergne-Rhône-Alpes</option>
                            <option>Bourgogne-Franche-Comté</option>
                            <option>Bretagne</option>
                            <option>Centre-Val de Loire</option>
                            <option>Corse</option>
                            <option>Grand Est</option>
                            <option>Hauts-de-France</option>
                            <option>Île-de-France</option>
                            <option>Normandie</option>
                            <option>Nouvelle-Aquitaine</option>
                            <option>Occitanie</option>
                            <option>Pays de la Loire</option>
                            <option>Provence-Alpes-Côte d'Azur</option>
                        </select>
                        <span id="regionError" class="text-danger"></span><br>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input name="date" type="date" class="form-control" id="date" required>
                        <span id="dateError" class="text-danger"></span><br>
                    </div>
                    <div class="mb-3">
                        <label for="eventName" class="form-label">Nom de l’événement</label>
                        <input name="eventName" type="text" class="form-control" id="eventName" minlength="3" maxlength="50" required>
                        <span id="eventNameError" class="text-danger"></span><br>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Commentaire (falcultatif) </label>
                        <textarea name="comment" class="form-control" id="comment" rows="3" minlength="5" maxlength="100"></textarea>
                        <span id="commentError" class="text-danger"></span><br>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" onclick="validateForm()">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="../js/formEvent.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
<?php
require_once './class/event.php';
require_once './class/dbEvent.php';

if (!empty($_POST) && isset($_POST['region'], $_POST['date'], $_POST['eventName'])) {

    //Sanitiser les données
    $region = htmlspecialchars($_POST['region']);
    $date = htmlspecialchars($_POST['date']);
    $nom = htmlspecialchars($_POST['eventName']);
    $commentaire = htmlspecialchars($_POST['comment']);

    $newDbConnection = new dbEvent('./class/dbEvent.csv');

    $eventsData = $db->readFromCsv();

    $maxId = 0;

// Parcourir les données pour trouver l'ID maximal
foreach ($eventsData as $rowData) {
    // Convertir la valeur de la première colonne en entier
    $id = (int)$rowData[0];
    
    // Mettre à jour l'ID maximal si nécessaire
    if ($id > $maxId) {
        $maxId = $id;
    }
}

    $csv = $newDbConnection->openCsv();

    $newEvent = new Event($maxId, $region, $date, $nom, $commentaire);

    if ($csv !== false) {

        $newDbConnection->writeIntoCsv($csv, $newEvent->convertToArray());

        $newDbConnection->closeCsv($csv);

        header("Location: ../pages/admin.php");

        exit;
    } 
} else {
    header("Location: ../pages/admin.php");
}

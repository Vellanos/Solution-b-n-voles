<?php
require_once './class/event.php';
require_once './class/dbEvent.php';

// print_r($_POST);

if (!empty($_POST) && isset($_POST['region'], $_POST['date'], $_POST['eventName'])) {

    //Sanitiser les données
    $region = htmlspecialchars($_POST['region']);
    $date = htmlspecialchars($_POST['date']);
    $nom = htmlspecialchars($_POST['eventName']);
    $commentaire = htmlspecialchars($_POST['comment']);

    $newDbConnection = new dbEvent('./class/dbEvent.csv');

    $dataEvent = $newDbConnection->readFromCsv();

    $dataEvent = 

    $csv = $newDbConnection->openCsv();

    $newEvent = new Event($id, $region, $date, $nom, $commentaire);

    print_r($dataEvent);

    if ($csv !== false) {

        $newDbConnection->writeIntoCsv($csv, $newEvent->convertToArray());

        $newDbConnection->closeCsv($csv);

        // header("Location: ../pages/admin.php?success");

        exit;
    } 
} else {
    header("Location: ../pages/admin.php?firstcondition");
}

<?php
session_start();
require_once './class/event.php';
require_once './class/dbEvent.php';

function sanitizeInput($input)
{
    return htmlentities($input);
}

function validateForm($region, $date, $eventName, $comment)
{
    $errors = array();

    if (empty($region)) {
        $errors['regionError'] = "Veuillez sélectionner une région.";
    }

    if (empty($date)) {
        $errors['dateError'] = "Veuillez sélectionner une date.";
    }

    if (strlen($eventName) < 3 || strlen($eventName) > 50) {
        $errors['eventNameError'] = "Le nom de l'événement doit contenir entre 3 et 50 caractères.";
    }

    return $errors;
}


if (!empty($_POST) && isset($_POST['region'], $_POST['date'], $_POST['eventName'])) {

    $region = sanitizeInput($_POST['region']);
    $date = sanitizeInput($_POST['date']);
    $eventName = sanitizeInput($_POST['eventName']);
    $comment = sanitizeInput($_POST['comment']);

    $errors = validateForm($region, $date, $eventName, $comment);


    if (empty($errors)) {

        $newDbConnection = new dbEvent('./class/dbEvent.csv');
        $eventsData = $newDbConnection->readFromCsv();

        $maxId = 0;

        foreach ($eventsData as $rowData) {
            $id = (int)$rowData[0];

            if (!empty($id)) {
                if ($id > $maxId) {
                    $maxId = $id;
                }
            }
        }
        $maxId = $maxId + 1;


        $csv = $newDbConnection->openCsv();

        $newEvent = new Event($maxId, $region, $date, $eventName, $comment);

        if ($csv !== false) {

            $newDbConnection->writeIntoCsv($csv, $newEvent->convertToArray());

            $newDbConnection->closeCsv($csv);

            header("Location: ../pages/admin.php");

            exit;
        }
    } else {
        $_SESSION['errorEvent'] = "Error submitting the form.";
        header("Location: ../pages/admin.php");
    }
} else {
    header("Location: ../pages/admin.php");
}

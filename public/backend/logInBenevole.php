<?php
session_start();
require_once './class/dbEvent.php';

if (!empty($_POST) && isset($_POST['UniqueCode'])) {

    $UniqueCode = htmlspecialchars($_POST['UniqueCode']);

    $newDbConnection = new dbEvent('./class/db.csv');
    $benevoleData = $newDbConnection->readFromCsv();

    $newDbMission = new dbEvent('./class/dbMission.csv');
    $missionData = $newDbMission->readFromCsv();

    $validCredentials = false;
    foreach ($benevoleData as $row) {
        $UniqueCodeDb = $row[0];
        if ($UniqueCode === $UniqueCodeDb) {
            $validCredentials = true;
            $_SESSION['benevole'] = $row;
            $assignedMissions = [];
            foreach ($missionData as $mission) {
                if ($mission[1] === $UniqueCodeDb) {
                    $assignedMissions[] = $mission[0];
                }
            }
            $_SESSION['assignedMissions'] = $assignedMissions;

            break;
        }
    }

    if ($validCredentials) {
        //ICI//
        header("Location: ../pages/infoBenevole.php");
        exit;
    } else {
        $_SESSION['errorBenevole'] = "invalid credentials";
        header("Location: ../pages/login.php?test2");
        exit;
    }
} else {
    header("Location: ./../pages/login.php?test");
}

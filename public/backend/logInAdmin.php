<?php
session_start();

if (!empty($_POST) && isset($_POST['username']) && isset($_POST['password'])) {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $secretUsername = "patissier"; // Nom d'utilisateur
    $secretPassword = "kevinleboss"; // Mot de passe


    if ($username === $secretUsername && password_verify($password, password_hash($secretPassword, PASSWORD_DEFAULT))) {

        $_SESSION['admin'] = true;
        // // Détruisez complètement la session
        // session_destroy();
        header("Location: ../pages/admin.php");
        exit;
    } else {

        header("Location: ../pages/login.php");
        exit;
    }
}

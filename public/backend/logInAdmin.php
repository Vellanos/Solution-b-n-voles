<?php
if (!empty($_POST) && isset($_POST['username']) && isset($_POST['password'])) {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $secretUsername = "patissier"; //username à renseigner
    $secretPassword = "kevinleboss"; //mdp admin
    $hashedSecretPassword = password_hash($secretPassword, PASSWORD_DEFAULT);

    if ($username === $secretUsername && $password === $secretPassword) {
        header("Location: ../pages/admin.php?successAdmin=1");
        exit;
    } else {
        header("Location: ../pages/login.php");
        exit;
    }
    
}
?>
<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La colonie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/form.css">
</head>

<body>
    <?php
    include("../assets/components/header.php"); ?>
    <main class="d-flex flex-column align-items-center text-center mt-3">
        <div class="form-wrapper d-flex flex-column gap-4">
            <h1> Bon retour parmis nous !</h1>
            <h2>Si vous êtes admin</h2>
            <?php
            if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }
            ?>
            <form class="d-flex flex-column container justify-content-center align-items-center mb-2 gap-3" method="POST" action="../backend/logInAdmin.php">
                <div class="mb-3">
                    <label for="Username" class="form-label d-flex">Nom d'utilisateur</label>
                    <input type="text" name="username" class="form-control" id="Username">
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label d-flex">Mot de passe</label>
                    <input type="password" name="password" class="form-control" id="Password">
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
            <h2>Si vous êtes bénévole</h2>
            <?php
            if (isset($_SESSION['errorBenevole'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['errorBenevole'] . '</div>';
                unset($_SESSION['errorBenevole']);
            }
            ?>
            <form class="d-flex flex-column container justify-content-center align-items-center gap-3" method="POST" action="../backend/logInBenevole.php">
                <div class="mb-3">
                    <label for="UniqueCode" class="form-label d-flex">Code Unique</label>
                    <input type="password" name="UniqueCode" class="form-control" id="UniqueCode">
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
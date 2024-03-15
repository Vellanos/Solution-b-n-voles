<?php
session_start();

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La colonie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/code.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center mt-5">Félicitations pour votre inscription</h1>
                <div class="card centered-card">
                    <div class="card-body text-center"> <!-- Ajout de la classe text-center -->
                        <h5 class="card-title">Votre identifiant</h5>
                        <?php if (isset($id)) { ?>
                            <p class="card-text"><?php echo $id; ?></p>
                        <?php } else { ?>
                            <p class="card-text">Aucun identifiant trouvé.</p>
                        <?php } ?>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="./login.php" class="btn btn-primary">Aller sur la page de connexion</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
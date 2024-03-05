<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La colonie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include("../assets/components/header.php") ?>
    <h1> Bon retour parmis nous !</h1>

    <div class="form-wrapper">
        <h2>Si vous êtes admin</h2>
        <form action="" method="post">
            <label for="username">Nom d'utilisateur :</label><br>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Mot de passe :</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <button class="form-button" type="submit">Se connecter</button>
        </form>
        <h2>Si vous êtes bénévole</h2>
        <form action="" method="post">
            <label for="unique_code">Code unique :</label><br>
            <input type="text" id="unique_code" name="unique_code" required><br><br>

            <button class="form-button" type="submit">Vérifier</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
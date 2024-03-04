<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La colonie</title>
    <link rel="stylesheet" href="../style/login.css">
</head>

<body>
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

</body>

</html>
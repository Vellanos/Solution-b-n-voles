<?php

session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté en tant qu'admin
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>PAGE ADMIN</h1>

    <form>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <label for="region" class="form-label">Region</label>
                            <select class="form-select" id="region" required>
                                <option value="">Choisir une région...</option>
                                <option>Auvergne-Rhône-Alpes</option>
                                <option>Bourgogne-Franche-Comté</option>
                                <option>Bretagne</option>
                                <option>Centre-Val de Loire</option>
                                <option>Corse</option>
                                <option>Grand Est</option>
                                <option>Hauts-de-France</option>
                                <option>Île-de-France</option>
                                <option>Normandie</option>
                                <option>Nouvelle-Aquitaine</option>
                                <option>Occitanie</option>
                                <option>Pays de la Loire</option>
                                <option>Provence-Alpes-Côte d'Azur</option>
                            </select>
                            <div class="invalid-feedback">Veuillez sélectionner une région.</div>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" required>
                            <div class="invalid-feedback">Veuillez saisir une date.</div>
                        </div>
                        <div class="mb-3">
                            <label for="eventName" class="form-label">Nom de l’événement</label>
                            <input type="text" class="form-control" id="eventName" minlength="3" maxlength="50" required>
                            <div class="invalid-feedback">Veuillez saisir un nom d'événement valide (entre 3 et 50 caractères).</div>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Commentaire</label>
                            <textarea class="form-control" id="comment" rows="3" minlength="5" maxlength="100"></textarea>
                            <div class="invalid-feedback">Veuillez saisir un commentaire valide (entre 5 et 100 caractères).</div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
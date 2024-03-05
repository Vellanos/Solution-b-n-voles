<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La colonie</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
</head>

<body>
  <?php include("../assets/components/header.php") ?>
  <div id="partie1" class="partie">
    <!-- Partie 1 du formulaire -->
    <h2>Partie 1</h2>
    <label for="champ1">Champ 1 :</label>
    <input type="text" id="champ1">
    <!-- Bouton pour passer à la partie suivante -->
    <button onclick="afficherPartie('partie2')">Suivant</button>
  </div>

  <div id="partie2" class="partie" style="display: none;">
    <!-- Partie 2 du formulaire -->
    <h2>Partie 2</h2>
    <label for="champ2">Champ 2 :</label>
    <input type="text" id="champ2">
    <!-- Bouton pour revenir à la partie précédente -->
    <button onclick="afficherPartie('partie1')">Précédent</button>
    <!-- Bouton pour passer à la partie suivante -->
    <button onclick="afficherPartie('partie3')">Suivant</button>
  </div>

  <div id="partie3" class="partie" style="display: none;">
    <!-- Partie 3 du formulaire -->
    <h2>Partie 3</h2>
    <label for="champ3">Champ 3 :</label>
    <input type="text" id="champ3">
    <!-- Bouton de soumission -->
    <button onclick="submitForm()">Submit</button>
    <!-- Bouton pour revenir à la partie précédente -->
    <button onclick="afficherPartie('partie2')">Précédent</button>
  </div>

  <script src="../js/form.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
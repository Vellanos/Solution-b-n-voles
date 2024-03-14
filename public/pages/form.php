<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La colonie</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/form.css">
</head>
</head>

<body>
  <?php include("../assets/components/header.php") ?>
  <main class="d-flex flex-column align-items-center text-center mt-3">
    <div class="form-wrapper d-flex flex-column gap-4">
      <form class="d-flex flex-column container justify-content-center align-items-center mb-2 gap-3" method="POST" action="../backend/traitementFormBenevole.php">

        <!-- PARTIE 1 FORMULAIRE -->
        <h1>Formulaire de bénévole</h1>

        <div id="partie1" class="partie">

          <div class="mb-3">
            <label for="nom" class="form-label d-flex">Nom :</label>
            <input type="text" name="nom" class="form-control" id="nom" required minlength="3" maxlength="30" placeholder="votre nom" class="style">
            <span id="nomError" class="text-danger"></span><br>
          </div>

          <div class="mb-3">
            <label for="prenom" class="form-label d-flex">Prénom :</label>
            <input type="text" name="prenom" class="form-control" id="prenom" required minlength="3" maxlength="30" placeholder="votre prénom">
            <span id="prenomError" class="text-danger"></span><br>
          </div>

          <div class="mb-3">
            <label for="age" class="form-label d-flex">Age :</label>
            <input type="number" name="age" class="form-control" id="age" required minlength="18" maxlength="45" placeholder="votre âge">
            <span id="ageError" class="text-danger"></span><br>
          </div>

          <div class="mb-3">
            <label for="sexe" class="form-label d-flex">Sexe :</label>
            <select name="sexe" id="sexe" class="form-select" required>
              <option value="" disabled selected>séléctionnez votre sexe</option>
              <option value="homme">Homme</option>
              <option value="femme">Femme</option>
              <option value="secret">Secret</option>
            </select>
            <span id="sexeError" class="text-danger"></span><br>
          </div>

          <div class="mb-3">
            <label for="telephone" class="form-label d-flex">Numéro de téléphone :</label>
            <input type="number" name="telephone" class="form-control" id="telephone" required minlength="10" maxlength="10" placeholder="numéro de téléphone">
            <span id="telephoneError" class="text-danger"></span><br>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label d-flex">Adresse email :</label>
            <input type="email" name="email" class="form-control" id="email" required placeholder="votre email">
            <span id="emailError" class="text-danger"></span><br>

          </div>
          <button type="reset" class="btn btn-danger">Rénitialiser</button>
          <button type="button" class="btn btn-primary" onclick="afficherPartie('partie2', 'partie1')">Suivant</button>
        </div>

        <!-- PARTIE 2 FORMULAIRE -->

        <div id="partie2" class="partie" style="display: none;">

          <div class="mb-3">
            <label for="region" class="form-label d-flex">Région :</label>
            <select name="region" id="region" class="form-select" required>
              <option value="" disabled selected>Choisissez...</option>
              <option value="Auvergne-Rhône-Alpes">Auvergne-Rhône-Alpes</option>
              <option value="Bourgogne-Franche-Comté">Bourgogne-Franche-Comté</option>
              <option value="Bretagne">Bretagne</option>
              <option value="Centre-Val de Loire">Centre-Val de Loire</option>
              <option value="Corse">Corse</option>
              <option value="Grand Est">Grand Est</option>
              <option value="Hauts-de-France">Hauts-de-France</option>
              <option value="Île-de-France">Île-de-France</option>
              <option value="Normandie">Normandie</option>
              <option value="Nouvelle-Aquitaine">Nouvelle-Aquitaine</option>
              <option value="Occitanie">Occitanie</option>
              <option value="Pays de la Loire">Pays de la Loire</option>
              <option value="Provence-Alpes-Côte d'Azur">Provence-Alpes-Côte d'Azur</option>
            </select>
            <span id="regionError" class="text-danger"></span><br>
          </div>

          <div class="mb-3">
            <label for="disponibilite-jour" class="form-label d-flex">Disponibilité jour :</label>
            <select name="disponibilite-jour" id="disponibilite-jour" class="form-select" required multiple>
              <option value="semaine">Semaine</option>
              <option value="weekend">Weekend</option>
            </select>
            <span id="disponibiliteJourError" class="text-danger"></span><br>
          </div>

          <div class="mb-3">
            <label for="disponibilite-horaire" class="form-label d-flex">Disponibilité horaire :</label>
            <select name="disponibilite-horaire" id="disponibilite-horaire" class="form-select" required multiple>
              <option value="matin">Matin</option>
              <option value="après-midi">Après-midi</option>
              <option value="soir">Soir</option>
              <option value="nuit">Nuit</option>
            </select>
            <span id="disponibiliteHoraireError" class="text-danger"></span><br>
          </div>

          <div class="mb-3">
            <label for="post-privilegie" class="form-label d-flex">Post privilégié (facultatif) :</label>
            <select name="post-privilegie" id="post-privilegie" class="form-select" multiple>
              <option value="sécurité">Sécurité</option>
              <option value="bar">Bar</option>
              <option value="technique">Technique</option>
              <option value="animation">Animation</option>
            </select>

          </div>
          <button type="button" class="btn btn-primary" onclick="backPartie('partie1')">Précédent</button>
          <button type="reset" class="btn btn-danger" onclick="backPartie('partie1')">Rénitialiser</button>
          <button type="button" class="btn btn-primary" onclick="afficherPartie('partie3', 'partie2')">Suivant</button>
        </div>
        <!-- PARTIE 3 FORMULAIRE -->

        <div id="partie3" class="partie" style="display: none;">
          <div class="mb-3">
            <label for="expression-libre" class="form-label d-flex">Expression libre :</label>
            <textarea name="expression-libre" id="expression-libre" class="form-control" required minlength="30" maxlength="500"></textarea>
            <span id="expressionLibreError" class="text-danger"></span><br>

          </div>
          <button type="button" class="btn btn-primary" onclick="backPartie('partie2')">Précédent</button>
          <button type="reset" class="btn btn-danger" onclick="backPartie('partie1')">Rénitialiser</button>
          <button type="submit" class="btn btn-success" onclick="validateForm('partie3')">S'enregistrer</button>
        </div>

      </form>

    </div>
  </main>

  <script src="../js/form.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
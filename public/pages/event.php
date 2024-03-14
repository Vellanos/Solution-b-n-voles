<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LA colonie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/admin.css">
</head>

<body>
    <?php include("../assets/components/header.php") ?>
    <h2>Assignation de mission</h2>
    <div class="card-wrapper">
        <?php
        require_once '../backend/class/dbEvent.php';
        require_once '../backend/class/mission.php';

        if (isset($_GET['id'])) {
            $eventId = $_GET['id'];

            $db = new dbEvent('../backend/class/dbEvent.csv');

            $eventsData = $db->readFromCsv();

            $filteredEventData = array_filter($eventsData, function ($event) use ($eventId) {
                return $event[0] == $eventId;
            });
            if (!empty($filteredEventData)) {
                foreach ($filteredEventData as $event) {
                    echo '<div class="card" style="width: 18rem;">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $event[3] . '</h5>';
                    echo '<h6 class="card-subtitle mb-2 text-body-secondary">' . $event[2] . '</h6>';
                    echo '<h6 class="card-subtitle mb-2 text-body-secondary">' . $event[1] . '</h6>';
                    echo '<p class="card-text">' . $event[4] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>Aucun événement trouvé avec cet ID.</p>';
            }
        } else {
            header("Location: ./admin.php");
        }
        ?>
    </div>

    <div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["assigner"])) {
                $eventId = $_GET['id'];
                $benevoleId = $_POST['benevole'];
                $mission = new Mission($eventId, $benevoleId);

                $mission->addMission();
            }

            if (isset($_POST["desassigner"])) {
                $eventId = $_GET['id'];
                $benevoleId = $_POST['benevole'];

                $mission = new Mission($eventId, $benevoleId);

                $mission->removeMission();
            }
        }

        $eventId = $_GET['id'];

        $db_benevole = new dbEvent('../backend/class/db.csv');
        $benevolesData = $db_benevole->readFromCsv();

        $db_mission = new dbEvent('../backend/class/dbMission.csv');
        $missionsData = $db_mission->readFromCsv();

        $benevolesInscrits = [];
        foreach ($missionsData as $mission) {
            if ($mission[0] == $eventId) {
                $benevolesInscrits[] = $mission[1];
            }
        }

        echo '<table class="table">';
        echo '<thead><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Age</th><th>Inscription</th><th>Action</th></tr></thead>';
        echo '<tbody>';
        foreach ($benevolesData as $benevole) {
            $inscription = (in_array($benevole[0], $benevolesInscrits)) ? 'Inscrit' : 'Non inscrit';
            echo "<tr><td>$benevole[0]</td><td>$benevole[1]</td><td>$benevole[2]</td><td>$benevole[3]</td><td>$inscription</td>";

            if ($inscription === 'Inscrit') {
                echo "<td>
                    <form method='post'>
                        <input type='hidden' name='benevole' value='$benevole[0]'>
                        <button class='btn btn-danger' type='submit' name='desassigner'>Désassigner</button>
                    </form>
                  </td>";
            } else {
                echo "<td>
                    <form method='post'>
                        <input type='hidden' name='benevole' value='$benevole[0]'>
                        <button class='btn btn-success' type='submit' name='assigner'>Assigner</button>
                    </form>
                  </td>";
            }
            echo "</tr>";
        }
        echo '</tbody>';
        echo '</table>';
        ?>
    </div>

    <div class="text-center mt-4">
        <a href="./admin.php" class="btn btn-primary">Retourner à la page d'administration</a>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
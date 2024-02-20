<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Semaine</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Modifier Semaine</h2>
        <?php
        require_once('../connexion.php'); 
        //var_dump($_GET);

        if (isset($_GET['num']) && is_numeric($_GET['num'])) {
            $numSem = $_GET['num'];
            $sql = "SELECT * FROM semaine WHERE NumSem = $numSem";
            $stmt = $db->query($sql);
            $row = $stmt->fetch();

            if ($row) {
                ?>
                <form method="post" action="modifier_semaine.php">
                    <input type="hidden" name="numSem" value="<?php echo $numSem; ?>">

                    <div class="form-group">
                        <label for="dateDebut">Date de début :</label>
                        <input type="datetime-local" class="form-control" name="nouvelleDateDebut" value="<?php echo date('Y-m-d\TH:i', strtotime($row['DateDebut'])); ?>">
                    </div>

                    <div class="form-group">
                        <label for="dateFin">Date de fin :</label>
                        <input type="datetime-local" class="form-control" name="nouvelleDateFin" value="<?php echo date('Y-m-d\TH:i', strtotime($row['DateFin'])); ?>">
                    </div>

                    <div class="form-group">
                        <label for="session">Session :</label>
                        <select name="nouvelleSession" class="form-control">
                            <?php
                            // Récupérer les informations de la table session
                            $sqlSession = "SELECT Numero, Annee, Sem FROM session";
                            $stmtSession = $db->query($sqlSession);

                            // Remplir la liste déroulante avec les résultats de la requête
                            while ($rowSession = $stmtSession->fetch()) {
                                $selected = ($rowSession['Numero'] == $row['Session']) ? "selected" : "";
                                echo '<option value="' . $rowSession['Numero'] . '" ' . $selected . '>'
                                    . 'Numero ' . $rowSession['Numero'] . '-Annee ' . $rowSession['Annee'] . ' - Sem ' . $rowSession['Sem'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
                <?php
            } else {
                echo "Numéro de semaine non trouvé dans la table Semaine.";
            }
        } else {
            echo "Numéro de semaine invalide.";
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numSem = $_POST['numSem'];
            $nouvelleDateDebut = date('Y-m-d H:i:s', strtotime($_POST['nouvelleDateDebut']));
            $nouvelleDateFin = date('Y-m-d H:i:s', strtotime($_POST['nouvelleDateFin']));
            $nouvelleSession = $_POST['nouvelleSession'];

            $sql = "UPDATE semaine SET 
                    DateDebut = '$nouvelleDateDebut', 
                    DateFin = '$nouvelleDateFin', 
                    Session = '$nouvelleSession' 
                    WHERE NumSem = $numSem";

            $stmt = $db->query($sql);
            if ($stmt) {
                header("Location: AffichierSemaine.php");
            } else {
                echo "Erreur lors de la mise à jour de l'enregistrement.";
            }
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

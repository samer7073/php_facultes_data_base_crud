<!DOCTYPE html>
<html>
<head>
    <title>Modifier ProfSituation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Modifier ProfSituation</h2>
        <?php
        require_once('../connexion.php'); 
        //var_dump($_GET);
        if (isset($_GET['num']) && is_numeric($_GET['num'])) {
            $id = $_GET['num'];
            $sql = "SELECT * FROM ProfSituation WHERE CodeProf = $id";
            $stmt = $db->query($sql);
            $row = $stmt->fetch();

            if ($row) {
                ?>
                <form method="post" action="modifier.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="nouveauGrade">Grade</label>
                        <select class="form-control" name="nouveauGrade">
                            <?php
                            $sqlGrades = "SELECT Grade FROM grades";
                            $stmtGrades = $db->query($sqlGrades);
                            while ($rowGrade = $stmtGrades->fetch()) {
                                $selected = ($rowGrade['Grade'] == $row['Grade']) ? "selected" : "";
                                echo '<option value="' . $rowGrade['Grade'] . '" ' . $selected . '>' . $rowGrade['Grade'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nouvelleSituation">Situation</label>
                        <input type="text" class="form-control" name="nouvelleSituation" value="<?php echo $row['Situation']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nouvelleSession">Session</label>
                        <select class="form-control" name="nouvelleSession">
                            <?php
                            $sqlSessions = "SELECT * FROM Session";
                            $stmtSessions = $db->query($sqlSessions);
                            while ($rowSession = $stmtSessions->fetch()) {
                                $selected = ($rowSession['Numero'] == $row['Sess']) ? "selected" : "";
                                echo '<option value="' . $rowSession['Numero'] . '" ' . $selected . '>' . $rowSession['Annee'] . ' - Sem ' . $rowSession['Sem'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
                <?php
            } else {
                echo "ID non trouvé dans la table ProfSituation.";
            }
        } else {
            echo "ID invalide.";
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nouveauGrade = $_POST['nouveauGrade'];
            $nouvelleSituation = $_POST['nouvelleSituation'];
            $nouvelleSession = $_POST['nouvelleSession'];

            $sql = "UPDATE ProfSituation SET Grade = '$nouveauGrade', Situation = '$nouvelleSituation', Sess = '$nouvelleSession' WHERE CodeProf = $id";
            $stmt = $db->query($sql);
            if ($stmt) {
                header("Location: AfficherProfSituationModiferSupprimer.php");
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

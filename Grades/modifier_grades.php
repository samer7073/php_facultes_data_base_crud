<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Grade</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Modifier Grade</h2>
        <?php
        require_once('../connexion.php'); 

        if (isset($_GET['grade'])) {
            $grade = $_GET['grade'];
            $sql = "SELECT * FROM grades WHERE Grade = '$grade'";
            $stmt = $db->query($sql);
            $row = $stmt->fetch();

            if ($row) {
                ?>
                <form method="post" action="modifier_grades.php">
                    <input type="hidden" name="grade" value="<?php echo $grade; ?>">

                    <div class="form-group">
                        <label for="chargeTP">Charge TP :</label>
                        <input type="text" class="form-control" name="nouvelleChargeTP" value="<?php echo $row['ChargeTP']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="chargeC">Charge C :</label>
                        <input type="text" class="form-control" name="nouvelleChargeC" value="<?php echo $row['ChargeC']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="chargeTD">Charge TD :</label>
                        <input type="text" class="form-control" name="nouvelleChargeTD" value="<?php echo $row['ChargeTD']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="gradeArab">Grade Arabe :</label>
                        <input type="text" class="form-control" name="nouveauGradeArab" value="<?php echo $row['GradeArab']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="chargeCI">Charge CI :</label>
                        <input type="text" class="form-control" name="nouvelleChargeCI" value="<?php echo $row['ChargeCI']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="chargeTotal">Charge Total :</label>
                        <input type="text" class="form-control" name="nouvelleChargeTotal" value="<?php echo $row['ChargeTotal']; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
                <?php
            } else {
                echo "Grade non trouvé dans la table Grades.";
            }
        } else {
            echo "Grade non spécifié.";
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $grade = $_POST['grade'];
            $nouvelleChargeTP = $_POST['nouvelleChargeTP'];
            $nouvelleChargeC = $_POST['nouvelleChargeC'];
            $nouvelleChargeTD = $_POST['nouvelleChargeTD'];
            $nouveauGradeArab = $_POST['nouveauGradeArab'];
            $nouvelleChargeCI = $_POST['nouvelleChargeCI'];
            $nouvelleChargeTotal = $_POST['nouvelleChargeTotal'];

            $sql = "UPDATE grades SET 
                    ChargeTP = '$nouvelleChargeTP', 
                    ChargeC = '$nouvelleChargeC', 
                    ChargeTD = '$nouvelleChargeTD', 
                    GradeArab = '$nouveauGradeArab', 
                    ChargeCI = '$nouvelleChargeCI', 
                    ChargeTotal = '$nouvelleChargeTotal' 
                    WHERE Grade = '$grade'";

            $stmt = $db->query($sql);
            if ($stmt) {
                header("Location: AffichierGrades.php");
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

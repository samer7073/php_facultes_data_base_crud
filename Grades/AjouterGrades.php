<?php
require_once('../connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $grade = $_POST['grade'];
    $chargeTP = $_POST['chargeTP'];
    $chargeC = $_POST['chargeC'];
    $chargeTD = $_POST['chargeTD'];
    $gradeArab = $_POST['gradeArab'];
    $chargeCI = $_POST['chargeCI'];
    $chargeTotal = $_POST['chargeTotal'];

    $sql = "INSERT INTO grades (Grade, ChargeTP, ChargeC, ChargeTD, GradeArab, ChargeCI, ChargeTotal)
            VALUES (:grade, :chargeTP, :chargeC, :chargeTD, :gradeArab, :chargeCI, :chargeTotal)";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':grade', $grade);
    $stmt->bindParam(':chargeTP', $chargeTP);
    $stmt->bindParam(':chargeC', $chargeC);
    $stmt->bindParam(':chargeTD', $chargeTD);
    $stmt->bindParam(':gradeArab', $gradeArab);
    $stmt->bindParam(':chargeCI', $chargeCI);
    $stmt->bindParam(':chargeTotal', $chargeTotal);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">Enregistrement ajouté avec succès.</div>';
        header("Location: AffichierGrades.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">Erreur lors de l\'ajout de l\'enregistrement.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un enregistrement</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Ajouter un enregistrement</h2>
        <form method="post" action="AjouterGrades.php">
            <div class="form-group">
                <label for="grade">Grade :</label>
                <input type="text" name="grade" id="grade" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="chargeTP">Charge TP :</label>
                <input type="text" name="chargeTP" id="chargeTP" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="chargeC">Charge C :</label>
                <input type="text" name="chargeC" id="chargeC" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="chargeTD">Charge TD :</label>
                <input type="text" name="chargeTD" id="chargeTD" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="gradeArab">Grade en Arabe :</label>
                <input type="text" name="gradeArab" id="gradeArab" class="form-control">
            </div>

            <div class="form-group">
                <label for="chargeCI">Charge CI :</label>
                <input type="text" name="chargeCI" id="chargeCI" class="form-control">
            </div>

            <div class="form-group">
                <label for="chargeTotal">Charge Total :</label>
                <input type="text" name="chargeTotal" id="chargeTotal" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
require_once('../connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lundi = $_POST['lundi'];
    $mardi = $_POST['mardi'];
    $mercredi = $_POST['mercredi'];
    $jeudi = $_POST['jeudi'];
    $vendredi = $_POST['vendredi'];
    $samedi = $_POST['samedi'];
    $codeProf = $_POST['codeProf'];

    $sql = "INSERT INTO jours (Lundi, Mardi, Mercredi, Jeudi, Vendredi, Samedi, CodeProf)
            VALUES (:lundi, :mardi, :mercredi, :jeudi, :vendredi, :samedi, :codeProf)";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':lundi', $lundi);
    $stmt->bindParam(':mardi', $mardi);
    $stmt->bindParam(':mercredi', $mercredi);
    $stmt->bindParam(':jeudi', $jeudi);
    $stmt->bindParam(':vendredi', $vendredi);
    $stmt->bindParam(':samedi', $samedi);
    $stmt->bindParam(':codeProf', $codeProf);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">Enregistrement ajouté avec succès.</div>';
        header("Location: AffichierJours.php");
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
        <form method="post" action="AjouterJours.php">
            <div class="form-group">
                <label for="lundi">Lundi :</label>
                <input type="text" name="lundi" id="lundi" class="form-control" required>
            </div>

            <!-- Ajout de la liste déroulante pour le champ CodeProf -->
            <div class="form-group">
                <label for="codeProf">Code Prof :</label>
                <select name="codeProf" id="codeProf" class="form-control" required>
                    <?php
                    // Requête SQL pour récupérer les informations de la table prof
                    $sqlProf = "SELECT Matricule_Prof, Nom, Prenom FROM prof";
                    $stmtProf = $db->query($sqlProf);

                    // Remplir la liste déroulante avec les résultats de la requête
                    while ($rowProf = $stmtProf->fetch()) {
                        echo '<option value="' . $rowProf['Matricule_Prof'] . '">' . $rowProf['Matricule_Prof'] . ' - ' . $rowProf['Nom'] . ' ' . $rowProf['Prenom'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <!-- Fin de la liste déroulante -->

            <div class="form-group">
                <label for="mardi">Mardi :</label>
                <input type="text" name="mardi" id="mardi" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="mercredi">Mercredi :</label>
                <input type="text" name="mercredi" id="mercredi" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="jeudi">Jeudi :</label>
                <input type="text" name="jeudi" id="jeudi" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="vendredi">Vendredi :</label>
                <input type="text" name="vendredi" id="vendredi" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="samedi">Samedi :</label>
                <input type="text" name="samedi" id="samedi" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

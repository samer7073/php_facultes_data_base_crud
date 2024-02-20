<?php
require_once('../connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $dateDebut = $_POST['dateDebut'];
    $dateFin = $_POST['dateFin'];
    $session = $_POST['session'];

    // Construire la requête SQL d'insertion
    $sql = "INSERT INTO semaine (DateDebut, DateFin, Session) VALUES (:dateDebut, :dateFin, :session)";

    // Préparer la requête
    $stmt = $db->prepare($sql);

    // Binder les valeurs
    $stmt->bindParam(':dateDebut', $dateDebut);
    $stmt->bindParam(':dateFin', $dateFin);
    $stmt->bindParam(':session', $session);

    // Exécuter la requête
    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">Enregistrement ajouté avec succès.</div>';
        header("Location: AffichierSemaine.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">Erreur lors de l\'ajout de l\'enregistrement.</div>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire pour la table Semaine</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Formulaire pour la table Semaine</h1>
        <form method="post" action="AjouterSemaine.php">
            <div class="form-group">
                <label for="dateDebut">Date de début :</label>
                <input type="datetime-local" name="dateDebut" id="dateDebut" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="dateFin">Date de fin :</label>
                <input type="datetime-local" name="dateFin" id="dateFin" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="session">Session :</label>
                <select name="session" id="session" class="form-control" required>
                    <?php
                    // Inclure le fichier de connexion
                    include 'connexion.php';

                    $sql = "SELECT Numero, Annee, Sem FROM session";
                    $result = $db->query($sql);

                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch()) {
                            echo '<option value="' . $row["Numero"] . '">'.' Numero  '. $row["Numero"]  .'-Annee '. $row["Annee"] . ' - Sem ' . $row["Sem"] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</body>
</html>

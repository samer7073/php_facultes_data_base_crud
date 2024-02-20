<?php
require_once('../connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $numero = $_POST['numero'];
    $annee = $_POST['annee'];
    $sem = $_POST['sem'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
    $debsem = $_POST['debsem'];
    $finsem = $_POST['finsem'];
    $annea = $_POST['annea'];
    $anneab = $_POST['anneab'];
    $semab = $_POST['semab'];

    // Construire la requête SQL d'insertion
    $sql = "INSERT INTO session (Numero, Annee, Sem, Debut, Fin, Debsem, Finsem, Annea, Anneab, SemAb) 
            VALUES (:numero, :annee, :sem, :debut, :fin, :debsem, :finsem, :annea, :anneab, :semab)";

    // Préparer la requête
    $stmt = $db->prepare($sql);

    // Binder les valeurs
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':annee', $annee);
    $stmt->bindParam(':sem', $sem);
    $stmt->bindParam(':debut', $debut);
    $stmt->bindParam(':fin', $fin);
    $stmt->bindParam(':debsem', $debsem);
    $stmt->bindParam(':finsem', $finsem);
    $stmt->bindParam(':annea', $annea);
    $stmt->bindParam(':anneab', $anneab);
    $stmt->bindParam(':semab', $semab);

    // Exécuter la requête
    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">Enregistrement ajouté avec succès.</div>';
        header("Location: AffichierSession.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">Erreur lors de l\'ajout de l\'enregistrement.</div>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire pour la table Session</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Formulaire pour la table Session</h1>
        <form method="post" action="AjouterSession.php">
            <div class="form-group">
                <label for="numero">Numéro :</label>
                <input type="text" name="numero" id="numero" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="annee">Année :</label>
                <input type="text" name="annee" id="annee" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="sem">Semestre :</label>
                <input type="text" name="sem" id="sem" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="debut">Début :</label>
                <input type="datetime-local" name="debut" id="debut" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="fin">Fin :</label>
                <input type="datetime-local" name="fin" id="fin" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="debsem">Début Semestre :</label>
                <input type="datetime-local" name="debsem" id="debsem" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="finsem">Fin Semestre :</label>
                <input type="datetime-local" name="finsem" id="finsem" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="annea">Année A :</label>
                <input type="text" name="annea" id="annea" class="form-control">
            </div>

            <div class="form-group">
                <label for="anneab">Année B :</label>
                <input type="text" name="anneab" id="anneab" class="form-control">
            </div>

            <div class="form-group">
                <label for="semab">Semestre B :</label>
                <input type="text" name="semab" id="semab" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</body>
</html>

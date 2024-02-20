<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Session</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Modifier Session</h2>
        <?php
        require_once('../connexion.php'); 

        if (isset($_GET['numero']) && is_numeric($_GET['numero'])) {
            $numero = $_GET['numero'];
            $sql = "SELECT * FROM session WHERE Numero = $numero";
            $stmt = $db->query($sql);
            $row = $stmt->fetch();

            if ($row) {
                ?>
                <form method="post" action="modifier_session.php">
                    <input type="hidden" name="numero" value="<?php echo $numero; ?>">

                    <div class="form-group">
                        <label for="annee">Année :</label>
                        <input type="text" class="form-control" name="nouvelleAnnee" value="<?php echo $row['Annee']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="sem">Semestre :</label>
                        <input type="text" class="form-control" name="nouveauSemestre" value="<?php echo $row['Sem']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="debut">Début :</label>
                        <input type="datetime-local" class="form-control" name="nouveauDebut" value="<?php echo date('Y-m-d\TH:i', strtotime($row['Debut'])); ?>">
                    </div>

                    <div class="form-group">
                        <label for="fin">Fin :</label>
                        <input type="datetime-local" class="form-control" name="nouvelleFin" value="<?php echo date('Y-m-d\TH:i', strtotime($row['Fin'])); ?>">
                    </div>

                    <div class="form-group">
                        <label for="debsem">Début Semestre :</label>
                        <input type="datetime-local" class="form-control" name="nouveauDebutSemestre" value="<?php echo date('Y-m-d\TH:i', strtotime($row['Debsem'])); ?>">
                    </div>

                    <div class="form-group">
                        <label for="finsem">Fin Semestre :</label>
                        <input type="datetime-local" class="form-control" name="nouvelleFinSemestre" value="<?php echo date('Y-m-d\TH:i', strtotime($row['Finsem'])); ?>">
                    </div>

                    <div class="form-group">
                        <label for="annea">Année A :</label>
                        <input type="text" class="form-control" name="nouvelleAnneeA" value="<?php echo $row['Annea']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="anneab">Année B :</label>
                        <input type="text" class="form-control" name="nouvelleAnneeB" value="<?php echo $row['Anneab']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="semab">Semestre B :</label>
                        <input type="text" class="form-control" name="nouveauSemestreB" value="<?php echo $row['SemAb']; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
                <?php
            } else {
                echo "Numéro de session non trouvé dans la table Session.";
            }
        } else {
            echo "Numéro de session invalide.";
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numero = $_POST['numero'];
            $nouvelleAnnee = $_POST['nouvelleAnnee'];
            $nouveauSemestre = $_POST['nouveauSemestre'];
            $nouveauDebut = date('Y-m-d H:i:s', strtotime($_POST['nouveauDebut']));
            $nouvelleFin = date('Y-m-d H:i:s', strtotime($_POST['nouvelleFin']));
            $nouveauDebutSemestre = date('Y-m-d H:i:s', strtotime($_POST['nouveauDebutSemestre']));
            $nouvelleFinSemestre = date('Y-m-d H:i:s', strtotime($_POST['nouvelleFinSemestre']));
            $nouvelleAnneeA = $_POST['nouvelleAnneeA'];
            $nouvelleAnneeB = $_POST['nouvelleAnneeB'];
            $nouveauSemestreB = $_POST['nouveauSemestreB'];

            $sql = "UPDATE session SET 
                    Annee = '$nouvelleAnnee', 
                    Sem = '$nouveauSemestre', 
                    Debut = '$nouveauDebut', 
                    Fin = '$nouvelleFin', 
                    Debsem = '$nouveauDebutSemestre', 
                    Finsem = '$nouvelleFinSemestre', 
                    Annea = '$nouvelleAnneeA', 
                    Anneab = '$nouvelleAnneeB', 
                    SemAb = '$nouveauSemestreB' 
                    WHERE Numero = $numero";

            $stmt = $db->query($sql);
            if ($stmt) {
                header("Location: AffichierSession.php");
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

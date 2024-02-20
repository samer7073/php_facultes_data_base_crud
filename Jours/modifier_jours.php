<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Jours</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Modifier Jours</h2>
        <?php
        require_once('../connexion.php'); 

        if (isset($_GET['num']) && is_numeric($_GET['num'])) {
            $num = $_GET['num'];
            $sql = "SELECT * FROM jours WHERE Num = $num";
            $stmt = $db->query($sql);
            $row = $stmt->fetch();

            if ($row) {
                ?>
                <form method="post" action="modifier_jours.php">
                    <input type="hidden" name="num" value="<?php echo $num; ?>">

                    <div class="form-group">
                        <label for="lundi">Lundi :</label>
                        <input type="text" class="form-control" name="nouveauLundi" value="<?php echo $row['Lundi']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="mardi">Mardi :</label>
                        <input type="text" class="form-control" name="nouveauMardi" value="<?php echo $row['Mardi']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="mercredi">Mercredi :</label>
                        <input type="text" class="form-control" name="nouveauMercredi" value="<?php echo $row['Mercredi']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="jeudi">Jeudi :</label>
                        <input type="text" class="form-control" name="nouveauJeudi" value="<?php echo $row['Jeudi']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="vendredi">Vendredi :</label>
                        <input type="text" class="form-control" name="nouveauVendredi" value="<?php echo $row['Vendredi']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="samedi">Samedi :</label>
                        <input type="text" class="form-control" name="nouveauSamedi" value="<?php echo $row['Samedi']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="codeProf">Code Prof :</label>
                        <select name="nouveauCodeProf" class="form-control">
                            <?php
                            // Récupérer les informations de la table prof
                            $sqlProf = "SELECT Matricule_Prof, Nom, Prenom FROM prof";
                            $stmtProf = $db->query($sqlProf);

                            // Remplir la liste déroulante avec les résultats de la requête
                            while ($rowProf = $stmtProf->fetch()) {
                                $selected = ($rowProf['Matricule_Prof'] == $row['CodeProf']) ? "selected" : "";
                                echo '<option value="' . $rowProf['Matricule_Prof'] . '" ' . $selected . '>'
                                    . $rowProf['Matricule_Prof'] . ' - ' . $rowProf['Nom'] . ' ' . $rowProf['Prenom'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
                <?php
            } else {
                echo "Numéro non trouvé dans la table Jours.";
            }
        } else {
            echo "Numéro invalide.";
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $num = $_POST['num'];
            $nouveauLundi = $_POST['nouveauLundi'];
            $nouveauMardi = $_POST['nouveauMardi'];
            $nouveauMercredi = $_POST['nouveauMercredi'];
            $nouveauJeudi = $_POST['nouveauJeudi'];
            $nouveauVendredi = $_POST['nouveauVendredi'];
            $nouveauSamedi = $_POST['nouveauSamedi'];
            $nouveauCodeProf = $_POST['nouveauCodeProf'];

            $sql = "UPDATE jours SET 
                    Lundi = '$nouveauLundi', 
                    Mardi = '$nouveauMardi', 
                    Mercredi = '$nouveauMercredi', 
                    Jeudi = '$nouveauJeudi', 
                    Vendredi = '$nouveauVendredi', 
                    Samedi = '$nouveauSamedi', 
                    CodeProf = '$nouveauCodeProf' 
                    WHERE Num = $num";

            $stmt = $db->query($sql);
            if ($stmt) {
                header("Location: AffichierJours.php");
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

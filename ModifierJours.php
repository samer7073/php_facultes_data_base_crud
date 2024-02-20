<!DOCTYPE html>
<html>
<head>
    <title>Modifier Jours</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Modifier Jours</h2>
        <?php
        require_once('connexion.php'); 
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM jours WHERE CodeProf = $id";
            $stmt = $db->query($sql);
            $row = $stmt->fetch();

            if ($row) {
                ?>
                <form method="post" action="modifierJours.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="lundi">Lundi</label>
                        <input type="text" class="form-control" name="nouveauLundi" value="<?php echo $row['Lundi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="mardi">Mardi</label>
                        <input type="text" class="form-control" name="nouveauMardi" value="<?php echo $row['Mardi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="mercredi">Mercredi</label>
                        <input type="text" class="form-control" name="nouveauMercredi" value="<?php echo $row['Mercredi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jeudi">Jeudi</label>
                        <input type="text" class="form-control" name="nouveauJeudi" value="<?php echo $row['Jeudi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="vendredi">Vendredi</label>
                        <input type="text" class="form-control" name="nouveauVendredi" value="<?php echo $row['Vendredi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="samedi">Samedi</label>
                        <input type="text" class="form-control" name="nouveauSamedi" value="<?php echo $row['Samedi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="codeProf">Code Prof</label>
                        <input type="text" class="form-control" name="codeProf" value="<?php echo $row['CodeProf']; ?>" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
                <?php
            } else {
                echo "ID non trouvé dans la table jours.";
            }
        } else {
            echo "ID invalide.";
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nouveauLundi = $_POST['nouveauLundi'];
            $nouveauMardi = $_POST['nouveauMardi'];
            $nouveauMercredi = $_POST['nouveauMercredi'];
            $nouveauJeudi = $_POST['nouveauJeudi'];
            $nouveauVendredi = $_POST['nouveauVendredi'];
            $nouveauSamedi = $_POST['nouveauSamedi'];
            $codeProf = $_POST['codeProf'];

            $sql = "UPDATE jours SET Lundi = '$nouveauLundi', Mardi = '$nouveauMardi', Mercredi = '$nouveauMercredi', Jeudi = '$nouveauJeudi', Vendredi = '$nouveauVendredi', Samedi = '$nouveauSamedi' WHERE CodeProf = $id";
            $stmt = $db->query($sql);

            if ($stmt) {
                header("Location: AfficherJours.php");
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

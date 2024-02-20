<!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'inscription</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Formulaire d'enregistrement</h1>
        <form method="post" action="traitement.php">
            <div class="form-group">
                <label for="codeProf">Code du Prof :</label>
                <select name="codeProf" id="codeProf" class="form-control" required>
                    <?php
                    // Inclure le fichier de connexion
                    require_once('../connexion.php');

                    $sql = "SELECT Matricule_Prof, Nom, Prenom FROM prof";
                    $result = $db->query($sql);

                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch()) {
                            echo '<option value="' . $row["Matricule_Prof"] . '">' . $row["Matricule_Prof"] . ' - ' . $row["Nom"] . ' ' . $row["Prenom"] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="grade">Grade :</label>
                <select name="grade" id="grade" class="form-control" required>
                    <?php
                    // Inclure le fichier de connexion
                    require_once('../connexion.php');

                    $sql = "SELECT Grade, ChargeTP, ChargeC, ChargeTD, GradeArab, ChargeCI, ChargeTotal FROM grades";
                    $result = $db->query($sql);

                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch()) {
                            echo '<option value="' . $row["Grade"] . '">' . $row["Grade"] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="sess">Session :</label>
                <select name="sess" id="sess" class="form-control" required>
                    <?php
                    // Inclure le fichier de connexion
                    require_once('../connexion.php');

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

            <div class="form-group">
                <label for="situation">Situation :</label>
                <input type="text" name="situation" id="situation" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</body>
</html>

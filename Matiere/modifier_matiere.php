<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Matiere</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Modifier Matiere</h2>
        <?php
        require_once('../connexion.php');

        if (isset($_GET['codeMatiere'])) {
            $codeMatiere = $_GET['codeMatiere'];
            $sql = "SELECT * FROM matieres WHERE CodeMatiere = :codeMatiere";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':codeMatiere', $codeMatiere);
            $stmt->execute();
            $row = $stmt->fetch();

            if ($row) {
                ?>
                <form method="post" action="modifier_matiere.php">
                    <input type="hidden" name="codeMatiere" value="<?php echo $codeMatiere; ?>">

                    <div class="form-group">
                        <label for="nomMatiere">Nom Matière :</label>
                        <input type="text" name="nomMatiere" class="form-control" value="<?php echo $row['NomMatiere']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="coefMatiere">Coefficient Matière :</label>
                        <input type="text" name="coefMatiere" class="form-control" value="<?php echo $row['CoefMatiere']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="departement">Département :</label>
                        <select name="departement" class="form-control" required>
                            <?php
                            $sqlDepartements = "SELECT * FROM departements";
                            $stmtDepartements = $db->query($sqlDepartements);
                            while ($rowDepartement = $stmtDepartements->fetch()) {
                                $selected = ($rowDepartement['CodeDep'] == $row['Departement']) ? "selected" : "";
                                echo '<option value="' . $rowDepartement['CodeDep'] . '" ' . $selected . '>' . $rowDepartement['CodeDep'] ." ". $rowDepartement['Departement'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="semestre">Semestre :</label>
                        <input type="text" name="semestre" class="form-control" value="<?php echo $row['Semestre']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="optionMatiere">Option Matière :</label>
                        <input type="text" name="optionMatiere" class="form-control" value="<?php echo $row['OptionMatiere']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="nbHeureCI">Nombre d'heures CI :</label>
                        <input type="text" name="nbHeureCI" class="form-control" value="<?php echo $row['NbHeureCI']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="nbHeureTP">Nombre d'heures TP :</label>
                        <input type="text" name="nbHeureTP" class="form-control" value="<?php echo $row['NbHeureTP']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="typeLabo">Type de Labo :</label>
                        <input type="text" name="typeLabo" class="form-control" value="<?php echo $row['TypeLabo']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="bonus">Bonus :</label>
                        <input type="text" name="bonus" class="form-control" value="<?php echo $row['Bonus']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="categories">Catégories :</label>
                        <input type="text" name="categories" class="form-control" value="<?php echo $row['Categories']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="sousCategories">Sous Catégories :</label>
                        <input type="text" name="sousCategories" class="form-control" value="<?php echo $row['SousCategories']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="dateDeb">Date de début :</label>
                        <input type="datetime-local" name="dateDeb" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($row['DateDeb'])); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="dateFin">Date de fin :</label>
                        <input type="datetime-local" name="dateFin" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($row['DateFin'])); ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
                <?php
            } else {
                echo "Code de matière non trouvé dans la table matieres.";
            }
        } else {
            echo "Code de matière non spécifié.";
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codeMatiere = $_POST['codeMatiere'];
            $nomMatiere = $_POST['nomMatiere'];
            $coefMatiere = $_POST['coefMatiere'];
            $departement = $_POST['departement'];
            $semestre = $_POST['semestre'];
            $optionMatiere = $_POST['optionMatiere'];
            $nbHeureCI = $_POST['nbHeureCI'];
            $nbHeureTP = $_POST['nbHeureTP'];
            $typeLabo = $_POST['typeLabo'];
            $bonus = $_POST['bonus'];
            $categories = $_POST['categories'];
            $sousCategories = $_POST['sousCategories'];
            $dateDeb = $_POST['dateDeb'];
            $dateFin = $_POST['dateFin'];

            $sqlUpdate = "UPDATE matieres 
                SET NomMatiere = :nomMatiere, 
                    CoefMatiere = :coefMatiere, 
                    Departement = :departement, 
                    Semestre = :semestre, 
                    OptionMatiere = :optionMatiere, 
                    NbHeureCI = :nbHeureCI, 
                    NbHeureTP = :nbHeureTP, 
                    TypeLabo = :typeLabo, 
                    Bonus = :bonus, 
                    Categories = :categories, 
                    SousCategories = :sousCategories, 
                    DateDeb = :dateDeb, 
                    DateFin = :dateFin 
                    WHERE CodeMatiere = :codeMatiere";

            $stmtUpdate = $db->prepare($sqlUpdate);
            $stmtUpdate->bindParam(':codeMatiere', $codeMatiere);
            $stmtUpdate->bindParam(':nomMatiere', $nomMatiere);
            $stmtUpdate->bindParam(':coefMatiere', $coefMatiere);
            $stmtUpdate->bindParam(':departement', $departement);
            $stmtUpdate->bindParam(':semestre', $semestre);
            $stmtUpdate->bindParam(':optionMatiere', $optionMatiere);
            $stmtUpdate->bindParam(':nbHeureCI', $nbHeureCI);
            $stmtUpdate->bindParam(':nbHeureTP', $nbHeureTP);
            $stmtUpdate->bindParam(':typeLabo', $typeLabo);
            $stmtUpdate->bindParam(':bonus', $bonus);
            $stmtUpdate->bindParam(':categories', $categories);
            $stmtUpdate->bindParam(':sousCategories', $sousCategories);
            $stmtUpdate->bindParam(':dateDeb', $dateDeb);
            $stmtUpdate->bindParam(':dateFin', $dateFin);

            if ($stmtUpdate->execute()) {
                echo '<div class="alert alert-success" role="alert">Enregistrement mis à jour avec succès.</div>';
                header("Location: affichierMatiere.php");
            } else {
                echo '<div class="alert alert-danger" role="alert">Erreur lors de la mise à jour de l\'enregistrement.</div>';
            }
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

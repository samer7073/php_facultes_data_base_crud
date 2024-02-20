<?php
require_once('../connexion.php');

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
    $dateDeb = date('Y-m-d H:i:s', strtotime($_POST['dateDeb']));
    $dateFin = date('Y-m-d H:i:s', strtotime($_POST['dateFin']));

    $sql = "INSERT INTO matieres (CodeMatiere, NomMatiere, CoefMatiere, Departement, Semestre, OptionMatiere, NbHeureCI, NbHeureTP, TypeLabo, Bonus, Categories, SousCategories, DateDeb, DateFin)
            VALUES (:codeMatiere, :nomMatiere, :coefMatiere, :departement, :semestre, :optionMatiere, :nbHeureCI, :nbHeureTP, :typeLabo, :bonus, :categories, :sousCategories, :dateDeb, :dateFin)";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':codeMatiere', $codeMatiere);
    $stmt->bindParam(':nomMatiere', $nomMatiere);
    $stmt->bindParam(':coefMatiere', $coefMatiere);
    $stmt->bindParam(':departement', $departement);
    $stmt->bindParam(':semestre', $semestre);
    $stmt->bindParam(':optionMatiere', $optionMatiere);
    $stmt->bindParam(':nbHeureCI', $nbHeureCI);
    $stmt->bindParam(':nbHeureTP', $nbHeureTP);
    $stmt->bindParam(':typeLabo', $typeLabo);
    $stmt->bindParam(':bonus', $bonus);
    $stmt->bindParam(':categories', $categories);
    $stmt->bindParam(':sousCategories', $sousCategories);
    $stmt->bindParam(':dateDeb', $dateDeb);
    $stmt->bindParam(':dateFin', $dateFin);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">Enregistrement ajouté avec succès.</div>';
        header("Location: affichierMatiere.php");
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
    <title>Ajouter une matière</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Ajouter une matière</h2>
        <form method="post" action="AjouterMatiere.php">
            <div class="form-group">
                <label for="codeMatiere">Code Matière :</label>
                <input type="text" name="codeMatiere" id="codeMatiere" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nomMatiere">Nom Matière :</label>
                <input type="text" name="nomMatiere" id="nomMatiere" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="coefMatiere">Coefficient Matière :</label>
                <input type="text" name="coefMatiere" id="coefMatiere" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="departement">Département :</label>
                <select name="departement" id="departement" class="form-control" required>
                    <?php
                    // Requête SQL pour récupérer les départements
                    $sqlDepartements = "SELECT * FROM departements";
                    $stmtDepartements = $db->query($sqlDepartements);

                    // Remplir la liste déroulante avec les résultats de la requête
                    while ($rowDepartement = $stmtDepartements->fetch()) {
                        echo '<option value="' . $rowDepartement['CodeDep'] . '">' . $rowDepartement['Departement'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="semestre">Semestre :</label>
                <input type="text" name="semestre" id="semestre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="optionMatiere">Option Matière :</label>
                <input type="text" name="optionMatiere" id="optionMatiere" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nbHeureCI">Nombre d'heures CI :</label>
                <input type="text" name="nbHeureCI" id="nbHeureCI" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nbHeureTP">Nombre d'heures TP :</label>
                <input type="text" name="nbHeureTP" id="nbHeureTP" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="typeLabo">Type de Labo :</label>
                <input type="text" name="typeLabo" id="typeLabo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="bonus">Bonus :</label>
                <input type="text" name="bonus" id="bonus" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="categories">Catégories :</label>
                <input type="text" name="categories" id="categories" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="sousCategories">Sous Catégories :</label>
                <input type="text" name="sousCategories" id="sousCategories" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="dateDeb">Date de début :</label>
                <input type="datetime-local" name="dateDeb" id="dateDeb" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="dateFin">Date de fin :</label>
                <input type="datetime-local" name="dateFin" id="dateFin" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
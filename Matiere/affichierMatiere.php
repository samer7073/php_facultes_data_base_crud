<!DOCTYPE html>
<html>
<head>
    <title>Tableau de Matières</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-2">
        <h2>Contenu de la table Matieres</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Code Matière</th>
                        <th>Nom Matière</th>
                        <th>Coefficient Matière</th>
                        <th>Département</th>
                        <th>Semestre</th>
                        <th>Option Matière</th>
                        <th>Nb Heure CI</th>
                        <th>Nb Heure TP</th>
                        <th>Type Labo</th>
                        <th>Bonus</th>
                        <th>Categories</th>
                        <th>Sous Categories</th>
                        <th>Date Début</th>
                        <th>Date Fin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('../connexion.php'); 

                    $sql = "SELECT * FROM matieres";

                    try {
                        $stmt = $db->query($sql);

                        if ($stmt) {
                            while ($row = $stmt->fetch()) {
                                echo '<tr>';
                                echo '<td>' . $row['CodeMatiere'] . '</td>';
                                echo '<td>' . $row['NomMatiere'] . '</td>';
                                echo '<td>' . $row['CoefMatiere'] . '</td>';
                                echo '<td>' . $row['Departement'] . '</td>';
                                echo '<td>' . $row['Semestre'] . '</td>';
                                echo '<td>' . $row['OptionMatiere'] . '</td>';
                                echo '<td>' . $row['NbHeureCI'] . '</td>';
                                echo '<td>' . $row['NbHeureTP'] . '</td>';
                                echo '<td>' . $row['TypeLabo'] . '</td>';
                                echo '<td>' . $row['Bonus'] . '</td>';
                                echo '<td>' . $row['Categories'] . '</td>';
                                echo '<td>' . $row['SousCategories'] . '</td>';
                                echo '<td>' . $row['DateDeb'] . '</td>';
                                echo '<td>' . $row['DateFin'] . '</td>';
                                echo '<td>';
                                echo '<a class="btn btn-warning" href="modifier_matiere.php?codeMatiere=' . $row['CodeMatiere'] . '">Modifier</a>';
                                echo '<a class="btn btn-danger" href="supprimer_matiere.php?codeMatiere=' . $row['CodeMatiere'] . '">Supprimer</a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo 'Aucun résultat trouvé dans la table Matieres.';
                        }
                    } catch (PDOException $e) {
                        echo 'Erreur : ' . $e->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

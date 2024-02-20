<!DOCTYPE html>
<html>
<head>
    <title>Tableau de Jours</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Contenu de la table Jours</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Num</th>
                    <th>Lundi</th>
                    <th>Mardi</th>
                    <th>Mercredi</th>
                    <th>Jeudi</th>
                    <th>Vendredi</th>
                    <th>Samedi</th>
                    <th>CodeProf</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../connexion.php');

                $sql = "SELECT * FROM jours";

                try {
                    $stmt = $db->query($sql);

                    if ($stmt) {
                        while ($row = $stmt->fetch()) {
                            echo '<tr>';
                            echo '<td>' . $row['Num'] . '</td>';
                            echo '<td>' . $row['Lundi'] . '</td>';
                            echo '<td>' . $row['Mardi'] . '</td>';
                            echo '<td>' . $row['Mercredi'] . '</td>';
                            echo '<td>' . $row['Jeudi'] . '</td>';
                            echo '<td>' . $row['Vendredi'] . '</td>';
                            echo '<td>' . $row['Samedi'] . '</td>';
                            echo '<td>' . $row['CodeProf'] . '</td>';
                            echo '<td>';
                            echo '<a class="btn btn-warning" href="modifier_jours.php?num=' . $row['Num'] . '">Modifier</a>';
                            echo '<a class="btn btn-danger" href="supprimer_jours.php?num=' . $row['Num'] . '">Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo 'Aucun résultat trouvé dans la table Jours.';
                    }
                } catch (PDOException $e) {
                    echo 'Erreur : ' . $e->getMessage();
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

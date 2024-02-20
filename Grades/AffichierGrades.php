<!DOCTYPE html>
<html>
<head>
    <title>Tableau de Grades</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Contenu de la table Grades</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Grade</th>
                    <th>Charge TP</th>
                    <th>Charge C</th>
                    <th>Charge TD</th>
                    <th>Grade Arabe</th>
                    <th>Charge CI</th>
                    <th>Charge Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../connexion.php');

                $sql = "SELECT * FROM grades";

                try {
                    $stmt = $db->query($sql);

                    if ($stmt) {
                        while ($row = $stmt->fetch()) {
                            echo '<tr>';
                            echo '<td>' . $row['Grade'] . '</td>';
                            echo '<td>' . $row['ChargeTP'] . '</td>';
                            echo '<td>' . $row['ChargeC'] . '</td>';
                            echo '<td>' . $row['ChargeTD'] . '</td>';
                            echo '<td>' . $row['GradeArab'] . '</td>';
                            echo '<td>' . $row['ChargeCI'] . '</td>';
                            echo '<td>' . $row['ChargeTotal'] . '</td>';
                            echo '<td>';
                            echo '<a class="btn btn-warning" href="modifier_grades.php?grade=' . $row['Grade'] . '">Modifier</a>';
                            echo '<a class="btn btn-danger" href="supprimer_grades.php?grade=' . $row['Grade'] . '">Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo 'Aucun résultat trouvé dans la table Grades.';
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

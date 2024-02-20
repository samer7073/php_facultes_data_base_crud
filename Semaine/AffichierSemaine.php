<!DOCTYPE html>
<html>
<head>
    <title>Tableau de Semaines</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Contenu de la table Semaine</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>NumSem</th>
                    <th>DateDebut</th>
                    <th>DateFin</th>
                    <th>Session</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../connexion.php');

                $sql = "SELECT * FROM semaine";

                try {
                    $stmt = $db->query($sql);

                    if ($stmt) {
                        while ($row = $stmt->fetch()) {
                            echo '<tr>';
                            echo '<td>' . $row['NumSem'] . '</td>';
                            echo '<td>' . $row['DateDebut'] . '</td>';
                            echo '<td>' . $row['DateFin'] . '</td>';
                            echo '<td>' . $row['Session'] . '</td>';
                            echo '<td>';
                            echo '<a class="btn btn-warning" href="modifier_semaine.php?num=' . $row['NumSem'] . '">Modifier</a>';
                            echo '<a class="btn btn-danger" href="supprimer_semaine.php?num=' . $row['NumSem'] . '">Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo 'Aucun résultat trouvé dans la table Semaine.';
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

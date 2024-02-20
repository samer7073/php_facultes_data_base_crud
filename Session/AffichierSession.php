<!DOCTYPE html>
<html>
<head>
    <title>Tableau de Sessions</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Contenu de la table Session</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Numero</th>
                    <th>Annee</th>
                    <th>Sem</th>
                    <th>Debut</th>
                    <th>Fin</th>
                    <th>Debsem</th>
                    <th>Finsem</th>
                    <th>Annea</th>
                    <th>Anneab</th>
                    <th>SemAb</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../connexion.php');

                $sql = "SELECT * FROM session";

                try {
                    $stmt = $db->query($sql);

                    if ($stmt) {
                        while ($row = $stmt->fetch()) {
                            echo '<tr>';
                            echo '<td>' . $row['Numero'] . '</td>';
                            echo '<td>' . $row['Annee'] . '</td>';
                            echo '<td>' . $row['Sem'] . '</td>';
                            echo '<td>' . $row['Debut'] . '</td>';
                            echo '<td>' . $row['Fin'] . '</td>';
                            echo '<td>' . $row['Debsem'] . '</td>';
                            echo '<td>' . $row['Finsem'] . '</td>';
                            echo '<td>' . $row['Annea'] . '</td>';
                            echo '<td>' . $row['Anneab'] . '</td>';
                            echo '<td>' . $row['SemAb'] . '</td>';
                            echo '<td>';
                            echo '<a class="btn btn-warning" href="modifier_session.php?numero=' . $row['Numero'] . '">Modifier</a>';
                            echo '<a class="btn btn-danger" href="supprimer_session.php?numero=' . $row['Numero'] . '">Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo 'Aucun résultat trouvé dans la table Session.';
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

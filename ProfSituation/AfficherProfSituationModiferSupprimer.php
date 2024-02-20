<!DOCTYPE html>
<html>
<head>
    <title>Tableau de ProfSituation</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Contenu de la table ProfSituation</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>CodeProf</th>
                    <th>Session</th>
                    <th>Situation</th>
                    <th>Grade</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../connexion.php');

              
                $sql = "SELECT ProfSituation.*, Session.Annee, Session.Sem 
                        FROM ProfSituation 
                        INNER JOIN Session ON ProfSituation.Sess = Session.Numero";

                try {
                    $stmt = $db->query($sql);

                    if ($stmt) {
                        while ($row = $stmt->fetch()) {
                            echo '<tr>';
                            echo '<td>' . $row['CodeProf'] . '</td>';
                            echo '<td>' . $row['Annee'] . ' - Sem ' . $row['Sem'] . '</td>';
                            echo '<td>' . $row['Situation'] . '</td>';
                            echo '<td>' . $row['Grade'] . '</td>';
                            echo '<td>';
                            echo '<a class="btn btn-warning" href="modifier.php?num=' . $row['CodeProf'] . '">Modifier</a>';
                            echo '<a class="btn btn-danger" href="supprimer.php?num=' . $row['CodeProf'] . '">Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo 'Aucun résultat trouvé dans la table ProfSituation.';
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

<?php
require_once('../connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $codeProf = $_POST['codeProf'];
    $sess = $_POST['sess'];
    $situation = $_POST['situation'];
    $grade = $_POST['grade'];

   
    $sql = "INSERT INTO ProfSituation (CodeProf, Sess, Situation, Grade) VALUES (:codeProf, :sess, :situation, :grade)";
    
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':codeProf', $codeProf);
        $stmt->bindParam(':sess', $sess);
        $stmt->bindParam(':situation', $situation);
        $stmt->bindParam(':grade', $grade);
        $stmt->execute();
        echo '<script type="text/javascript">';
        echo 'alert("Enregistrement réussi !");';
        echo 'window.history.back();';
        echo '</script>';
        header("Location: AfficherProfSituationModiferSupprimer.php");
    } catch (PDOException $e) {
        echo '<script type="text/javascript">';
        echo 'alert("Erreur : ' . $e->getMessage() . '");';
        echo 'window.history.back();';
        echo '</script>';
    }
}
?>

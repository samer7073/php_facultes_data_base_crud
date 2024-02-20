<?php
require_once('../connexion.php');

if (isset($_GET['num']) && is_numeric($_GET['num'])) {
    $num = $_GET['num'];
    $sql = "DELETE FROM ProfSituation WHERE CodeProf = $num";
    $stmt = $db->query($sql);

    if ($stmt) {
        echo "Enregistrement supprimé avec succès.";
        header("Location: AfficherProfSituationModiferSupprimer.php");
        exit; // Assurez-vous de terminer l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la suppression de l'enregistrement.";
    }
} else {
    echo "Numéro invalide.";
}
?>

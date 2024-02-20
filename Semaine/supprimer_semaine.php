<?php
ob_start(); // Active la mise en mémoire tampon
require_once('../connexion.php');

if (isset($_GET['num']) && is_numeric($_GET['num'])) {
    $numSem = $_GET['num'];
    $sql = "DELETE FROM semaine WHERE NumSem = $numSem";
    $stmt = $db->query($sql);

    if ($stmt) {
        echo "Enregistrement supprimé avec succès.";
        // Redirection vers la page précédente
        header("Location: AffichierSemaine.php");
        exit; // Assurez-vous de terminer l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la suppression de l'enregistrement.";
    }
} else {
    echo "Numéro de semaine invalide.";
}
?>

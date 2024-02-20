<?php
ob_start(); // Active la mise en mémoire tampon
require_once('../connexion.php');

if (isset($_GET['numero']) && is_numeric($_GET['numero'])) {
    $numero = $_GET['numero'];
    $sql = "DELETE FROM session WHERE Numero = $numero";
    $stmt = $db->query($sql);

    if ($stmt) {
        echo "Enregistrement supprimé avec succès.";
        // Redirection vers la page précédente
        header("Location: AffichierSession.php");
        exit; // Assurez-vous de terminer l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la suppression de l'enregistrement.";
    }
} else {
    echo "Numéro de session invalide.";
}
?>

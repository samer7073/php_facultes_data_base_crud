<?php
ob_start(); // Active la mise en mémoire tampon
require_once('../connexion.php');

if (isset($_GET['grade'])) {
    $grade = $_GET['grade'];
    $sql = "DELETE FROM grades WHERE Grade = '$grade'";
    $stmt = $db->query($sql);

    if ($stmt) {
        echo "Enregistrement supprimé avec succès.";
        // Redirection vers la page précédente
        header("Location: AffichierGrades.php");
        exit; // Assurez-vous de terminer l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la suppression de l'enregistrement.";
    }
} else {
    echo "Grade non spécifié.";
}
?>

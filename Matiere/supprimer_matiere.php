<?php
ob_start(); // Active la mise en mémoire tampon
require_once('../connexion.php');

if (isset($_GET['codeMatiere'])) {
    $codeMatiere = $_GET['codeMatiere'];
    $sql = "DELETE FROM matieres WHERE CodeMatiere = :codeMatiere";
    
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':codeMatiere', $codeMatiere, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "Enregistrement supprimé avec succès.";
        // Redirection vers la page précédente
        header("Location: affichierMatiere.php");
        exit; // Assurez-vous de terminer l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la suppression de l'enregistrement.";
    }
} else {
    echo "Code de matière invalide.";
}
?>

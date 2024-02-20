<?php


 try {
    $username = "root";
    $password = '';
    $dsn = 'mysql:host=localhost;dbname=projet_samer_arfaoui;port=3306;charset=utf8mb4';

    $db = new PDO($dsn, $username, $password);
   
    
   
    } catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
    }
    
?>
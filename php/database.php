<?php 
    session_start(); // Start session
    $servername = "localhost"; // Adress Bdd
    $user = "root"; // userName Bdd
    $pass = ""; // Password Bdd
    $dbname = "nasa"; // Nom de la Bdd
    try {
        $bdd = new PDO("mysql:host=$servername;dbname=$dbname; charset=utf8", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
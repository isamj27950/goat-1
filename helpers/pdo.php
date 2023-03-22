<?php

function pdo()
{

//1-creation des variables
$serveur ="localhost";
$dbname ="app_goat";
$login ="root";
$password ="root";

try {
    $pdo = new PDO("mysql:host=$serveur;dbname=$dbname", $login, $password, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        //recuperer datas sous forme de tableaux associatifs
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        //Voir les erreurs
        PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING
    ));

    return $pdo;
   // echo "Réussir à se connecter!!!!";
} catch (PDOException $e) {
    echo 'Erreur de connection : ' .$e->getMessage();
}
}
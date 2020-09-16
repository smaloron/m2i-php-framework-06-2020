<?php

function getPDO()
{
    // Connexion au serveur de base de données
    $dsn = "mysql:host=localhost;dbname=formation;charset=utf8";
    $pdo = new PDO($dsn, "root", "");

    return $pdo;
}
<?php

function authenticate($login, $pass): bool
{
    // Connexion au serveur de base de données
    $dsn = "mysql:host=localhost;dbname=formation;charset=utf8";
    $pdo = new PDO($dsn, "root", "");

    $sql = "SELECT * FROM users WHERE user_email= ? AND user_password= ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$login, $pass]);

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    var_dump($user);

    $isAuthenticated = $user && count($user) > 0;
    return $isAuthenticated;
}
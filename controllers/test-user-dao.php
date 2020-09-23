<?php

// récupération d'une instance de PDO
$pdo = DatabaseConnection::getInstance();

// Instanciation du DAO
$userDAO = new UserDAO($pdo);

$newUser = [
    "user_name"     => "Albert",
    "user_email"    => "albert@mail.com",
    "user_password" => "123"
];

var_dump($userDAO->insertOne($newUser));

var_dump($userDAO->findAll());
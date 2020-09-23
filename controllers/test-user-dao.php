<?php

// récupération d'une instance de PDO
$pdo = DatabaseConnection::getInstance();

// Instanciation du DAO
$userDAO = new UserDAO($pdo);

$newUser = [
    "user_name"     => "Noémie",
    "user_email"    => "noemie@mail.com",
    "user_password" => "123",
    "id" => "5"
];

$user = $userDAO->findOneById(1);
$user["user_name"] = "titi";

var_dump($userDAO->updateOne($user));

var_dump($userDAO->findAll());
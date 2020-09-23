<?php

// récupération d'une instance de PDO
$pdo = DatabaseConnection::getInstance();

// Instanciation du DAO
$userDAO = new UserDAO($pdo);

$user = new UserModel();

$user->setName("Paul")->setEmail("paul@mail.com")->setPassword("123");

var_dump($userDAO->find(
    ["user_password" => "123"]
));
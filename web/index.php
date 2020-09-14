<?php

// Définition des chemins de l'application
define("CONTROLLER_PATH", "../controllers/");
define("VIEW_PATH", "../views/");

// Récupération du nom du contrôleur
$controller = filter_input(INPUT_GET, "c", FILTER_SANITIZE_URL);

if (!file_exists(CONTROLLER_PATH . $controller . ".php")) {
    $controller = "not-found";
}

// Inclusion du contrôleur
include CONTROLLER_PATH . $controller . ".php";
<?php
// Inclusion du modèle pour l'authentification
require MODEL_PATH . "user.php";

// Variables du traitement
$error = "";
$message = "";

// Récupération des données postées
$isPosted = count($_POST);

if ($isPosted) {
    $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_EMAIL);
    $pass = filter_input(INPUT_POST, "pwd", FILTER_DEFAULT);

    // Validation
    if (empty($login) || empty($pass)) {
        $error = "Vous devez saisir tous le champs";
    }

    // Authentification
    if (authenticate($login, $pass) && empty($error)) {
        $message = "OK";
    } else {
        $message = "KO";
    }
}

// Affichage du formulaire
$pageTitle = "Connexion";
$page = "view-connexion";
include VIEW_PATH . "layout.php";
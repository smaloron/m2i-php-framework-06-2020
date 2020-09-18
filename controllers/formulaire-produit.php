<?php
// Inclusion du modèle de gestion des produits
require MODEL_PATH . "product.php";

// Récupération des données si elles ont été postées
$rules = [
    "product_name"  => FILTER_SANITIZE_STRING,
    "price"         => FILTER_SANITIZE_NUMBER_INT,
    "category"      => FILTER_SANITIZE_STRING
];

$product = filter_input_array(INPUT_POST, $rules);
// Validation des données
$isPosted = count($_POST) > 0;
$errors = [];

if ($isPosted) {
    if (empty($product["product_name"])) {
        array_push($errors, "Le nom du produit ne peut être vide");
    }
    if (empty($product["price"])) {
        array_push($errors, "Le prix ne peut être vide");
    }
    if (empty($product["category"])) {
        array_push($errors, "La catégorie ne peut être vide");
    }

    // Si les données sont valides on appelle une fonction
    // insertProduct en passant les données du produit à insérer
    // Si ok alors redirection vers la liste des produits
    // Sinon définition d'une erreur qui sera affichée dans la vue
    if (count($errors) == 0) {

        if (insertProduct($product)) {
            header("location:index.php?c=liste-produits");
        } else {
            array_push($errors, "Impossible d'insérer vos données dans la base");
        }
    }
}
$pageTitle = "Nouveau produit";
$page = "view-formulaire-produit";
include VIEW_PATH . "layout.php";
<?php
// Inclusion du modèle de gestion des produits

// Récupération des données si elles ont été postées

// Validation des données

// Si les données sont valides on appelle une fonction
// insertProduct en passant les données du produit à insérer
// Si ok alors redirection vers la liste des produits
// Sinon définition d'une erreur qui sera affichée dans la vue

$pageTitle = "Nouveau produit";
$page = "view-formulaire-produit";
include VIEW_PATH . "layout.php";
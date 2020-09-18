<?php
require_once MODEL_PATH . "pdo.php";

function getAllProducts()
{
    $pdo = getPDO();
    $resultSet = $pdo->query("SELECT * FROM products");
    return $resultSet->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Suppression d'un produit dans la base de données
 * En fonction de son id
 *
 * @param [type] $id
 * @return void
 */
function deleteOneProductById($id)
{
    // Obtenir une connexion à la base de données
    $pdo = getPDO();
    // Requête SQL de suppression
    // en passant l'id en paramètre
    $sql = "DELETE FROM products WHERE id= ?";
    // Préparation de la requête 
    // et stockage du résultat dans une variable statement
    $statement = $pdo->prepare($sql);
    // Exécution de la requête préparée (statement)
    // avec définition de la valeur des paramètres
    return $statement->execute([$id]);
}

/**
 * Insertion d'un produit dans la base de données
 * en fonction de données passées en argument
 *
 * @param array $product
 * @return void
 */
function insertProduct(array $product)
{
}
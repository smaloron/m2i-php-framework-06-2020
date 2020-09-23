<?php

function classLoader($className)
{
    // Liste des dossiers dans lesquels on cherche la classe
    $folderList = ["classes", "models"];
    // La classe a-t-elle été trouvée
    $found = false;

    // boucle sur la liste des dossier
    foreach ($folderList as $folder) {
        // Test de l'existence du fichier
        // Si vrai alors require et $found == true
        $classPath = "../$folder/$className.php";
        if (file_exists($classPath)) {
            $found = true;
            require_once $classPath;
            break;
        }
    }
    // Si $found == false alors on lève une exception
    if (!$found) {
        throw new Exception("Fichier $classPath non trouvé");
    }
}

spl_autoload_register("classLoader");
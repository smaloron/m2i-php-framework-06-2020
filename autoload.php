<?php

function classLoader($className)
{
    $classPath = "../classes/$className.php";
    if (file_exists($classPath)) {
        require_once $classPath;
    } else {
        throw new Exception("Fichier $classPath non trouvé");
    }
}

spl_autoload_register("classLoader");
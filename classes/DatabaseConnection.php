<?php

class DatabaseConnection
{

    // Variable statique chargée de stocker l'instance de PDO 
    private static $instance = null;

    public static $numberOfInstances = 0;

    // Pour éviter d'instancier plusieurs fois
    // Le constructeur est rendu privé
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            $dsn = "mysql:host=127.0.0.1;dbname=formation;charset=utf8";
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            self::$instance = new PDO($dsn, "root", "", $options);
            self::$numberOfInstances++;
        }

        return self::$instance;
    }
}

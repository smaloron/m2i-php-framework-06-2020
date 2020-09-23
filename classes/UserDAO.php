<?php

/**
 * Classe d'accès au données de la table users
 */
class UserDAO
{

    /**
     * Une instance de PDO pour se connecter à la base de données
     * @var PDO
     */
    private $connection;

    /**
     * Constructeur de la classe 
     * avec injection de l'instance de PDO
     *
     * @param PDO $cn
     */
    public function __construct(PDO $cn)
    {
        $this->connection = $cn;
    }

    /**
     * Sélection de toutes les données de la table users
     *
     * @return array
     */
    public function findAll(): array
    {
        // La requête SQL
        $sql = "SELECT * FROM users";
        // Préparation de la requête sur la base de données
        $statement = $this->connection->prepare($sql);
        // Exécution de la requête préparée
        $statement->execute();

        // Retourne la liste des utilisateurs sous la forme d'un tableau
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Sélection d'un utilisateur en fonction de son id
     *
     * @param integer $id
     * @return array
     */
    public function findOneById(int $id): array
    {
        // La requête SQL
        $sql = "SELECT * FROM users WHERE id = ?";

        // Préparation de la requête sur la base de données
        $statement = $this->connection->prepare($sql);
        // Exécution de la requête préparée
        $statement->execute([$id]);

        // Retourne un utilisateur sous la forme d'un tableau associatif
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Insère un nouvel utilisateur dans la base 
     * et retourne l'id généré par cette insertion
     *
     * @param array $data
     * @return int
     */
    public function insertOne(array $data): int
    {
        // Requêt SQL
        $sql = "INSERT INTO users (user_name, user_email, user_password)
                VALUES (:user_name, :user_email, :user_password)";

        // Préparation de la requête sur la base de données
        $statement = $this->connection->prepare($sql);
        // Exécution de la requête préparée
        $statement->execute($data);

        // retourne l'id généré par l'insertion
        return $this->connection->lastInsertId();
    }

    /**
     * Supprime un utilisateur en fonction de son id
     * et retourne un booléen indiquant que la suppression est effective
     *
     * @param integer $id
     * @return bool
     */
    public function deleteOneById(int $id): bool
    {
    }
}
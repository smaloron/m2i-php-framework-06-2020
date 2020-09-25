<?php

/**
 * Classe d'accès au données de la table books
 */
class BookDAO implements BookDAOInterface
{

    const SELECT_QUERY = "SELECT 
                            id, title, author, genre
                            published_at as publishedAt 
                            FROM books";

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
     * Sélection de toutes les données de la table books
     *
     * @return BookModel[]
     */
    public function findAll(string $orderBy = ""): array
    {
        // La requête SQL
        $sql = self::SELECT_QUERY;
        if (!empty($orderBy)) {
            $sql .= " ORDER BY $orderBy";
        }
        // Préparation de la requête sur la base de données
        $statement = $this->connection->prepare($sql);
        // Exécution de la requête préparée
        $statement->execute();

        // Retourne la liste des livres sous la forme d'un tableau
        $statement->setFetchMode(PDO::FETCH_CLASS, "BookModel");
        return $statement->fetchAll();
    }

    public function find(array $search = [], string $orderBy = ""): array
    {
        // La requête SQL
        $sql = self::SELECT_QUERY;

        if (count($search) > 0) {
            $sql .= " WHERE ";
            $fields = array_keys($search);

            $fields = array_map(function ($item) {
                return $item . "=:" . $item;
            }, $fields);

            $sql .= implode(" AND ", $fields);
        }

        if (!empty($orderBy)) {
            $sql .= " ORDER BY $orderBy";
        }

        var_dump($sql);
        // Préparation de la requête sur la base de données
        $statement = $this->connection->prepare($sql);
        // Exécution de la requête préparée
        $statement->execute($search);

        // Retourne la liste des livres sous la forme d'un tableau
        $statement->setFetchMode(PDO::FETCH_CLASS, "BookModel");
        return $statement->fetchAll();
    }

    /**
     * Sélection d'un livre en fonction de son id
     *
     * @param integer $id
     * @return BookModel
     */
    public function findOneById(int $id): BookModel
    {
        // La requête SQL
        $sql = self::SELECT_QUERY . " WHERE id= ?";

        // Préparation de la requête sur la base de données
        $statement = $this->connection->prepare($sql);
        // Exécution de la requête préparée
        $statement->execute([$id]);

        // Retourne un utilisateur sous la forme d'un tableau associatif
        $statement->setFetchMode(PDO::FETCH_CLASS, "BookModel");
        return $statement->fetch();
    }

    /**
     * Insère un nouveau livre dans la base 
     * et retourne l'id généré par cette insertion
     *
     * @param BookModel $book
     * @return void
     */
    private function insertOne(BookModel $book): void
    {
        // Requêt SQL
        $sql = "INSERT INTO books (title, author, genre, published_at)
                VALUES (:title, :author, :genre, :published_at)";

        // Préparation de la requête sur la base de données
        $statement = $this->connection->prepare($sql);

        // Définition des valeurs passée à la requête préparée
        $statement->bindValue(":title", $book->getTitle());
        $statement->bindValue(":author", $book->getAuthor());
        $statement->bindValue(":genre", $book->getGenre());
        $statement->bindValue(":published_at", $book->getPublishedAt());

        // Exécution de la requête préparée
        $statement->execute();

        // Affecte l'id généré par l'insertion à l'objet
        $generatedId = $this->connection->lastInsertId();
        $book->setId($generatedId);
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
        // La requête SQL
        $sql = "DELETE FROM users WHERE id = ?";

        // Préparation de la requête sur la base de données
        $statement = $this->connection->prepare($sql);
        // Exécution de la requête préparée
        return $statement->execute([$id]);
    }

    /**
     * Met à jour un utilisateur en fonction d'un tabeau $data
     * ce tableau doit impérativement avoir une clef id
     * Si ce tableau n'a pas de clef id on renvoie une exception
     * La fonction retourne un booléen
     *
     * @param [type] $data
     * @return void
     */
    private function updateOne(UserModel $user): void
    {
        // Requêt SQL
        $sql = "UPDATE users SET 
            user_name=:user_name, 
            user_email=:user_email, 
            user_password=:user_password 
            WHERE id=:id";

        // Préparation de la requête sur la base de données
        $statement = $this->connection->prepare($sql);

        // Définition des valeurs passée à la requête préparée
        $statement->bindValue(":user_name", $user->getName());
        $statement->bindValue(":user_email", $user->getEmail());
        $statement->bindValue(":user_password", $user->getPassword());
        $statement->bindValue(":id", $user->getId());

        // Exécution de la requête préparée
        $statement->execute();
    }

    public function save(UserModel $user): void
    {
        if (empty($user->getId())) {
            $this->insertOne($user);
        } else {
            $this->updateOne($user);
        }
    }
}
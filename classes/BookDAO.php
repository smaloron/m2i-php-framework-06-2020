<?php

/**
 * Classe d'accès au données de la table books
 */
class BookDAO implements BookDAOInterface
{

    const SELECT_QUERY = "SELECT 
                            id, title, author, genre,
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
     * @return BookModel | bool
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
        $data =  $statement->fetch();
        if (!$data) {
            throw new RecordNotFoundException("Aucun résultat pour cet id");
        }
        return $data;
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
        $statement->bindValue(":published_at", $book->getPublishedAt()->format('Y-m-d'));

        // Exécution de la requête préparée
        $statement->execute();

        // Affecte l'id généré par l'insertion à l'objet
        $generatedId = $this->connection->lastInsertId();
        $book->setId($generatedId);
    }

    /**
     * Supprime un livre en fonction de son id
     * et retourne un booléen indiquant que la suppression est effective
     *
     * @param integer $id
     * @return bool
     */
    public function deleteOneById(int $id): bool
    {
        // La requête SQL
        $sql = "DELETE FROM books WHERE id = ?";

        // Préparation de la requête sur la base de données
        $statement = $this->connection->prepare($sql);
        // Exécution de la requête préparée
        return $statement->execute([$id]);
    }

    /**
     * Met à jour un livre en fonction d'un object $book
     *
     * @param [type] $data
     * @return void
     */
    private function updateOne(BookModel $book): void
    {
        // Requêt SQL
        $sql = "UPDATE books SET 
            title=:title, 
            author=:author, 
            genre=:genre
            published_at=:published_at 
            WHERE id=:id";

        // Préparation de la requête sur la base de données
        $statement = $this->connection->prepare($sql);

        // Définition des valeurs passée à la requête préparée
        $statement->bindValue(":title", $book->getTitle());
        $statement->bindValue(":author", $book->getAuthor());
        $statement->bindValue(":genre", $book->getGenre());
        $statement->bindValue(":published_at", $book->getPublishedAt()->format('Y-m-d'));
        $statement->bindValue(":id", $book->getId());

        // Exécution de la requête préparée
        $statement->execute();
    }

    public function save(BookModel $book): void
    {
        if (empty($book->getId())) {
            $this->insertOne($book);
        } else {
            $this->updateOne($book);
        }
    }
}
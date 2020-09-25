<?php

class BookModel
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $genre;

    /** @var DateTime */
    private $publishedAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @param integer $id
     * @return BookModel
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    /**
     * @param string $title
     * @return BookModel
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }
    /**
     * @param string $name
     * @return BookModel
     */
    public function setAuthor(string $author): self
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getGenre(): string
    {
        return $this->genre;
    }
    /**
     * @param string $name
     * @return BookModel
     */
    public function setGenre(string $genre): self
    {
        $this->genre = $genre;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getPublishedAt(): DateTime
    {
        return $this->publishedAt;
    }
    /**
     * @param DateTime $date
     * @return BookModel
     */
    public function setPublishedAt(DateTime $date): self
    {
        $this->publishedAt = $date;
        return $this;
    }
}
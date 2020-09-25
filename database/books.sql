USE formation;
DROP TABLE IF EXISTS books;
CREATE TABLE books (
    id MEDIUMINT UNSIGNED AUTO_INCREMENT,
    title VARCHAR(80) NOT NULL,
    author VARCHAR(50) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    published_at DATE NOT NULL,
    PRIMARY KEY (id)
);
INSERT INTO books (title, author, genre, published_at)
VALUES (
        'Javascript pour les nuls',
        'Andy Hunt',
        'Informatique',
        '2010-09-15'
    ),
    (
        'Alcool',
        'Guillaume Apollinaire',
        'Poésie',
        '1914-10-12'
    );
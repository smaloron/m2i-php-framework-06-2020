<?php

$myBook = new BookModel();

$myBook->setTitle('Une saison en enfer')
    ->setAuthor('Arthur Rimbaud')
    ->setGenre('Poésie')
    ->setPublishedAt(new DateTime('2002-06-30'));

$dao = new BookDAO(DatabaseConnection::getInstance());

// Sauvegarde de l'entité
$dao->save($myBook);

var_dump($myBook);

// Affichage des tous les livres
var_dump($dao->findAll());
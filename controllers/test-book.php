<?php

$myBook = new BookModel();

$myBook->setTitle('Une saison en enfer')
    ->setAuthor('Arthur Rimbaud')
    ->setGenre('Poésie')
    ->setPublishedAt(new DateTime('2002-06-30'));

$dao = new BookDAO(DatabaseConnection::getInstance());

/*
// Sauvegarde de l'entité
$dao->save($myBook);

var_dump($myBook);

// Affichage des tous les livres
var_dump($dao->findAll());

// Affichage d'un seul livre
var_dump($dao->findOneById(1));

// Suppression d'un livre
$dao->deleteOneById(3);

// Affichage des tous les livres
var_dump($dao->findAll());
*/

$myBook = $dao->findOneById(1);
$myBook->setAuthor("Victor Hugo");

$dao->save($myBook);

var_dump($dao->findAll());
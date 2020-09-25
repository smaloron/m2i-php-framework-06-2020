<?php

$myBook = new BookModel();

$myBook->setTitle('Une saison en enfer')
    ->setAuthor('Arthur Rimbaud')
    ->setGenre('Poésie')
    ->setPublishedAt(new DateTime('2002-06-30'));

var_dump($myBook);
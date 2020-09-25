<?php

$myBook = new BookModel();

$myBook->setTitle('Une saison en enfer')
    ->setAuthor('Arthur Rimbaud')
    ->setGenre('Poésie')
    ->setPublishedAt(new DateTime('now - 18 years -3 months + 5 days'));

var_dump($myBook);
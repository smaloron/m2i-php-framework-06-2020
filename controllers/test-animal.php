<?php

$yoko = new Cat();

$yoko->breathe();
$yoko->move();
$yoko->hunt();

$farm = new Farm();
var_dump($farm);
$farm
    ->addInhabitant(new Cat)
    ->addInhabitant(new Cow)
    ->addInhabitant(new Sparrow);

$farm->move();
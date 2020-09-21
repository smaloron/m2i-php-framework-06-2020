<?php
require "../classes/Person.php";

$joe = new Person("", "m");
// $joe->setName("Joe le taxi")->setGender("1235");
echo $joe->greet() . "<br>";

$jane = new Person("Jane Doe", "f");
echo $jane->greet();
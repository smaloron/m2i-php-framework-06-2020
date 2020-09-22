<?php
require "../classes/Person.php";
require "../classes/Htmlist.php";
require "../classes/Student.php";
require "../classes/Address.php";

$liste = new HtmlList(["items" => ["Chocolat", "Oeufs", "Abergines"], "type" => "ol"]);


$liste->addItem("Sucre")->addItem("Farine")->addItem("Sucre");
echo $liste->render();

$address = new Address("5 rue Orfila", "75020", "Paris");
$joe = new Person(["name" => "Joe", "gender" => "m"], $address);
$joe->setEyeColor(Person::COLOR_BLUE);

echo "<p>" . $joe->greet() . "</p>";

$newAddress = new Address("4 Grande rue", "25000", "Besançon");
$joe->setAddress($newAddress);

var_dump($joe);

$vincent = new Student();
$vincent->setSchool("Beaux Arts");
$vincent->setName("Vincent");
$vincent->setGender("m");


var_dump($vincent);

$alice = new Student(["name" => "Alice", "gender" => "f", "school" => "La Sorbonne"]);

var_dump($alice);
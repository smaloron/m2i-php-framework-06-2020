<?php
require "../classes/Person.php";
require "../classes/Htmlist.php";
require "../classes/Student.php";

$liste = new HtmlList(["items" => ["Chocolat", "Oeufs", "Abergines"], "type" => "ol"]);


$liste->addItem("Sucre")->addItem("Farine")->addItem("Sucre");
echo $liste->render();

$joe = new Person(["name" => "Joe", "gender" => "m"]);
$joe->setEyeColor(Person::COLOR_BLUE);

echo "<p>" . Person::$numberOfInstances . "</p>";

$jane = new Person();
echo "<p>" . Person::$numberOfInstances . "</p>";

$vincent = new Student();
$vincent->setSchool("Beaux Arts");
$vincent->setName("Vincent");
$vincent->setGender("m");


var_dump($vincent);

$alice = new Student(["name" => "Alice", "gender" => "f", "school" => "La Sorbonne"]);

var_dump($alice);
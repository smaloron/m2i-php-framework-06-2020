<?php
require "../classes/Person.php";
require "../classes/Htmlist.php";

$liste = new HtmlList(["items" => ["Chocolat", "Oeufs", "Abergines"], "type" => "ol"]);


$liste->addItem("Sucre")->addItem("Farine")->addItem("Sucre");
echo $liste->render();

$joe = new Person(["name" => "Joe", "gender" => "m"]);
$joe->setEyeColor(Person::COLOR_BLUE);

echo "<p>" . Person::$numberOfInstances . "</p>";

$jane = new Person();
echo "<p>" . Person::$numberOfInstances . "</p>";
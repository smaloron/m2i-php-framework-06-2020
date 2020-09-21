<?php
require "../classes/Person.php";
require "../classes/Htmlist.php";

$liste = new HtmlList(["items" => ["Chocolat", "Oeufs", "Abergines"]]);

var_dump($liste);
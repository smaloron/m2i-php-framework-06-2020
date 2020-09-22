<?php

$marie = new Person(
    ["name" => "Marie", "gender" => "f"],
    new Address("18 boulevard du Temple", "75011", "Paris")
);

echo $marie->greet();
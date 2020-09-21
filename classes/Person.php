<?php

class Person
{

    private $name;

    private $gender;

    public function __construct($name, $gender)
    {
        $this->name = $this->setName($name);
        $this->gender = $this->setGender($gender);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($value)
    {
        if (trim($value) == "") {
            throw new InvalidArgumentException("Le nom ne peut être vide");
        }
        $this->name = $value;
        return $this;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($value)
    {
        if (!in_array($value, ["m", "f"])) {
            throw new InvalidArgumentException("Le genre doit être m ou f");
        }
        $this->gender = $value;
        return $this;
    }

    public function greet()
    {
        $greeting = $this->gender == "m" ? "monsieur " : "madame ";
        $greeting = $greeting . $this->name;
        return "Bonjour $greeting";
    }
}
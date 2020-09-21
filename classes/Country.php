<?php

class Country
{

    private $countryId;

    private $countryCode;

    private $countryName;

    public function getId()
    {
        return $this->countryId;
    }
    public function getCode()
    {
        return $this->countryCode;
    }
    public function getName()
    {
        return $this->countryName;
    }

    public function __construct($id, $code, $name)
    {
        $this->setId($id);
        $this->setCode($code);
        $this->setName($name);
    }

    public function setId($value)
    {
        if (!is_int($value)) {
            throw new InvalidArgumentException("L'id doit être un entier");
        }
        $this->countryId = $value;
    }

    public function setCode($value)
    {
        if (!is_int($value)) {
            throw new InvalidArgumentException("Le code doit être un entier");
        }
        $this->countryCode = $value;
    }

    public function setName($value)
    {
        if (trim($value) == "") {
            throw new InvalidArgumentException("Le nom ne peut être vide");
        }
        $this->countryName = $value;
    }

    public function __toString()
    {
        return $this->countryName . " (" . $this->countryCode . ")";
    }
}
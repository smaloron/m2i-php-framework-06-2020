<?php

class Person
{

    const COLOR_BLUE = "#00FFFF";
    const COLOR_GREEN = "#00FF00";

    public static $numberOfInstances = 0;

    private $name;

    private $gender;

    private $eyeColor;

    /**
     * @var Address
     */
    private $address;

    public function __construct(array $data = [], Address $address = null)
    {
        if (count($data) > 0 && isset($data["name"]) && isset($data["gender"])) {
            $this->setName($data["name"]);
            $this->setGender($data["gender"]);
        }

        $this->address = $address;
        self::$numberOfInstances++;
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

    public function setEyeColor($value)
    {
        $this->eyeColor = $value;
    }

    /**
     * Undocumented function
     *
     * @param Address $address
     * @return Person
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
        return $this;
    }

    public function greet()
    {
        $greeting = $this->gender == "m" ? "monsieur " : "madame ";
        $greeting = $greeting . $this->name;

        if ($this->address) {
            $greeting .= " vous habitez au " . $this->address;
        }
        return "Bonjour $greeting ";
    }
}
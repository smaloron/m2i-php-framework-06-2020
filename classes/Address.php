<?php

class Address
{

    private $street;

    private $zipCode;

    private $city;

    public function __construct($street, $zip, $city)
    {
        $this->street = $street;
        $this->zipCode = $zip;
        $this->city = $city;
    }

    function getStreet()
    {
        return $this->street;
    }

    function setStreet($value)
    {
        $this->street = $value;
    }

    function getzipCode()
    {
        return $this->zipCode;
    }

    function setZipCode($value)
    {
        $this->zipCode = $value;
    }

    function getCity()
    {
        return $this->city;
    }

    function setCity($value)
    {
        $this->city = $value;
    }

    public function __toString()
    {
        return $this->street . " " . $this->zipCode . " " . $this->city;
    }
}
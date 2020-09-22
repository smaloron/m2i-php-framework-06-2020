<?php

class QueryBuilder
{


    private $commandValue;

    private $fromValue;

    public function select(string $value)
    {
        $this->commandValue = "SELECT $value";
        return $this;
    }

    public function from(string $table)
    {
        $this->fromValue = "FROM $table";
        return $this;
    }

    public function getSQL()
    {
        return $this->commandValue . " " . $this->fromValue;
    }
}

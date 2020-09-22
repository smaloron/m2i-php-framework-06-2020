<?php

class QueryBuilder
{

    private $commandValue;

    private $fromValue;

    private $whereValues = [];

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

    public function where(array $values)
    {
        $this->whereValues = $values;
        return $this;
    }

    public function getSQL()
    {
        $sql = $this->commandValue . " " . $this->fromValue;

        if (count($this->whereValues) > 0) {
            $sql .= " WHERE " . join(" AND ", $this->whereValues);
        }

        return $sql;
    }
}
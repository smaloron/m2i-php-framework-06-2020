<?php

class Farm
{
    /**
     * @var array
     */
    private $inhabitants = [];

    /**
     * @return Farm
     */
    public function addInhabitant(Animal $animal)
    {
        array_push($this->inhabitants, $animal);
        return $this;
    }


    public function move()
    {
        foreach ($this->inhabitants as $member) {
            $member->move();
        }
    }
}
<?php

abstract class Animal
{

    public function breathe()
    {
        echo "<p>je respire</p>";
    }

    public abstract function move();
}
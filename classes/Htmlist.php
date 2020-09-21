<?php

/**
 * Modèise une liste html
 */
class HtmlList
{

    private $type = "ul";


    private $items = [];

    public function __construct(array $data)
    {
        if (isset($data["type"])) {
            $this->setType($data["type"]);
        }

        if (isset($data["items"]) && is_array($data["items"])) {
            $this->items = $data["items"];
        }
    }

    public function render()
    {
        echo "";
    }

    public function setType($type)
    {
        if (!in_array($type, ["ul", "ol"])) {
            throw new InvalidArgumentException("Seulement des types UL et OL");
        }
        $this->type = $type;
    }
}
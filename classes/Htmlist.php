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

    /**
     * Ajout d'un nouvel élément à liste
     * Si cet élément n'est pas déjà présent dans la liste
     *
     * @param [type] $value
     * @return HtmlList
     */
    public function addItem($value)
    {
        if (!in_array($value, $this->items)) {
            array_push($this->items, $value);
        }

        return $this;
    }

    public function render()
    {
        $html = "<" . $this->type . ">";

        foreach ($this->items as $listItem) {
            $html .= "<li>$listItem</li>";
        }

        $html .= "</" . $this->type . ">";

        return $html;
    }

    public function setType($type)
    {
        if (!in_array($type, ["ul", "ol"])) {
            throw new InvalidArgumentException("Seulement des types UL et OL");
        }
        $this->type = $type;
    }
}
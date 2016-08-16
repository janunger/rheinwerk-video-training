<?php

class Kuchen
{
    private $geschmacksrichtung;

    public function __construct($geschmacksrichtung)
    {
        $this->geschmacksrichtung = $geschmacksrichtung;
    }

    public function getGeschmacksrichtung()
    {
        return $this->geschmacksrichtung;
    }
}
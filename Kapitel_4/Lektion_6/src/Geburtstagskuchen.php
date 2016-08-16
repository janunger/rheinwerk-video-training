<?php

class Geburtstagskuchen extends Kuchen
{
    private $anzahlKerzen = 0;

    public function bringeKerzenAn($anzahl)
    {
        $this->anzahlKerzen = $anzahl;
    }

    public function getAnzahlKerzen()
    {
        return $this->anzahlKerzen;
    }
}
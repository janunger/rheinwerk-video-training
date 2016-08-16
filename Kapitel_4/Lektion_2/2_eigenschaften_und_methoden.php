<?php

class Foto
{
    private $dateiname;

    private $tags = 'Natur';

    public function __construct($dateiname)
    {
        $this->dateiname = $dateiname;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function getDateiname()
    {
        return $this->dateiname;
    }
}

$foto1 = new Foto('1.jpg');

$ergebnis = $foto1->getTags();
var_dump($ergebnis);

$foto1->setTags('Natur, Gebäude');
var_dump($foto1->getTags());

var_dump($foto1->getDateiname());

var_dump($foto1);


$foto2 = new Foto('2.jpg');
var_dump($foto2);
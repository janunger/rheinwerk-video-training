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

    public function skaliere($maxAbmessung)
    {
        $this->loadFile();
        // image...
        $this->saveFile();
    }

    private function loadFile()
    {
        // ...
    }

    private function saveFile()
    {
        // ...
    }
}

class Datenbank
{
    public function speichere(Foto $objekt)
    {
        $dateiname = $objekt->getDateiname();
        $tags = $objekt->getTags();

        // Daten in MySQL speichern
        // ...
    }
}

$foto1 = new Foto('1.jpg');
$db = new Datenbank();

$db->speichere($foto1);
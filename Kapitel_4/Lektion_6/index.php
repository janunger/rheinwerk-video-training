<?php

require __DIR__ . '/autoload.php';

$kuchen = new Kuchen('Schokolade');
var_dump($kuchen->getGeschmacksrichtung());

$kuchen2 = new Geburtstagskuchen('Erdbeer');
var_dump($kuchen2->getGeschmacksrichtung());

var_dump($kuchen2->getAnzahlKerzen());

$kuchen2->bringeKerzenAn(3);
var_dump($kuchen2->getAnzahlKerzen());

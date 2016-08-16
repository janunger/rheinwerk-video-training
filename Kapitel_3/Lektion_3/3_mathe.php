<?php

$meineListe = [2, 3, 1];
$ergebnis = max($meineListe);
var_dump($ergebnis);

$meineListe = [2, 3, 1];
$ergebnis = min($meineListe);
var_dump($ergebnis);



$ergebnis = round(1.51);
var_dump($ergebnis);

$ergebnis = round(1.51, 1);
var_dump($ergebnis);

$ergebnis = floor(1.51);
var_dump($ergebnis);

$ergebnis = ceil(1.51);
var_dump($ergebnis);



$ergebnis = mt_rand();
var_dump($ergebnis);

$ergebnis = mt_rand(5, 10);
var_dump($ergebnis);


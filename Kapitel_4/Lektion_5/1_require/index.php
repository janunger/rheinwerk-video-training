<?php

require __DIR__ . '/src/Controller.php';
require __DIR__ . '/src/Datenbank.php';

$controller = new Controller();
$db = new Datenbank();

var_dump($controller);
var_dump($db);
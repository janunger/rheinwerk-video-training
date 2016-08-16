<?php

require __DIR__ . '/autoload.php';

$motor = new Motor();
$auto = new Auto($motor);

$auto->starte();
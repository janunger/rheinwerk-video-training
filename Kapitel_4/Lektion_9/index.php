<?php

require __DIR__ . '/autoload.php';

$autoFactoryService = new AutoFactory();

$auto1 = $autoFactoryService->baueAuto();
$auto2 = $autoFactoryService->baueAuto();
$auto3 = $autoFactoryService->baueAuto();
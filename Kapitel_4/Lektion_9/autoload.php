<?php

spl_autoload_register(function ($klassenname) {
    $klassenpfad = str_replace('\\', '/', $klassenname);
    require __DIR__ . '/src/' . $klassenpfad . '.php';
});

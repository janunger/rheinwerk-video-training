<?php

spl_autoload_register(function ($klassenname) {
    require __DIR__ . '/src/' . $klassenname . '.php';
});

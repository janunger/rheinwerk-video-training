<?php

session_start();

if (!isset($_SESSION['warenkorb'])) {
    $_SESSION['warenkorb'] = [];
}

function holeSortiment()
{
    return [
        1 => 'Moderne Webseiten entwickeln',
        2 => 'PHP 7 und MySQL - Das umfassende Handbuch',
        3 => 'Der große Fotokurs - Richtig fotografieren lernen'
    ];
}

function zaehleWarenkorb()
{
    $ergebnis = 0;
    foreach ($_SESSION['warenkorb'] as $artikelId => $anzahl) {
        $ergebnis += $anzahl;
    }

    return $ergebnis;
}

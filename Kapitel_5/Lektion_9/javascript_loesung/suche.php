<?php

$body = file_get_contents('php://input');
$eingabe = json_decode($body, true);

$suchbegriff = $eingabe['suchbegriff'];

$laender = [
    'Albanien',
    'Andorra',
    'Belgien',
    'Bosnien und Herzegowina',
    'Bulgarien',
    'Dänemark',
    'Deutschland',
    'Estland',
    'Finnland',
    'Frankreich',
    'Griechenland',
    'Irland',
    'Island',
    'Italien',
    'Kasachstan',
    'Kosovo',
    'Kroatien',
    'Lettland',
    'Liechtenstein',
    'Litauen',
    'Luxemburg',
    'Malta',
    'Mazedonien',
    'Moldawien',
    'Monaco',
    'Montenegro',
    'Niederlande',
    'Norwegen',
    'Österreich',
    'Polen',
    'Portugal',
    'Rumänien',
    'Russland',
    'San Marino',
    'Schweden',
    'Schweiz',
    'Serbien',
    'Slowakei',
    'Slowenien',
    'Spanien',
    'Tschechien',
    'Türkei',
    'Ukraine',
    'Ungarn',
    'Vatikanstadt',
    'Vereinigtes Königreich',
    'Weißrussland'
];

$ergebnisliste = [];
foreach ($laender as $land) {
    if (false !== stripos($land, $suchbegriff)) {
        $ergebnisliste[] = $land;
    }
}

header('Content-Type: application/json');
echo json_encode($ergebnisliste);
<?php

const PFAD_FOTOS = __DIR__ . '/fotos/';
const PFAD_MINIATUREN = __DIR__ . '/miniaturen/';
const MAXIMALE_BREITE = 100;

$dateiname = basename($_GET['dateiname']);
$dateipfadFoto = PFAD_FOTOS . $dateiname;
$dateipfadMiniatur = PFAD_MINIATUREN . $dateiname;

if (!file_exists($dateipfadMiniatur)) {

    // Abmessungen des Fotos ermitteln
    list($breite, $hoehe) = getimagesize($dateipfadFoto);

    // Gewünschte Abmessungen der Miniatur berechnen
    $neueBreite = MAXIMALE_BREITE;
    $faktor = MAXIMALE_BREITE / $breite;
    $neueHoehe = round($faktor * $hoehe);

    // Bild skalieren
    $foto = imagecreatefromjpeg($dateipfadFoto);
    $miniatur = imagecreatetruecolor($neueBreite, $neueHoehe);
    imagecopyresampled($miniatur, $foto, 0, 0, 0, 0, $neueBreite, $neueHoehe, $breite, $hoehe);

    // Miniatur auf Festplatte speichern ("Caching")
    imagejpeg($miniatur, $dateipfadMiniatur, 90);
}

// Gespeicherte Miniatur von Festplatte laden und an den Browser senden
header('Content-Type: image/jpeg');
readfile($dateipfadMiniatur);

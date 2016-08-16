<?php

$person = [
    'vorname'  => 'Max',
    'nachname' => 'Muster',
    'strasse'  => 'Musterstraße 1'
];


foreach ($person as $wert) {
    var_dump($wert);
    echo '<br>';
}


echo '<ul>';
foreach ($person as $wert) {
    echo '<li>' . $wert . '</li>';
}
echo '</ul>';


echo '<ul>';
foreach ($person as $schluessel => $wert) {
    echo '<li>' . $schluessel . ': ' . $wert . '</li>';
}
echo '</ul>';
<?php

$personen = [
    [
        'vorname' => 'Max',
        'nachname' => 'Muster'
    ],
    [
        'vorname' => 'Barbara',
        'nachname' => 'Beispiel'
    ]
];

foreach ($personen as $person) {
    var_dump($person);
    echo '<br>';
}

foreach ($personen as $person) {
    var_dump($person['nachname']);
    echo '<br>';
}
<?php

$passwortImKlartext = 'geheim';

// FALSCH!!!
$verschlüsseltesPasswort = md5($passwortImKlartext);

// FALSCH!!!
$verschlüsseltesPasswort = sha1($passwortImKlartext);

// Richtig: Passwort verschlüsseln
$verschlüsseltesPasswort = password_hash($passwortImKlartext, PASSWORD_BCRYPT);

// Richtig: Passwort überprüfen
$istKorrektesPasswort = password_verify($passwortImKlartext, $verschlüsseltesPasswort);
<?php

session_start();

// Login war erfolgreich ...
$_SESSION['benutzername'] = 'max.muster';

var_dump($_COOKIE);
var_dump($_SESSION);
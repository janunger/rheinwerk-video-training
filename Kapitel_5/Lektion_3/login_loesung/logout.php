<?php

session_start();

unset($_SESSION['benutzername']);

header('Location: login.php');
exit;
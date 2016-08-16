<?php

$pdo = new PDO('...');
$benutzername = $_POST['benutzername'];

// FALSCH!!!
$pdo->query("SELECT * FROM benutzer WHERE benutzername = '$benutzername'");

// Richtig
$statement = $pdo->prepare("SELECT * FROM benutzer WHERE benutzername = :benutzername");
$statement->execute(['benutzername' => $benutzername]);
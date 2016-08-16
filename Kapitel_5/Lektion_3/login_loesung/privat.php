<?php

session_start();

$istBenutzerAngemeldet = isset($_SESSION['benutzername']);

if ($istBenutzerAngemeldet) {
    $benutzername = $_SESSION['benutzername'];
} else {
    $benutzername = '';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Geschützter Bereich</title>
</head>
<body>

<h1>Geschützter Bereich</h1>

<?php if ($istBenutzerAngemeldet): ?>
    <p>angemeldet als <?= htmlspecialchars($benutzername); ?></p>
    <p>Weitere vertrauliche Inhalte ...</p>
    <p><a href="logout.php">Abmelden</a></p>
<?php else: ?>
    <p>Zugriff nur für angemeldete Benutzer</p>
    <p><a href="login.php">Zur Anmeldung</a></p>
<?php endif; ?>

</body>
</html>

<?php

require __DIR__ . '/_application.php';

$meldungen = [];

if (!isset($_GET['id'])) {
    $meldungen[] = 'Bitte geben Sie die ID des Liedes an, das Sie bearbeiten möchten.';
}

// TODO: Lied mit Angaben zu CD und Künstler aus der Datenbank laden
$lied = [];
if (!$lied) {
    $meldungen[] = 'Es konnte kein Lied mit der ID ' . htmlspecialchars($_GET['id']) . ' gefunden werden.';
}

if (isset($_POST['aktion']) && $_POST['aktion'] === 'speichern') {

    // TODO: Lied in der Datenbank aktualisieren

    header('Location: cd.php?id=' . htmlspecialchars($lied['cd_id']));
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mediathek</title>
</head>
<body>

<?php if (count($meldungen) > 0): ?>
    <p>Fehler:</p>
    <ul>
        <?php foreach ($meldungen as $meldung): ?>
            <li><?= htmlspecialchars($meldung) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<form action="lied_bearbeiten.php?id=<?= htmlspecialchars($_GET['id']) ?>" method="post">
    <h1>Lied bearbeiten</h1>
    <h2>'<?= htmlspecialchars($lied['cdname']) ?>' (<?= htmlspecialchars($lied['kuenstlername']) ?>)</h2>

    <label>Track
        <input type="text" name="track" value="<?= htmlspecialchars($lied['track']) ?>"/>
    </label>
    <label>Titel
        <input type="text" name="titel" value="<?= htmlspecialchars($lied['titel']) ?>"/>
    </label>
    <button type="submit" name="aktion" value="speichern">Speichern</button>
    <button type="submit" name="aktion" value="abbrechen">Abbrechen</button>
</form>

</body>
</html>

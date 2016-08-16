<?php

require __DIR__ . '/_application.php';

$meldungen = [];

if (!isset($_GET['id'])) {
    $meldungen[] = 'Bitte geben Sie die ID des Liedes an, das Sie löschen möchten.';
}

// TODO: Lied aus der Datenbank laden (analog zu lied_bearbeiten.php)
$lied = [];
if (!$lied) {
    $meldungen[] = 'Es konnte kein Lied mit der ID ' . htmlspecialchars($_GET['id']) . ' gefunden werden.';
}

if (isset($_POST['aktion']) && $_POST['aktion'] === 'loeschen') {

    // TODO: Lied aus der Datenbank löschen

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
<?php else: ?>
    <form action="lied_loeschen.php?id=<?= htmlspecialchars($_GET['id']) ?>" method="post">
        <h1>Lied löschen</h1>
        <h2>'<?= htmlspecialchars($lied['cdname']) ?>' (<?= htmlspecialchars($lied['kuenstlername']) ?>)</h2>

        <p>
            Möchten Sie Track <?= $lied['track'] ?> '<?= htmlspecialchars($lied['titel']) ?>' löschen?<br>
            Diese Aktion kann nicht rückgängig gemacht werden.
        </p>
        <button type="submit" name="aktion" value="loeschen">Löschen!</button>
        <button type="submit" name="aktion" value="abbrechen">Abbrechen</button>
    </form>
<?php endif; ?>

</body>
</html>

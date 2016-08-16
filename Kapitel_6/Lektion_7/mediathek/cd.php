<?php

require __DIR__ . '/_application.php';

if (count($_POST) > 0) {

    // TODO: Lied in die Datenbank speichern

    header('Location: cd.php?id=' . htmlspecialchars($_GET['id']));
    exit;
}

// TODO: CD aus der Datenbank laden
$cd = [];

// TODO: Lieder aus der Datenbank laden
$lieder = [];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mediathek</title>
</head>
<body>

<h1>
    <?= htmlspecialchars($cd['cdname']) ?>
    (<?= htmlspecialchars($cd['kuenstlername']) ?>, <?= htmlspecialchars($cd['erscheinungsjahr']) ?>)
</h1>

<form action="cd.php?id=<?= htmlspecialchars($_GET['id']) ?>" method="post">
    <table>
        <tr>
            <th>Track</th>
            <th>Titel</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($lieder as $lied): ?>
            <tr>
                <td><?= htmlspecialchars($lied['track']) ?></td>
                <td><?= htmlspecialchars($lied['titel']) ?></td>
                <td><a href="lied_bearbeiten.php?id=<?= htmlspecialchars($lied['id']) ?>">Bearbeiten ...</a></td>
                <td><a href="lied_loeschen.php?id=<?= htmlspecialchars($lied['id']) ?>">Löschen ...</a></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td><input type="text" name="track" placeholder="Track"/></td>
            <td><input type="text" name="titel" placeholder="Titel"/></td>
        </tr>
    </table>
    <input type="submit" value="Hinzufügen"/>
</form>

<p><a href="index.php">zur Übersicht</a></p>

</body>
</html>

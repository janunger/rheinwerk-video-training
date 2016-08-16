<?php

require __DIR__ . '/_application.php';

$db = holeDatenbankverbindung();

if (count($_POST) > 0) {
    $insertStatement = $db->prepare("INSERT INTO lieder (cd_id, track, titel) VALUES (:cd_id, :track, :titel)");
    $insertStatement->execute([
        'cd_id' => $_GET['id'],
        'track' => $_POST['track'],
        'titel' => $_POST['titel']
    ]);

    header('Location: cd.php?id=' . htmlspecialchars($_GET['id']));
    exit;
}

$cdStatement = $db->prepare("
    SELECT
        cds.id,
        cds.name AS cdname,
        cds.erscheinungsjahr,
        kuenstler.name AS kuenstlername
    FROM cds
    LEFT JOIN kuenstler ON cds.kuenstler_id = kuenstler.id
    WHERE cds.id = :cd_id
");
$cdStatement->execute(['cd_id' => $_GET['id']]);
$cd = $cdStatement->fetch(PDO::FETCH_ASSOC);

$liederStatement = $db->prepare("SELECT * FROM lieder where cd_id = :cd_id ORDER BY track ASC");
$liederStatement->execute(['cd_id' => $_GET['id']]);
$lieder = $liederStatement->fetchAll(PDO::FETCH_ASSOC);

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

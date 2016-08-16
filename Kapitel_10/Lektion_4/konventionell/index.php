<?php

require __DIR__ . '/_application.php';

$db = holeDatenbankVerbindung();
$statement = $db->query("
    SELECT 
        c.id,
        c.name AS cdname,
        c.erscheinungsjahr,
        k.name AS kuenstlername
    FROM cds AS c
    LEFT JOIN kuenstler AS k ON c.kuenstler_id = k.id
");
$cds = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mediathek</title>
</head>
<body>

<table>
    <tr>
        <th>Künstler</th>
        <th>Album</th>
        <th>Erscheinungsjahr</th>
    </tr>
    <?php foreach ($cds as $cd): ?>
        <tr>
            <td><?= htmlspecialchars($cd['kuenstlername']) ?></td>
            <td>
                <a href="cd.php?id=<?= $cd['id'] ?>">
                    <?= htmlspecialchars($cd['cdname']) ?>
                </a>
            </td>
            <td><?= htmlspecialchars($cd['erscheinungsjahr']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>

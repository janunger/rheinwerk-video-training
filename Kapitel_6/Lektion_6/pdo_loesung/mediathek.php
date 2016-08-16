<?php

$pdo = new PDO(
    'mysql:dbname=mediathek;host=localhost',
    'root',
    'root',
    [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]
);

$statement = $pdo->query("SELECT * FROM cds ORDER BY name ASC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mediathek</title>
</head>
<body>

<h1>CDs</h1>

<table>
    <tr>
        <th>Name</th>
        <th>Erscheinungsjahr</th>
    </tr>
    <?php while ($datensatz = $statement->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td><?= htmlspecialchars($datensatz['name']); ?></td>
            <td><?= htmlspecialchars($datensatz['erscheinungsjahr']); ?></td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>

<?php

require __DIR__ . '/_applikation.php';

if (isset($_GET['hinzufuegen'])) {
    $artikelId = $_GET['hinzufuegen'];
    if (!isset($_SESSION['warenkorb'][$artikelId])) {
        $_SESSION['warenkorb'][$artikelId] = 0;
    }
    $_SESSION['warenkorb'][$artikelId]++;

    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artikelliste</title>
</head>
<body>

<p>
    <?php if (zaehleWarenkorb() == 0): ?>
        Ihr Warenkorb ist leer.
    <?php else: ?>
        Ihr Warenkorb enthält <?= htmlspecialchars(zaehleWarenkorb()); ?> Artikel.
    <?php endif; ?>
    - <a href="warenkorb.php">Warenkorb anzeigen</a>
</p>

<h1>Unser Angebot</h1>
<table>
    <?php foreach (holeSortiment() as $artikelId => $artikel) : ?>
        <tr>
            <td><?= htmlspecialchars($artikel); ?></td>
            <td><a href="index.php?hinzufuegen=<?= htmlspecialchars($artikelId); ?>">In den Warenkorb</a></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>


<?php

require __DIR__ . '/_applikation.php';

$sortiment = holeSortiment();

if (isset($_POST['aktualisieren'])) {
    foreach ($_POST['artikel'] as $artikelId => $anzahl) {
        if ($anzahl == 0) {
            unset($_SESSION['warenkorb'][$artikelId]);
        } else {
            $_SESSION['warenkorb'][$artikelId] = $anzahl;
        }
    }

    header('Location: warenkorb.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Warenkorb</title>
</head>
<body>

<h1>Ihr Warenkorb</h1>

<form action="warenkorb.php" method="post">
    <table>
        <tr>
            <th>Bezeichnung</th>
            <th>Anzahl</th>
        </tr>
        <?php foreach ($_SESSION['warenkorb'] as $artikelId => $anzahl) : ?>
            <tr>
                <td><?= htmlspecialchars($sortiment[$artikelId]); ?></td>
                <td>
                    <input type="text"
                           name="artikel[<?= htmlspecialchars($artikelId); ?>]"
                           value="<?= htmlspecialchars($anzahl); ?>"/>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <button type="submit" name="aktualisieren">Aktualisieren</button>
    </p>
</form>

<p><a href="index.php">Zur Produktauswahl</a></p>

</body>
</html>

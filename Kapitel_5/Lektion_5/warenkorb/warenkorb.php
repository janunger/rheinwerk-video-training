<?php

require __DIR__ . '/_applikation.php';

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
        <tr>
            <td>Moderne Webseiten entwickeln</td>
            <td>
                <input type="text"
                       name="artikel[1]"
                       value="1"/>
            </td>
        </tr>
    </table>
    <p>
        <button type="submit" name="aktualisieren">Aktualisieren</button>
    </p>
</form>

<p><a href="index.php">Zur Produktauswahl</a></p>

</body>
</html>

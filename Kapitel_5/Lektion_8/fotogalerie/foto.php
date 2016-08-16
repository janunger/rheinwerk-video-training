<?php

$dateiname = $_GET['dateiname'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fotogalerie - Foto <?= htmlspecialchars($dateiname); ?></title>
</head>
<body>
<h1>Foto <?= htmlspecialchars($dateiname); ?></h1>
<p>
    <img src="fotos/<?= htmlspecialchars($dateiname); ?>" alt="<?= htmlspecialchars($dateiname); ?>">
</p>
<p>
    <a href="index.php">Zurück</a>
</p>
</body>
</html>

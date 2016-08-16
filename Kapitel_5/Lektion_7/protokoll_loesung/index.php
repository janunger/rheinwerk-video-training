<?php

function protokoll($text)
{
    $datum = date('Y-m-d H:i:s');
    $eintrag = $datum . ': ' . $text . PHP_EOL;

    $datei = fopen(__DIR__ . '/protokoll.txt', 'a');
    fwrite($datei, $eintrag);
    fclose($datei);
}

if (isset($_GET['link'])) {
    protokoll('Link ' . htmlspecialchars($_GET['link']) . ' wurde geklickt.');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log</title>
</head>
<body>

<p><a href="?link=1">Link 1</a></p>
<p><a href="?link=2">Link 2</a></p>
<p><a href="?link=3">Link 3</a></p>

</body>
</html>

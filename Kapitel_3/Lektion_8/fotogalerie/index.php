<?php

$fotos = [
    [
        'dateiname' => '1.jpg',
        'tags'      => 'Industrie'
    ],
    [
        'dateiname' => '2.jpg',
        'tags'      => 'Gebäude'
    ],
    [
        'dateiname' => '3.jpg',
        'tags'      => 'Gebäude, Natur'
    ],
    [
        'dateiname' => '4.jpg',
        'tags'      => 'Industrie'
    ],
    [
        'dateiname' => '5.jpg',
        'tags'      => 'Natur'
    ],
    [
        'dateiname' => '6.jpg',
        'tags'      => 'Gebäude, Natur'
    ],
    [
        'dateiname' => '7.jpg',
        'tags'      => 'Natur'
    ],
    [
        'dateiname' => '8.jpg',
        'tags'      => 'Gebäude'
    ],
    [
        'dateiname' => '9.jpg',
        'tags'      => 'Industrie'
    ]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fotogalerie</title>
    <style>
        .miniatur {
            float: left;
        }

        .miniatur img {
            margin-right: 10px;
        }

        .clearfix {
            clear: both;
        }
    </style>
</head>
<body>
<h1>Fotogalerie</h1>
<p>1 von 1 Fotos</p>
<div>
    <div class="miniatur" style="float: left;">
        <a href="fotos/1.jpg">
            <img src="miniaturen/1.jpg" alt="1.jpg">
        </a>
    </div>
    Dateiname: 1.jpg<br>
    Tags: Industrie
    <div class="clearfix"></div>
</div>
<div>
    <form action="index.php" method="post">
        <label for="suchbegriff">Suchbegriff:</label>
        <input type="text" id="suchbegriff" name="suchbegriff" value=""/>
        <button type="submit">Anwenden</button>
    </form>
</div>
</body>
</html>

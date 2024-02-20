<?php

// RECUPERO DATI
require './data/info.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
</head>
<body>
    <h1>HOTEL</h1>
    <ul>
        <?php foreach ($hotels as $hotel) : ?>
            <li><?= $hotel['name'] ?></li>
            <li><?= $hotel['description'] ?></li>
            <li>
                <?php if(!$hotel['parking']) : ?>
                    <span>x</span>
                <?php else : ?>
                    <span>v</span>
                <?php endif ?>
            </li>
            <li><?= $hotel['vote'] ?></li>
            <li><?= $hotel['distance_to_center'] ?></li>
            <hr>
        <?php endforeach; ?>
    </ul>
</body>
</html>
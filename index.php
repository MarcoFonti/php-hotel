<?php

// RECUPERO DATI
require './data/info.php';

$hotels_with_parking = array_filter($hotels, function($hotel) {
    return $hotel['parking'] === true;
});


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <!--  BOOTSTRAP -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css'
        integrity='sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg=='
        crossorigin='anonymous' />
    <!-- LINK FONT-AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container d-flex flex-column align-items-center justify-content-center">
        <div class="card w-75 bg-info text-center mt-5">
            <h1 class="text-danger">HOTEL DISPONIBILI</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">NOME</th>
                        <th scope="col">DESCRIZIONE</th>
                        <th scope="col">PARCHEGGIO</th>
                        <th scope="col">VOTO</th>
                        <th scope="col">DISTANZA DAL CENTRO</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- CICLO PER RECUPERARE I VALORI -->
                    <?php foreach ($hotels as $hotel) : ?>
                    <tr>
                        <td scope="row"><?= $hotel['name']?></td>
                        <td><?= $hotel['description'] ?></td>
                        <td>
                            <?php if(!$hotel['parking']) : ?>
                                <i class="fa-solid fa-circle-xmark text-danger"></i>
                            <?php else : ?>
                                <i class="fa-solid fa-circle-check text-success"></i>
                            <?php endif ?>
                        </td>
                        <td><?= $hotel['vote'] ?></td>
                        <td><?= $hotel['distance_to_center'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php if (empty($_GET)) : ?>
            <form action="" method="get" class="d-flex flex-column align-items-center justify-content-center gap-2 mt-3">
                <h6>per Hotel con parcheggio spuntare il checkbox e inviare</h6>
                <input type="checkbox" name="hotel_parking">
                <button>Invia</button>
            </form>
        <?php else : ?>
            <div class="card w-75 bg-info text-center mt-5">
            <h1 class="text-danger">HOTEL CON PARCHEGGIO</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">NOME</th>
                        <th scope="col">DESCRIZIONE</th>
                        <th scope="col">PARCHEGGIO</th>
                        <th scope="col">VOTO</th>
                        <th scope="col">DISTANZA DAL CENTRO</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- CICLO PER RECUPERARE I VALORI -->
                    <?php foreach ($hotels_with_parking as $hotel) : ?>
                    <tr>
                        <td scope="row"><?= $hotel['name']?></td>
                        <td><?= $hotel['description'] ?></td>
                        <td>
                            <?php if ($hotel['parking']) : ?>
                                <i class="fa-solid fa-circle-check text-success"></i>
                            <?php endif ?>
                        </td>
                        <td><?= $hotel['vote'] ?></td>
                        <td><?= $hotel['distance_to_center'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="./index.php" class="py-2 text-white w-25"> <- Torna indietro</a>
        <? endif; ?>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testClient</title>
</head>
<body>
    <?php
    require_once 'Reservation.php';
    $resa1 = new Reservation('2021-12-01', '2021-12-25 12:00:00', '5');
    $resa1->afficher();
    ?>
</body>
</html>
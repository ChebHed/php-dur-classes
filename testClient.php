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
    require_once 'client.php';
    $client1 = new Client('Cheb', 'Hed', 'prout@gmail.com', '15 rue de biche', '69001', 'lyon', '0615458565');
    $client1->afficher();
    ?>
</body>
</html>
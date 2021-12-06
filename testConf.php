<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testConf</title>
</head>
<body>
    <?php
    require_once 'Conf.php';
    echo Conf::getLogin();
    echo "<br>";
    echo Conf::getHostname();
    echo "<br>";
    echo Conf::getDatabase();
    echo "<br>";
    echo Conf::getPassword();
    ?>
</body>
</html>
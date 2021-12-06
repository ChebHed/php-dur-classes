<?php
require_once 'Model.php';
require_once 'reservation.php';
require_once 'client.php';

$Nom = $_POST['nom'];
    $Prenom = $_POST['prenom'];
    $Mail = $_POST['mail'];
    $Adresse = $_POST['adresse'];
    $CodePostal = $_POST['codePostal'];
    $Ville = $_POST['ville'];
    $Telephone = $_POST['tel'];
    $DateHeureRepas = $_POST['dateReservation']." ".$_POST['service'];
    $NbConvives = $_POST['nbConvives'];
    $NumClient = 0;

    $reservation = new Reservation ($NumClient, $DateHeureRepas, $NbConvives);
    $client = new Client ($Nom, $Prenom, $Mail, $Adresse, $CodePostal, $Ville, $Telephone);

    if($reservation->dispo()){
        $NumClient = $client->getClientByMail($Mail);
        if ($NumClient == 0){
            $NumClient = $client->saveClient();
        }
        echo "Numéro de Client : $NumClient<br>";
        $reservation->saveResa($NumClient);
    }else{
        echo "Nous n'avons pas assez de place pour le service souhaité<br><a href='formulaire.html'>Veuillez choisir un autre service</a>";
    }

?>
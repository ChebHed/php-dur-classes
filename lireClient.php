<?php

require_once 'Model.php';
require_once 'client.php';

    
$tab_client = Client::getAllClients();
    foreach($tab_client as $row){
        echo $row->afficher();
    }


?>
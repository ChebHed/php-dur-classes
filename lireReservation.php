<?php

require_once 'Reservation.php';

$tab_reservation = Reservation::getAllReservation();
foreach($tab_reservation as $row){
    echo $row->afficher();
}
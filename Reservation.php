<?php
include_once 'Model.php';

class Reservation{
    private $Code;
    private $Date;
    private $NumClient;
    private $DateHeureRepas;
    private $NbConvives;
    private $Confirme;

    public function __set($nom_attribut, $valeur){
        return $this->$nom_attribut=$valeur;
    }


    public function __get($nom_attribut){
        return $this->$nom_attribut;
    }


    public function __construct($numClient = null, $dhr = null, $nbConv = null){
        if (!is_null($numClient) && !is_null($dhr) && !is_null($nbConv)){
            $this->NumClient = $numClient;
            $this->DateHeureRepas = $dhr;
            $this->NbConvives = $nbConv;
        }
    }

    public function afficher(){
        echo "Date du jour:$this->Date  <br>";
        echo "Date réservation : $this->DateHeureRepas<br/>";
        echo "Nombre de convives : $this->NbConvives<br><br>";
    }

    public static function getAllReservation(){
        $rsql = "SELECT* FROM reservation";
        $rep = Model::$pdo->prepare($rsql);
        $rep->execute();
        $rep->setFetchMode(PDO::FETCH_CLASS, 'reservation');
        $tab_reservation = $rep->fetchAll();
        return $tab_reservation;
    }

    public function dispo(){
        $valid=false;
        $total = 0;
        $reqNbPl = "SELECT sum(NbConvives) as total fROM reservation WHERE DateHeureRepas ='".$this->DateHeureRepas."';";
        try{
            $res = Model::$pdo->query($reqNbPl, PDO::FETCH_ASSOC);
            foreach($res as $row) {
                $total = $row['total'];
            }
        }catch(PDOException $e) {
            echo $reqNbPl . "<br>" . $e->getMessage();

        }
        if($total+$this->NbConvives<=30){
            $valid =true;
        }
        return $valid;
    }

    function saveResa($NumClient){
        $today = date("Y-m-d");//insert into la date 
        echo $today;
        try{
            $reqCreaRes = "INSERT INTO reservation (NumClient, DateHeureRepas, NbConvives) values ('".$NumClient."', '".$this->DateHeureRepas."', '".$this->NbConvives."');";
            Model::$pdo->exec($reqCreaRes);
            echo "Nouvelle Reservation enregistrée";
        }catch(PDOException $e) {
            echo $reqCreaRes . "<br>" . $e->getMessage();
        } 
    }

}
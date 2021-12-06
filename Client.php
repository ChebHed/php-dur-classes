<?php

require_once 'Model.php';
class Client{
    //atributs
    private $NumClient;
    private $Nom;
    private $Prenom;
    private $Adresse;
    private $CodePostal;
    private $Ville;
    private $Mail;
    private $Telephone;


    public function __set($nom_attribut, $valeur){
        return $this->$nom_attribut=$valeur;
    }


    public function __get($nom_attribut){
        return $this->$nom_attribut;
    }

    public function getMail(){
        return $this->mail;
    }

    public function setMail($mail2){
        $this->mail = $mail2;
    }


    //constructeur
    public function __construct($Nom = null, $Prenom = null, $Mail = null, $Adresse = null, $CodePostal = null, $Ville = null, $Telephone = null){
        if (!is_null($Nom) && !is_null($Prenom) && !is_null($Mail) && !is_null($Adresse) && !is_null($CodePostal) && !is_null($Ville) && !is_null($Telephone))
        {
            $this->Nom = $Nom;
            $this->Prenom = $Prenom;
            $this->Mail = $Mail;
            $this->Adresse = $Adresse;
            $this->CodePostal = $CodePostal;
            $this->Ville = $Ville;
            $this->Telephone = $Telephone;
        }
    }




    //méthodes
    public function afficher(){
        echo "Client Num:$this->NumClient $this->Nom $this->Prenom<br>";
        echo "$this->Adresse $this->CodePostal $this->Ville<br/>";
        echo "$this->Mail $this->Telephone<br><br>";
    }

    public static function getAllClients(){
        $rsql = "SELECT* FROM client";
        $rep = Model::$pdo->prepare($rsql);
        $rep->execute();
        $rep->setFetchMode(PDO::FETCH_CLASS, 'client');
        $tab_client = $rep->fetchAll();
        return $tab_client;
    }

    public static function getClientByMail($mail){
        $numC = 0;
        $reqClC = "SELECT NumClient from client WHERE Mail = '".$mail."'";
        foreach (Model::$pdo->query($reqClC) as $client){
            $numC = $client['NumClient'];
        }
        return $numC;
    }
    
    public function saveClient(){
        $reqCreaCl = "INSERT INTO client (Nom, Prenom, Adresse, CodePostal, Ville, Mail, Telephone) VALUES ('$this->Nom', '$this->Prenom', '$this->Adresse', '$this->CodePostal', '$this->Ville', '$this->Mail', '$this->Telephone');";
        try{
            Model::$pdo->exec($reqCreaCl);
            $numC = Model::$pdo->lastInsertId();
            echo "Nouveau Client Créé<br>";
        }catch(PDOException $e) {
            echo $reqCreaCl . "<br>" . $e->getMessage();
        }
        return $numC;
    }
    
}



?>
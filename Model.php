<?php


    require_once 'Conf.php';
    
    class Model{
        static public  $pdo;

    public static function Init(){
    
        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();

        try{
            //connexion bdd
            //le dernier argument sert à ce que toutes les chaines de caracteres 
            //en entrée et sortie de MySQL sot dans le codage UTF-8
        self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        //on active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            if(Conf::getDebug()){
                echo $e->getMessage();
            }else{
                echo 'Une erreur est survenue <a href="">retour a la page d\'accueil</a>';
            }
            die();
        }
    }
}
Model::init();
?>
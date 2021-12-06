<?php
class Conf{
    static private $databases = array(
        'hostname'=>'localhost',
        'database'=>'restaurant',
        'login'=> 'root',
        'password'=> ''
    );
    static private $debug = True;

    static public function getDebug(){
        return self::$debug;
    }

    static public function getLogin(){
        return self::$databases['login'];
    }



    static public function getHostName(){
        return self::$databases['hostname'];
    }

    static public function getPassword(){
        return self::$databases['password'];
    }

    static public function getDataBase(){
        return self::$databases['database'];
    }





}




?>
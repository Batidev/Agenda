<?php

class BDD {
    protected static $_instance = null;

    static function getConnexion(){
        // requete BDD get properties for $id
        if(is_null(self::$_instance)){
            $user = 'root';
            $password = '0000';
            self::$_instance = new PDO('mysql:host=localhost;dbname=Agenda', $user, $password);
        }
        return BDD::$_instance ;
    }
}

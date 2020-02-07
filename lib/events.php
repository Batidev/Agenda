<?php
require_once 'bdd.php';
require_once 'agenda.php';
require_once 'people.php';
require_once 'mainObjectBDD.php';

class Events extends MaINObjectBDD {

    protected $id;
    protected $idAgenda;
    protected $title;
    protected $datetime;
    protected $duration;
    protected static $tableName='events';

    public function findAllByDate($filters=[]){
        $bdd = BDD::getConnexion() ;
        $res = $bdd->query($query) ;
        return $res->fetchAll(PDO::FETCH_CLASS, 'Agenda');
    }

    public function getAllPeople($filters=[]){
        $bdd = BDD::getConnexion() ;
        $res = $bdd->query($query) ;
        return $res->fetchAll(PDO::FETCH_CLASS, 'People');
    }
}
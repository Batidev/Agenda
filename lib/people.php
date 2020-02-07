<?php
require_once 'bdd.php';
// require_once 'event.php';
require_once 'agenda.php';
require_once 'mainObjectBDD.php';

class People extends MaINObjectBDD {

    protected $id;
    protected $name;
    protected static $tableName='people';

    public static function findOne($filters=[]) {
            
        $bdd = BDD::getConnexion();
        $where = '';
        $clauses = [];
        foreach ($filters as $filter) {
            $clauses[] = $filters.'='.$bdd->quote($filter) ;
        }
        if (!empty($clauses)) {
            $where = ' WHERE '.implode(' AND ', $clauses);
        }
        $query = 'SELECT * FROM '.static::$tableName.' as c INNER JOIN event_people as cp ON c.id=cp.idPeople '.$where ;
        $res = $bdd->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        return $res->fetch();
    }


    public static function findAll($filters=[]) {
            
        $bdd = BDD::getConnexion();
        $where = '';
        $clauses = [];
        foreach ($filters as  $filter) {
            $clauses[] = $filters.'='.$bdd->quote($filter) ;
        }
        if (!empty($clauses)) {
            $where = ' WHERE '.implode(' AND ', $clauses);
        }
        $query = 'SELECT * FROM '.static::$tableName.' as c INNER JOIN event_people as cp ON c.id=cp.idPeople '.$where ;
        $res = $bdd->query($query);
        return $res->fetchAll(PDO::FETCH_CLASS, get_called_class());
    }
}
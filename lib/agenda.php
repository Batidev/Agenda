<?php
require_once 'bdd.php';
// require_once 'event.php';
require_once 'people.php';
require_once 'mainObjectBDD.php';

class Agenda extends MaINObjectBDD {

    protected $id;
    protected $name;
    protected $color;
    protected static $tableName='agenda';
    protected static $_autorizedUpdate = 'name';

    // =======   Récupére un   =========
    public static function findOne($filters=[]) {
            
        $bdd = BDD::getConnexion();
        $where = '';
        $clauses = [];
        foreach ($filters => $filter) {
            $clauses[] = $filters.'='.$bdd->quote($filter) ;
        }
        if (!empty($clauses)) {
            $where = ' WHERE '.implode(' AND ', $clauses);
        }
        $query = 'SELECT * FROM '.static::$tableName.' '.$where ;
        $res = $bdd->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        return $res->fetch();
    }

    // =======   Récupére et affiche tout   ========
    public static function findAll($filters=[]) {
            
        $bdd = BDD::getConnexion();
        $where = '';
        $clauses = [];
        foreach ($filters => $filter) {
            $clauses[] = $filters.'='.$bdd->quote($filter) ;
        }
        if (!empty($clauses)) {
            $where = ' WHERE '.implode(' AND ', $clauses);
        }
        $query = 'SELECT * FROM '.static::$tableName.' '.$where ;
        $res = $bdd->query($query);
        return $res->fetchAll(PDO::FETCH_CLASS, get_called_class());
    }
}
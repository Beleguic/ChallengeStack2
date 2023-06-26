<?php
namespace App\Core;

abstract class SQL{

    private $pdo;
    private $table;
    private $resultat = [];

    public function __construct()
    {
        //Connexion à la bdd
        //SINGLETON à réaliser
        try {
            $this->pdo = new \PDO("pgsql:host=db.bpuhpyzfldoarlwgwxkz.supabase.co;dbname=postgres;port=5432", "postgres", "zdS2TmaWFhb4fgmo");
        } catch(\Exception $e) {
            die("Erreur SQL : ".$e->getMessage());
        }

        //$this->table = static::class;
        $classExploded = explode("\\", get_called_class());
        $this->table = "zfgh_".end($classExploded);
    }

    public static function populate(Int $id): object
    {
        $class = get_called_class();
        $objet = new $class();
        return $objet->getOneWhere(["id"=>$id]);
    }

    public static function populateWithMail(String $email): object
    {
        $class = get_called_class();
        $objet = new $class();
        return $objet->getOneWhere(["email"=>$email]);
    }

    public static function populateWithIdHash(String $id_hash): object
    {
        $class = get_called_class();
        $objet = new $class();
        return $objet->getOneWhere(["id_hash"=>$id_hash]);
    }

    public function getOneWhere(array $where): object
    {
        $sqlWhere = [];
        foreach ($where as $column=>$value) {
            $sqlWhere[] = $column."=:".$column;
        }
        $queryPrepared = $this->pdo->prepare("SELECT * FROM ".$this->table." WHERE ".implode(" AND ", $sqlWhere));
        $queryPrepared->setFetchMode( \PDO::FETCH_CLASS, get_called_class());
        $queryPrepared->execute($where);
        $queryFetched = $queryPrepared->fetch();
        if(gettype($queryFetched) == 'object'){
            return $queryFetched;
        }
        else{
            return $obj = (object) ['property' => 'pas de resultat'];
        }
        
        //return $queryPrepared->fetch();
    }

    public function getAll(): object
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM ".$this->table);
        $queryPrepared->setFetchMode( \PDO::FETCH_CLASS, get_called_class());
        $queryPrepared->execute();
        return $queryPrepared;
    }

    public function getThemWhereAll(array $who): object{

        $queryPrepared = $this->pdo->prepare("SELECT ".implode(' , ', $who). " FROM ".$this->table.";"); 
        $queryPrepared->setFetchMode( \PDO::FETCH_CLASS, get_called_class());
        $queryPrepared->execute();
        return $queryPrepared;

    }


    public function save($del=''): void
    {

        echo('here1');

        $columns = get_object_vars($this);
        $columnsToExclude = get_class_vars(get_class());
        $columns = array_diff_key($columns, $columnsToExclude);

        if($del == 'del'){
            echo('here4');
            if(is_numeric($this->getId()) && $this->getId()>0) { 
                // Prepare et execute la requete de suppression
                $queryPrepared = $this->pdo->prepare("DELETE FROM ".$this->table.
                    " WHERE id =?;")->execute([$this->getId()]);
            }
        }
        else{
            if(is_numeric($this->getId()) && $this->getId()>0) {
                echo('here2');
                $sqlUpdate = [];
                foreach ($columns as $column=>$value) {
                    $sqlUpdate[] = $column."=:".$column;
                }
                $queryPrepared = $this->pdo->prepare("UPDATE ".$this->table.
                    " SET ".implode(",", $sqlUpdate). " WHERE id=".$this->getId());
            }else{
                echo('here3');

                $queryPrepared = $this->pdo->prepare("INSERT INTO ".$this->table.
                    " (".implode("," , array_keys($columns) ).") 
                VALUES
                 (:".implode(",:" , array_keys($columns) ).") ");
            }
            $queryPrepared->execute($columns);
        }


    }

    function getResultat(){
        return $this->resultat;
    }

    public abstract function getConfigObject();

}
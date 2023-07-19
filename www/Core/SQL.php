<?php
namespace App\Core;

interface SQLInterface
{
    public function getConfigObject();
}


class SQL{

    protected $pdo;
    protected $table;
    private $resultat = [];

    protected static $instance = NULL;

    private function __construct()
    {
        //Connexion à la bdd
        //SINGLETON à réaliser
        $ini = parse_ini_file('app.ini');

        try {
            $this->pdo = new \PDO("pgsql:host=".$ini['host'].";dbname=".$ini['dbname'].";port=".$ini['port'], $ini['user'], $ini['password']);
        } catch(\Exception $e) {
            die("Erreur SQL : ".$e->getMessage());
        }
    }

    public static function getInstance()
    {  
        if(is_null(self::$instance))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function populate(String $id): object
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

    public static function populateWith(Array $search): object
    {
        $class = get_called_class();
        $objet = new $class();
        return $objet->getOneWhere($search);
    }

    public function getOneWhere(array $where): object
    {
        $sqlWhere = [];
        foreach ($where as $column=>$value) {
            $sqlWhere[] = $column."=:".$column;
        }
        $queryPrepared = $this->pdo->prepare("SELECT * FROM ".$this->table." WHERE ".implode(" AND ", $sqlWhere));
        $queryPrepared->setFetchMode( \PDO::FETCH_CLASS, get_called_class());
        try{
            $queryPrepared->execute($where);
        }
        catch(\PDOException $e){
            echo("Erreur ".$e->getCode());
            echo("Erreur ".$e->getMessage());
            //header("location: /");
        }
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

    public function getAllWhere(array $where,array $order=["id","ASC"]): object
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM ".$this->table." WHERE ".implode(" and ", $where)." ORDER BY ".implode(' ', $order).";");
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
    // .implode(' , ', $who).
    public function checkSomething(array $who): bool
    {
        $queryPrepared = $this->pdo->prepare("SELECT count(*) FROM ".$this->table." WHERE ".implode(" = '", $who)."' LIMIT 1;"); 
        $queryPrepared->setFetchMode( \PDO::FETCH_CLASS, get_called_class());
        $queryPrepared->execute();
        return $queryPrepared->fetchColumn();
    }

    public function delWhere (): void
    {

        $columns = get_object_vars($this);
        
        $columnsToExclude = get_class_vars(get_class());
        $columns = array_diff_key($columns, $columnsToExclude);

        $sqlDelete = [];
        foreach ($columns as $column=>$value) {
            $sqlDelete[] = $column."=:".$column;
        }

        $queryPrepared = $this->pdo->prepare("DELETE FROM ".$this->table.
                    " WHERE ".implode(" AND ", $sqlDelete));
        if (!$queryPrepared) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->pdo->errorInfo());
        }
        try{
            $queryPrepared->execute($columns);
        }
        catch(\PDOException $e){
            echo("Erreur ".$e->getCode());
            echo("Erreur ".$e->getMessage());
        }


            

    }


    public function save($del=''): void
    {
        $columns = get_object_vars($this);
        
        $columnsToExclude = get_class_vars(get_class());
        $columns = array_diff_key($columns, $columnsToExclude);

        if($del == 'del'){
            if(is_string($this->getId()) && $this->getId()!='0') { 
                // Prepare et execute la requete de suppression
                $queryPrepared = $this->pdo->prepare("DELETE FROM ".$this->table.
                    " WHERE id =?;")->execute([$this->getId()]);
            }
        }
        else{
            if(is_string($this->getId()) && $this->getId()!='0') {
                $sqlUpdate = [];
                foreach ($columns as $column=>$value) {
                    $sqlUpdate[] = $column."=:".$column;
                }
                $queryPrepared = $this->pdo->prepare("UPDATE ".$this->table.
                    " SET ".implode(",", $sqlUpdate). " WHERE id='".$this->getId()."'");
            }else{
                $queryPrepared = $this->pdo->prepare("INSERT INTO ".$this->table.
                    " (".implode("," , array_keys($columns) ).") 
                VALUES
                 (:".implode(",:" , array_keys($columns) ).") ");
            }
            if (!$queryPrepared) {
                echo "\nPDO::errorInfo():\n";
                print_r($this->pdo->errorInfo());
            }
            try{
                $queryPrepared->execute($columns);
            }
            catch(\PDOException $e){
                echo("Erreur ".$e->getCode());
                echo("Erreur ".$e->getMessage());
            }

            /*echo "\nPDOStatement::errorInfo():\n";
            $arr = $this->pdo->errorInfo();
            print_r($arr);*/
        }


    }

    function getResultat(){
        return $this->resultat;
    }

    
}
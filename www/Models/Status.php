<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\SQLInterface;
class Status extends SQL implements SQLInterface 
{
    private String $id = '0';
    protected Int $id_status = 0;
    protected String $status;

    public function __construct()
    {
        $sql = parent::getInstance();
        $classExploded = explode("\\", get_called_class());
        $this->pdo = $sql->pdo;
        $this->table = "".$GLOBALS['prefixe']."_".end($classExploded);
    }

    public function getConfigObject(): array
    {
        $array['id'] = $this->getId();
        $array['id_status'] = $this->getIdStatus();
        $array['status'] = $this->getStatus();
        return $array;
    }

        /**
     * @return Int
     */
    public function getId(): String
    {
        return $this->id;
    }

    /**
     * @param Int $id
     */
    public function setId(String $id): void
    {
        $this->id = $id;
    }

        /**
     * @return Int
     */
    public function getIdStatus(): Int
    {
        return $this->id_status;
    }

    /**
     * @param Int $id
     */
    public function setIdStatus(Int $id_status): void
    {
        $this->id_status = $id_status;
    }

       /**
     * @return Int
     */
    public function getStatus(): String
    {
        return $this->status;
    }

    /**
     * @param Int $id
     */
    public function setStatus(String $status): void
    {
        $this->status = $status;
    }


    public function getSelectInfo(): array{

        $who = ['id_status', 'status'];
        $selecteInfo = $this->getThemWhereAll($who);
        $array = [];
        while ($row = $selecteInfo->fetch()){
           $array[] = ['value' => $row->getIdStatus(), 'content' => $row->getStatus()];
        }
        if(sizeof($array) > 0){
            return $array;
        }
        else{
            $array[] = ['value' => '', 'content' => "Aucun statut disponible"];
            return $array;
        }
    }


        
}
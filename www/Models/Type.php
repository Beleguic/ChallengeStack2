<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\SQLInterface;
class Type extends SQL implements SQLInterface
{
    private String $id = '0';
    protected String $texte;

    public function __construct(){
        $sql = parent::getInstance();
        $classExploded = explode("\\", get_called_class());
        $this->pdo = $sql->pdo;
        $this->table = "zfgh_".end($classExploded);
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
     * @return String
     */
    public function getTexte(): string
    {
        return $this->texte;
    }

    /**
     * @param String $firstname
     */
    public function setTexte(string $texte): void
    {
        $this->setId_Hash();
        $this->texte = ucwords(strtolower(trim($texte)));
    }

    public function getConfigObject(): array
    {

        $array['id_hash'] = $this->getId_Hash();
        $array['id'] = $this->getId();
        return $array;

    }

    public function getSelectInfo(): array{

        $who = ['id', 'texte'];
        $selecteInfo = $this->getThemWhereAll($who);
        $array = [];
        while ($row = $selecteInfo->fetch()){
           $array[] = ['value' => $row->getId(), 'content' => $row->getTexte()];
        }
        return $array;

    }

    



}

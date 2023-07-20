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
        $this->table = "".$GLOBALS['prefixe']."_".end($classExploded);
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
        $this->texte = ucwords(strtolower(trim($texte)));
    }

    public function getConfigObject(): array
    {

        $array['texte'] = $this->getTexte();
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
        if(sizeof($array) > 0){
            return $array;
        }
        else{
            $array[] = ['value' => '', 'content' => "Aucun type d'annonce disponible"];
            return $array;
        }
    }

    public function getNumberOfType(): int{

        $who = ['id'];
        $selecteInfo = $this->getThemWhereAll($who);
        $i = 0;
        while ($row = $selecteInfo->fetch()){
           $i++;
        }
        return $i;

    }
}

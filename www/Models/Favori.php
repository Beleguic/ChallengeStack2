<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\SQLInterface;
class Favori extends SQL implements SQLInterface
{
    private String $id = '0';
    protected String $id_user;
    protected String $id_annonce;

    public function __construct(){
        $sql = parent::getInstance();
        $classExploded = explode("\\", get_called_class());
        $this->pdo = $sql->pdo;
        $this->table = "zfgh_favori";
    }

    public function getConfigObject(): array
    {

        $array['id'] = $this->getId();
        $array['id_user'] = $this->getIdUser();
        $array['id_annonce'] = $this->getIdAnnonce();
        
        return $array;
    }
    
    /**
     * @return mixed
     */
    public function getId(): String
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId(String $id): void
    {
        $this->id = $id;

    }

       /**
     * @return mixed
     */
    public function getIdUser(): String
    {
        return $this->id_user;
    }

    /**
     * @param mixed $code
     *
     * @return self
     */
    public function setIdUser(String $id_user): void
    {
        $this->id_user = $id_user;

    }


    /**
     * @return mixed
     */
    public function getIdAnnonce(): String
    {
        return $this->id_annonce;
    }

    /**
     * @param mixed $code
     *
     * @return self
     */
    public function setIdAnnonce(String $id_annonce): void
    {
        $this->id_annonce = $id_annonce;

    }

}
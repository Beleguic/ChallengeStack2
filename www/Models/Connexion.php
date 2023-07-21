<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\SQLInterface;
class Connexion extends SQL implements SQLInterface
{
    private String $id = '0';
    protected String $id_user;
    protected String $token;
    protected String $last_seen;

    public function __construct(){
        $sql = parent::getInstance();
        $classExploded = explode("\\", get_called_class());
        $this->pdo = $sql->pdo;
        $this->table = "".$GLOBALS['prefixe']."_connexion";
    }

    public function getConfigObject(): array
    {

        $array['id'] = $this->getId();
        $array['id_user'] = $this->getEmail();
        $array['token'] = $this->getToken();
        $array['last_seen'] = $this->getValidity();
        
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
    public function getToken(): String
    {
        return $this->token;
    }

    /**
     * @param mixed $code
     *
     * @return self
     */
    public function setToken(String $token): void
    {
        $this->token = $token;

    }

     


        /**
     * @return mixed
     */
    public function getLastSeen(): String
    {
        return $this->last_seen;
    }

    /**
     * @param mixed $code
     *
     * @return self
     */
    public function setLastSeen(String $last_seen): void
    {
        $this->last_seen = $last_seen;

    }

}
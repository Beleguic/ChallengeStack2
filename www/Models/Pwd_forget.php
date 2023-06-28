<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\SQLInterface;
class UserCode extends SQL implements SQLInterface
{
    private String $id = 0;
    protected String $email;
    protected String $token;
    protected String $validity;

    public function __construct(){
        $sql = parent::getInstance();
        $classExploded = explode("\\", get_called_class());
        $this->pdo = $sql->pdo;
        $this->table = "zfgh_pwd_forget";
    }

    public function getConfigObject(): array
    {

        $array['id'] = $this->getId();
        $array['id_user'] = $this->getIdUser();
        
        return $array;
    }
    
    /**
     * @return mixed
     */
    public function getId(): Int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId(Int $id): void
    {
        $this->id = $id;

    }

    /**
     * @return mixed
     */
    public function getIdUser(): Int
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     *
     * @return self
     */
    public function setIdUser(Int $id_user): void
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getCode(): Int
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     *
     * @return self
     */
    public function setCode(Int $code): void
    {
        $this->code = $code;

    }

}
<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\SQLInterface;
class UserPwdForget extends SQL implements SQLInterface
{
    private String $id = '0';
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
        $array['email'] = $this->getEmail();
        $array['token'] = $this->getToken();
        $array['validity'] = $this->getValidity();
        
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
    public function getEmail(): String
    {
        return $this->email;
    }

    /**
     * @param mixed $code
     *
     * @return self
     */
    public function setEmail(String $email): void
    {
        $this->email = $email;

    }


        /**
     * @return mixed
     */
    public function getValidity(): String
    {
        return $this->validity;
    }

    /**
     * @param mixed $code
     *
     * @return self
     */
    public function setValidity(String $validity): void
    {
        $this->token = $validity;

    }

}
<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\SQLInterface;
class UserCode extends SQL implements SQLInterface
{
    private Int $id = 0;
    private Int $id_user;
    private Int $code;

    public function __construct(){
        $sql = parent::getInstance();
        $classExploded = explode("\\", get_called_class());
        $this->pdo = $sql->pdo;
        $this->table = "zfgh_".end($classExploded);
    }

    public function getConfigObject(): array
    {

        $array['id'] = $this->getId();
        $array['id_user'] = $this->getIdUser();
        $array['code'] = $this->getCode();
        
        return $array;

    
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
    public function setCode(): void
    {
        $this->code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
    }
}
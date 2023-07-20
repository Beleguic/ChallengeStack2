<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\SQLInterface;
class Newsletter extends SQL implements SQLInterface 
{
    private String $id = '0';
    protected String $email;
    protected String $date_add_newsletter;

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
        $array['email'] = $this->getEmail();
        $array['date_add_newsletter'] = $this->getDateAddNewsletter();
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
     * @return String
     */
    public function getEmail(): String
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail(String $email): void
    {
        $this->email = $email;
    }

        /**
     * @return String
     */
    public function getDateAddNewsletter(): String
    {
        return $this->date_add_newsletter;
    }

    /**
     * @param String $date_add_newsletter
     */
    public function setDateAddNewsletter(String $date_add_newsletter): void
    {
        $this->date_add_newsletter = $date_add_newsletter;
    }
}
<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\SQLInterface;
class v_Agent extends SQL implements SQLInterface
{
    private String $id = '0';
    protected String $firstname;
    protected String $lastname;
    protected String $email;
    protected String $country;
    protected Int $status = 1;
    protected Int $nbr_annonce = 0;

    public function __construct(){
        $sql = parent::getInstance();
        $classExploded = explode("\\", get_called_class());
        $this->pdo = $sql->pdo;
        $this->table = "".$GLOBALS['prefixe']."_v_agent";
    }

    public function getConfigObject(): array
    {

        $array['id'] = $this->getId();
        $array['firstname'] = $this->getFirstname();
        $array['lastname'] = $this->getLastname();
        $array['email'] = $this->getEmail();
        $array['country'] = $this->getCountry();
        $array['nbr_annonce'] = $this->getNbrAnnonce();
        $array['status'] = $this->getStatus();
        return $array;

    }


    /**
     * @return String
     */
    public function getId(): String
    {
        return $this->id;
    }

    /**
     * @return String
     */
    public function getFirstname(): String
    {
        return $this->firstname;
    }

    /**
     * @return String
     */
    public function getLastname(): String
    {
        return $this->lastname;
    }

    /**
     * @return String
     */
    public function getEmail(): String
    {
        return $this->email;
    }

    /**
     * @return String
     */
    public function getCountry(): String
    {
        return $this->country;
    }

    /**
     * @return Int
     */
    public function getStatus(): Int
    {
        return $this->status;
    }

    /**
     * @return Int
     */
    public function getNbrAnnonce(): Int
    {
        return $this->nbr_annonce;
    }
}

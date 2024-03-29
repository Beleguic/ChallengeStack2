<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\SQLInterface;
class User extends SQL implements SQLInterface
{
    private String $id = '0';
    protected String $firstname;
    protected String $lastname;
    protected String $email;
    protected String $pwd;
    protected String $country;
    protected Int $status = 1;
    private String $date_inserted;
    private String $date_updated;
    protected bool $actif;

    public function __construct(){
        $sql = parent::getInstance();
        $classExploded = explode("\\", get_called_class());
        $this->pdo = $sql->pdo;
        $this->table = "".$GLOBALS['prefixe']."_".end($classExploded);
    }

    public function getConfigObject(): array
    {

        $array['id'] = $this->getId();
        $array['firstname'] = $this->getFirstname();
        $array['lastname'] = $this->getLastname();
        $array['email'] = $this->getEmail();
        //$array['pwd'] = $this->getPwd();
        $array['country'] = $this->getCountry();
        $array['status'] = $this->getStatus();
        //$array['date_inserted'] = $this->getDateInserted();
        //$array['date_updated'] = $this->getDateUpdated();
        $array['actif'] = $this->getActif();
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
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param String $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = ucwords(strtolower(trim($firstname)));
    }

    /**
     * @return String
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param String $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = strtoupper(trim($lastname));
    }

    /**
     * @return String
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail(string $email): void
    {
        $this->email = strtolower(trim($email));
    }

    /**
     * @return String
     */
    public function getPwd(): string
    {
        return $this->pwd;
    }

    /**
     * @param String $pwd
     */
    public function setPwd(string $pwd): void
    {
        $this->pwd = password_hash($pwd, PASSWORD_DEFAULT);
    }

    /**
     * @return String
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param String $country
     */
    public function setCountry(string $country): void
    {
        $this->country = strtoupper(trim($country));
    }

    /**
     * @return Int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param Int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return \DateTime
     */
    public function getDateInserted(): String
    {
        return $this->date_inserted;
    }

    /**
     * @param \DateTime $date_inserted
     */
    public function setDateInserted(String $date_inserted): void
    {
        $this->date_inserted = $date_inserted;
    }

    /**
     * @return \DateTime
     */
    public function getDateUpdated(): String
    {
        return $this->date_updated;
    }

    /**
     * @param \DateTime $date_updated
     */
    public function setDateUpdated(String $date_updated): void
    {
        $this->date_updated = $date_updated;
    }

    /**
     * @return \DateTime
     */
    public function getActif(): Int
    {
        return $this->actif;
    }

    /**
     * @param \DateTime $date_updated
     */
    public function setActif(bool $actif): void
    {
        $this->actif = $actif;
    }



}

<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\SQLInterface;
class v_Annonce extends SQL implements SQLInterface
{
    private String $id = '0';
    protected String $texte;
    protected String $titre;
    protected Int $prix;
    protected Int $superficiemaison;
    protected Int $superficieterrain;
    protected Int $nbrpiece;
    protected Int $nbrchambre;
    protected String $description;
    //addresse
    protected String $ville;
    protected String $adrcomplet;
    protected String $postcode;
    protected String $depnum;
    protected String $deplabel;
    protected String $region;
    protected String $longitude;
    protected String $latitude;
    //user
    protected String $lastname_agent;
    protected String $firstname_agent;
    protected String $email_agent;


    public function __construct(){
        $sql = parent::getInstance();
        $classExploded = explode("\\", get_called_class());
        $this->pdo = $sql->pdo;
        $this->table = "".$GLOBALS['prefixe']."_".end($classExploded);
    }

    public function getConfigObject(): array
    {

        $array['id'] = $this->getId();
        $array['texte'] = $this->getTexte();
        $array['titre'] = $this->getTitre();
        $array['prix'] = $this->getPrix();
        $array['superficiemaison'] = $this->getSuperficiemaison();
        $array['superficieterrain'] = $this->getSuperficieterrain();
        $array['nbrpiece'] = $this->getNbrpiece();
        $array['nbrchambre'] = $this->getNbrchambre();
        $array['description'] = $this->getDescription();
        $array['city'] = $this->getCity();
        $array['adrcomplet'] = $this->getAddressComplet();
        $array['postcode'] = $this->getPostCode();
        $array['depnum'] = $this->getDepNum();
        $array['deplabel'] = $this->getDepLabel();
        $array['regions'] = $this->getRegions();
        $array['lastnameagent'] = $this->getLastnameAgent();
        $array['firstnameagent'] = $this->getFirstnameAgent();
        $array['emailagent'] = $this->getEmailAgent();
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
     * @return String
     */
    public function getTexte(): String
    {
        return $this->texte;
    }

    /**
     * @return String
     */
    public function getTitre(): String
    {
        return $this->titre;
    }

    /**
     * @return Int
     */
    public function getPrix(): Int
    {
        return $this->prix;
    }

    /**
     * @return Int
     */
    public function getSuperficiemaison(): Int
    {
        return $this->superficiemaison;
    }

    /**
     * @return Int
     */
    public function getSuperficieterrain(): Int
    {
        return $this->superficieterrain;
    }

    /**
     * @return Int
     */
    public function getNbrpiece(): Int
    {
        return $this->nbrpiece;
    }

    /**
     * @return Int
     */
    public function getNbrchambre(): Int
    {
        return $this->nbrchambre;
    }

    /**
     * @return String
     */
    public function getDescription(): String
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getCity(): String
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getAddressComplet(): String
    {
        return $this->adrcomplet;
    }

    /**
     * @return mixed
     */
    public function getPostCode(): String
    {
        return $this->postcode;
    }

    /**
     * @return mixed
     */
    public function getDepNum(): String
    {
        return $this->depnum;
    }

    /**
     * @return mixed
     */
    public function getDepLabel(): String
    {
        return $this->deplabel;
    }

    /**
     * @return mixed
     */
    public function getRegions(): String
    {
        return $this->region;
    }

    /**
     * @return mixed
     */
    public function getLatitude(): String
    {
        return $this->latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude(): String
    {
        return $this->longitude;
    }

    /**
     * @return mixed
     */
    public function getLastnameAgent(): String
    {
        return $this->lastname_agent;
    }

    /**
     * @return mixed
     */
    public function getFirstnameAgent(): String
    {
        return $this->firstname_agent;
    }

    /**
     * @return mixed
     */
    public function getEmailAgent(): String
    {
        return $this->email_agent;
    }


}
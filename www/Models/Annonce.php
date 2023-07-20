<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\SQLInterface;

class Annonce extends SQL implements SQLInterface
{
    private String $id = '0';
    protected String $id_type;
    protected String $id_agent;
    protected String $titre;
    protected Int $prix;
    protected Int $superficiemaison;
    protected Int $superficieterrain;
    protected Int $nbrpiece;
    protected Int $nbrchambre;
    protected String $description;
    
    //addresse
    protected String $city;
    protected String $adrcomplet;
    protected String $postcode;
    protected String $depnum;
    protected String $deplabel;
    protected String $region;
    protected String $longitude;
    protected String $latitude;




    public function __construct(){
        $sql = parent::getInstance();
        $classExploded = explode("\\", get_called_class());
        $this->pdo = $sql->pdo;
        $this->table = "zfgh_".end($classExploded);
    }

    public function getConfigObject(): array
    {

        $array['id'] = $this->getId();
        $array['id_type'] = $this->getIdType();
        $array['id_agent'] = $this->getIdAgent();
        $array['titre'] = $this->getTitre();
        $array['prix'] = $this->getPrix();
        $array['superficieMaison'] = $this->getSuperficiemaison();
        $array['superficieTerrain'] = $this->getSuperficieterrain();
        $array['nbrPiece'] = $this->getNbrpiece();
        $array['nbrChambre'] = $this->getNbrchambre();
        $array['description'] = $this->getDescription();
        $array['city'] = $this->getCity();
        $array['adrComplet'] = $this->getAddressComplet();
        $array['postCode'] = $this->getPostCode();
        $array['depNum'] = $this->getDepNum();
        $array['depLabel'] = $this->getDepLabel();
        $array['region'] = $this->getRegions();
        $array['latitude'] = $this->getLatitude();
        $array['longitude'] = $this->getLongitude();
        $array['adresse'] = $this->getAddressComplet(). ' ' . $this->getPostCode() .  ' ' . $this->getCity();
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
     * @return Int
     */
    public function getIdAgent(): String
    {
        return $this->id_agent;
    }

    /**
     * @param Int $id
     */
    public function setIdAgent(String $id_agent): void
    {
        
        $this->id_agent = $id_agent;
    }


    /**
     * @return mixed
     */
    public function getIdType(): String
    {
        return $this->id_type;
    }

    /**
     * @param mixed $id_type
     *
     * @return self
     */
    public function setIdType(String $id_type): void
    {
        $this->id_type = $id_type;
    }

    /**
     * @return mixed
     */
    public function getTitre(): String
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     *
     * @return self
     */
    public function setTitre(String $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getPrix(): Int
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     *
     * @return self
     */
    public function setPrix(Int $prix): void
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getSuperficiemaison(): Int
    {
        return $this->superficiemaison;
    }

    /**
     * @param mixed $superficieMaison
     *
     * @return self
     */
    public function setSuperficiemaison(Int $superficiemaison): void
    {
        $this->superficiemaison = $superficiemaison;
    }

    /**
     * @return mixed
     */
    public function getSuperficieterrain(): Int
    {
        return $this->superficieterrain;
    }

    /**
     * @param mixed $SuperficieTerrain
     *
     * @return self
     */
    public function setSuperficieterrain(Int $superficieterrain): void
    {
        $this->superficieterrain = $superficieterrain;
    }

    /**
     * @return mixed
     */
    public function getNbrpiece(): Int
    {
        return $this->nbrpiece;
    }

    /**
     * @param mixed $nbrPiece
     *
     * @return self
     */
    public function setNbrpiece(Int $nbrpiece): void
    {
        $this->nbrpiece = $nbrpiece;
    }

    /**
     * @return mixed
     */
    public function getNbrchambre(): Int
    {
        return $this->nbrchambre;
    }

    /**
     * @param mixed $chambre
     *
     * @return self
     */
    public function setNbrchambre(Int $nbrchambre): void
    {
        $this->nbrchambre = $nbrchambre;
    }


    /**
    * @return String
    */
    public function getDescription(): String
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     *
     * @return self
     */
    public function setDescription(String $description): void
    {
        $this->description = $description;
    }


    /**
     * @return mixed
     */
    public function getCity(): String
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     *
     * @return self
     */
    public function setCity(String $city): void
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getAddressComplet(): String
    {
        return $this->adrcomplet;
    }

    /**
     * @param mixed $adrcomplet
     *
     * @return self
     */
    public function setAddressComplet(String $adrcomplet): void
    {
        $this->adrcomplet = $adrcomplet;
    }

    /**
     * @return mixed
     */
    public function getPostCode(): String
    {
        return $this->postcode;
    }

    /**
     * @param mixed $postcode
     *
     * @return self
     */
    public function setPostCode(String $postcode): void
    {
        $this->postcode = $postcode;
    }

    /**
     * @return mixed
     */
    public function getDepNum(): String
    {
        return $this->depnum;
    }

    /**
     * @param mixed $depnum
     *
     * @return self
     */
    public function setDepNum(String $depnum): void
    {
        $this->depnum = $depnum;
    }

    /**
     * @return mixed
     */
    public function getDepLabel(): String
    {
        return $this->deplabel;
    }

    /**
     * @param mixed $deplabel
     *
     * @return self
     */
    public function setDepLabel(String $deplabel): void
    {
        $this->deplabel = $deplabel;
    }

    /**
     * @return mixed
     */
    public function getRegions(): String
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     *
     * @return self
     */
    public function setRegions(String $region): void
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getLatitude(): String
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     *
     * @return self
     */
    public function setLatitude(String $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude(): String
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     *
     * @return self
     */
    public function setLongitude(String $longitude): void
    {
        $this->longitude = $longitude;
    }
    

}

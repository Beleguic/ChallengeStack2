<?php

namespace App\Models;

use App\Core\SQL;
class Annonce extends SQL
{
    private Int $id = 0;
    protected String $id_hash;
    protected Int $id_type;
    protected String $titre;
    protected Int $prix;
    protected Int $superficiemaison;
    protected Int $superficieterrain;
    protected Int $nbrpiece;
    protected Int $nbrchambre;
    //addresse
    protected String $ville;
    protected String $rue;
    protected String $departement;
    protected String $regions;


    public function __construct(){
        parent::__construct();
    }

    public function getConfigObject(): array
    {

        $array['id'] = $this->getId();
        $array['id_hash'] = $this->getIdHash();
        $array['id_type'] = $this->getIdType();
        $array['titre'] = $this->getTitre();
        $array['prix'] = $this->getPrix();
        $array['superficieMaison'] = $this->getSuperficiemaison();
        $array['superficieTerrain'] = $this->getSuperficieterrain();
        $array['nbrPiece'] = $this->getNbrpiece();
        $array['nbrChambre'] = $this->getNbrchambre();
        $array['ville'] = $this->getVille();
        $array['rue'] = $this->getRue();
        $array['departement'] = $this->getDepartement();
        $array['regions'] = $this->getRegions();
        return $array;

    }

    public function setIdHash(): void
    {
        $this->id_hash = sha1(uniqid());
    }

    public function getIdHash(): String
    {
        return $this->id_hash;
    }

    /**
     * @return Int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param Int $id
     */
    public function setId(int $id): void
    {
        
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getRegions(): String 
    {
        return $this->regions;
    }

    /**
     * @param mixed $regions
     *
     * @return self
     */
    public function setRegions(String $regions): void
    {
        $this->regions = $regions;
    }

    /**
     * @return mixed
     */
    public function getIdType(): Int
    {
        return $this->id_type;
    }

    /**
     * @param mixed $id_type
     *
     * @return self
     */
    public function setIdType(Int $id_type): void
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
     * @return mixed
     */
    public function getVille(): String
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     *
     * @return self
     */
    public function setVille(String $ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getRue(): String
    {
        return $this->rue;
    }

    /**
     * @param mixed $rue
     *
     * @return self
     */
    public function setRue(String $rue): void
    {
        $this->rue = $rue;
    }

    /**
     * @return mixed
     */
    public function getDepartement(): String
    {
        return $this->departement;
    }

    /**
     * @param mixed $departement
     *
     * @return self
     */
    public function setDepartement(String $departement): void
    {
        $this->departement = $departement;
    }

}

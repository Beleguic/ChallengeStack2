<?php

namespace App\Models;

use App\Core\SQL;
class Type extends SQL
{
    private Int $id = 0;
    protected String $id_hash;
    protected Int $id_type;
    protected String $titre;
    protected Int $prix;
    protected Int $superficieMaison;
    protected Int $SuperficieTerrain;
    protected Int $nbrPiece;
    protected Int $nbrChambre;
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
        $array['prix'] = $this->getPrix();
        $array['superficieMaison'] = $this->getSuperficieMaison();
        $array['SuperficieTerrain'] = $this->getSuperficieTerrain();
        $array['nbrPiece'] = $this->getNbrPiece();
        $array['nbrChambre'] = $this->getNbrChambre();
        $array['ville'] = $this->getPrix();
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
        $this->setId_Hash();
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

        return $this;
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

        return $this;
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

        return $this;
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

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSuperficieMaison(): Int
    {
        return $this->superficieMaison;
    }

    /**
     * @param mixed $superficieMaison
     *
     * @return self
     */
    public function setSuperficieMaison(Int $superficieMaison): void
    {
        $this->superficieMaison = $superficieMaison;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSuperficieTerrain(): Int
    {
        return $this->SuperficieTerrain;
    }

    /**
     * @param mixed $SuperficieTerrain
     *
     * @return self
     */
    public function setSuperficieTerrain(Int $SuperficieTerrain): void
    {
        $this->SuperficieTerrain = $SuperficieTerrain;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNbrPiece(): Int
    {
        return $this->nbrPiece;
    }

    /**
     * @param mixed $nbrPiece
     *
     * @return self
     */
    public function setNbrPiece(Int $nbrPiece): void
    {
        $this->nbrPiece = $nbrPiece;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNbrChambre(): Int
    {
        return $this->chambre;
    }

    /**
     * @param mixed $chambre
     *
     * @return self
     */
    public function setNbrChambre(Int $nbrChambre): void
    {
        $this->chambre = $chambre;

        return $this;
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

        return $this;
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

        return $this;
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

        return $this;
    }

}

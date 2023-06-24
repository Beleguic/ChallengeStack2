<?php

namespace App\Models;

use App\Core\SQL;
class v_Annonce extends SQL
{
    private Int $id = 0;
    protected String $id_hash;
    protected String $texte;
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
        $array['texte'] = $this->getTexte();
        $array['titre'] = $this->getTitre();
        $array['prix'] = $this->getPrix();
        $array['superficiemaison'] = $this->getSuperficiemaison();
        $array['superficieterrain'] = $this->getSuperficieterrain();
        $array['nbrpiece'] = $this->getNbrpiece();
        $array['nbrchambre'] = $this->getNbrchambre();
        $array['ville'] = $this->getVille();
        $array['rue'] = $this->getRue();
        $array['departement'] = $this->getDepartement();
        $array['regions'] = $this->getRegions();
        return $array;

    }
    /**
     * @return Int
     */
    public function getId(): Int
    {
        return $this->id;
    }

    /**
     * @return String
     */
    public function getIdHash(): String
    {
        return $this->id_hash;
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
    public function getVille(): String
    {
        return $this->ville;
    }

    /**
     * @return String
     */
    public function getRue(): String
    {
        return $this->rue;
    }

    /**
     * @return String
     */
    public function getDepartement(): String
    {
        return $this->departement;
    }

    /**
     * @return String
     */
    public function getRegions(): String
    {
        return $this->regions;
    }
}
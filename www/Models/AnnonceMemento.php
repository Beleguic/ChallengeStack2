<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\SQLInterface;
use App\Models\Annonce;

class AnnonceMemento extends SQL implements SQLInterface
{
    private String $id = '0';
    protected String $date_memento;
    protected String $id_annonce;
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
    protected String $ville;
    protected String $rue;
    protected String $departement;
    protected String $regions;




    public function __construct(){
        $sql = parent::getInstance();
        $classExploded = explode("\\", get_called_class());
        $this->pdo = $sql->pdo;
        $this->table = "zfgh_Annonce_Memento";
    }

    public function backup(Annonce $annonce): void
    {

        $this->setDateMemento(date('Y-m-d H:i:s'));
        $this->setIdAnnonce($annonce->getId());
        $this->setIdType($annonce->getIdType());
        $this->setIdAgent($annonce->getIdAgent());
        $this->setTitre($annonce->getTitre());
        $this->setPrix($annonce->getPrix());
        $this->setSuperficiemaison($annonce->getSuperficiemaison());
        $this->setSuperficieterrain($annonce->getSuperficieterrain());
        $this->setNbrpiece($annonce->getNbrpiece());
        $this->setNbrchambre($annonce->getNbrchambre());
        $this->setDescription($annonce->getDescription());
        $this->setVille($annonce->getVille());
        $this->setRue($annonce->getRue());
        $this->setDepartement($annonce->getDepartement());
        $this->setRegions($annonce->getRegions());
        $this->save();

    }

    public function restore(String $idMemento): Object
    {
        // Restaure l'enregistrement voulu
        $AnnonceMemento = $this->populate($idMemento);
        $annonce = new Annonce();
        $annonce->setId($AnnonceMemento->getIdAnnonce());
        $annonce->setIdType($AnnonceMemento->getIdType());
        $annonce->setIdAgent($AnnonceMemento->getIdAgent());
        $annonce->setTitre($AnnonceMemento->getTitre());
        $annonce->setPrix($AnnonceMemento->getPrix());
        $annonce->setSuperficiemaison($AnnonceMemento->getSuperficiemaison());
        $annonce->setSuperficieterrain($AnnonceMemento->getSuperficieterrain());
        $annonce->setNbrpiece($AnnonceMemento->getNbrpiece());
        $annonce->setNbrchambre($AnnonceMemento->getNbrchambre());
        $annonce->setDescription($AnnonceMemento->getDescription());
        $annonce->setVille($AnnonceMemento->getVille());
        $annonce->setRue($AnnonceMemento->getRue());
        $annonce->setDepartement($AnnonceMemento->getDepartement());
        $annonce->setRegions($AnnonceMemento->getRegions());
        return $annonce;

    }


    public function getConfigObject(): array
    {

        $array['id'] = $this->getId();
        $array['date_memento'] = $this->getDateMemento();
        $array['id_annonce'] = $this->getIdAnnonce();
        $array['id_type'] = $this->getIdType();
        $array['id_agent'] = $this->getIdAgent();
        $array['titre'] = $this->getTitre();
        $array['prix'] = $this->getPrix();
        $array['superficieMaison'] = $this->getSuperficiemaison();
        $array['superficieTerrain'] = $this->getSuperficieterrain();
        $array['nbrPiece'] = $this->getNbrpiece();
        $array['nbrChambre'] = $this->getNbrchambre();
        $array['description'] = $this->getDescription();
        $array['ville'] = $this->getVille();
        $array['rue'] = $this->getRue();
        $array['departement'] = $this->getDepartement();
        $array['regions'] = $this->getRegions();
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
     * @return Int
     */
    public function getIdAnnonce(): String
    {
        return $this->id_annonce;
    }

    /**
     * @param Int $id
     */
    public function setIdAnnonce(String $id_annonce): void
    {
        
        $this->id_annonce = $id_annonce;
    }

    /**
     * @return Int
     */
    public function getDateMemento(): String
    {
        return $this->date_memento;
    }

    /**
     * @param Int $id
     */
    public function setDateMemento(String $date_memento): void
    {
        
        $this->date_memento = $date_memento;
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


    public function getDescription(): String
    {
        return $this->description;
    }

    /**
     * @param mixed $departement
     *
     * @return self
     */
    public function setDescription(String $description): void
    {
        $this->description = $description;
    }

}

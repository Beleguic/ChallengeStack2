<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\SQLInterface;
class Opinion extends SQL implements SQLInterface 
{
    private String $id = '0';
    protected float $note;
    protected String $commentaire;
    protected String $id_agent;
    protected String $id_user;
    protected String $date_avis;
    protected bool $avis_agence;
    protected bool $id_valid;

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
        $array['note'] = $this->getNote();
        $array['commentaire'] = $this->getCommentaire();
        $array['id_agent'] = $this->getIdAgent();
        $array['id_user'] = $this->getIdUser();
        $array['date_avis'] = $this->getDateAvis();
        $array['avis_agence'] = $this->getAvisAgence();
        $array['is_valid'] = $this->getIsValid();
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
    public function getNote(): float
    {
        return $this->note;
    }

    /**
     * @param Int $id
     */
    public function setNote(float $note): void
    {
        $this->note = $note;
    }

        /**
     * @return Int
     */
    public function getCommentaire(): String
    {
        return $this->commentaire;
    }

    /**
     * @param Int $id
     */
    public function setCommentaire(String $commentaire): void
    {
        $this->commentaire = $commentaire;
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
    public function getIdUser(): String
    {
        return $this->id_user;
    }

    /**
     * @param Int $id
     */
    public function setIdUser(String $id_user): void
    {
        $this->id_user = $id_user;
    }

        /**
     * @return Int
     */
    public function getDateAvis(): String
    {
        return $this->date_avis;
    }

    /**
     * @param Int $id
     */
    public function setDateAvis(String $date_avis): void
    {
        $this->date_avis = $date_avis;
    }

        /**
     * @return Int
     */
    public function getAvisAgence(): Bool
    {
        return $this->avis_agence;
    }

    /**
     * @param Int $id
     */
    public function setAvisAgence(Bool $avis_agence): void
    {
        $this->avis_agence = $avis_agence;
    }

        /**
     * @return Int
     */
    public function getIsValid(): Bool
    {
        return $this->is_valid;
    }

    /**
     * @param Int $id
     */
    public function setIsValid(Bool $is_valid): void
    {
        $this->is_valid = $is_valid;
    }

}
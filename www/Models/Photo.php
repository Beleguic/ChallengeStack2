<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\SQLInterface;
class Photo extends SQL implements SQLInterface
{
    private String $id = '0';
    protected String $id_annonce;
    protected String $link_photo;
    protected String $description;

    public function __construct(){
        $sql = parent::getInstance();
        $classExploded = explode("\\", get_called_class());
        $this->pdo = $sql->pdo;
        $this->table = "zfgh_photo";
    }

    public function getConfigObject(): array
    {

        $array['id'] = $this->getId();
        $array['id_annonce'] = $this->getIdAnnonce();
        $array['link_photo'] = $this->getLinkPhoto();
        $array['description'] = $this->getDescription();
        
        return $array;
    }
    
    /**
     * @return mixed
     */
    public function getId(): String
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId(String $id): void
    {
        $this->id = $id;

    }


    /**
     * @return mixed
     */
    public function getIdAnnonce(): String
    {
        return $this->id_annonce;
    }

    /**
     * @param mixed $code
     *
     * @return self
     */
    public function setIdAnnonce(String $id_annonce): void
    {
        $this->id_annonce = $id_annonce;

    }

    /**
     * @return mixed
     */
    public function getLinkPhoto(): String
    {
        return $this->link_photo;
    }

    /**
     * @param mixed $code
     *
     * @return self
     */
    public function setLinkPhoto(String $link_photo): void
    {
        $this->link_photo = $link_photo;

    }

    /**
     * @return mixed
     */
    public function getDescription(): String
    {
        return $this->description;
    }

    /**
     * @param mixed $code
     *
     * @return self
     */
    public function setDescription(String $description): void
    {
        $this->description = $description;

    }

}
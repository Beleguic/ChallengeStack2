<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\SQLInterface;

class Agent extends SQL implements SQLInterface
{
    private String $id = '0';
    protected String $id_user;
    protected String $photolink;
    protected String $description;
    protected String $telephone;
    protected String $mobile;
    protected String $skype;
    protected String $facebook;
    protected String $twitter;
    protected String $instagram;
    protected String $linkedin;


    public function __construct(){
        $sql = parent::getInstance();
        $classExploded = explode("\\", get_called_class());
        $this->pdo = $sql->pdo;
        $this->table = "zfgh_".end($classExploded);
    }

    public function getConfigObject(): array
    {

        $array['id'] = $this->getId();
        $array['id_user'] = $this->getIdUser();
        $array['photolink'] = $this->getPhotoLink();
        $array['description'] = $this->getDescription();
        $array['telephone'] = $this->getTelephone();
        $array['mobile'] = $this->getMobile();
        $array['skype'] = $this->getSkype();
        $array['facebook'] = $this->getFacebook();
        $array['twitter'] = $this->getTwitter();
        $array['instagram'] = $this->getInstagram();
        $array['linkedin'] = $this->getLinkedin();
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
    public function getIdUser(): string
    {
        return $this->id_user;
    }

    /**
     * @param String $id_user
     */
    public function setIdUser(string $id_user): void
    {
        $this->id_user = $id_user;
    }

    /**
     * @return String
     */
    public function getPhotoLink(): string
    {
        return $this->photolink;
    }

    /**
     * @param String $photolink
     */
    public function setPhotoLink(string $photolink): void
    {
        $this->photolink = $photolink;
    }

    /**
     * @return String
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param String $desription
     */
    public function setDescription(string $id_user): void
    {
        $this->description = $description;
    }

    /**
     * @return String
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param String $telephone
     */
    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @return String
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @param String $mobile
     */
    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @return String
     */
    public function getSkype(): string
    {
        return $this->skype;
    }

    /**
     * @param String $skype
     */
    public function setSkype(string $skype): void
    {
        $this->skype = $skype;
    }

    /**
     * @return String
     */
    public function getFacebook(): string
    {
        return $this->facebook;
    }

    /**
     * @param String $facebook
     */
    public function setFacebook(string $facebook): void
    {
        $this->facebook = $facebook;
    }

    /**
     * @return String
     */
    public function getTwitter(): string
    {
        return $this->twitter;
    }

    /**
     * @param String $twitter
     */
    public function setTwitter(string $twitter): void
    {
        $this->twitter = $twitter;
    }

    /**
     * @return String
     */
    public function getInstagram(): string
    {
        return $this->instagram;
    }

    /**
     * @param String $Instagram
     */
    public function setInstagram(string $instagram): void
    {
        $this->instagram = $instagram;
    }

    /**
     * @return String
     */
    public function getLinkedin(): string
    {
        return $this->linkedin;
    }

    /**
     * @param String $linkedin
     */
    public function setLinkedin(string $linkedin): void
    {
        $this->linkedin = $linkedin;
    }

}
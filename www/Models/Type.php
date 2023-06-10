<?php

namespace App\Models;

use App\Core\SQL;
class Type extends SQL
{
    private Int $id = 0;
    protected String $id_hash;
    protected String $texte;

    public function __construct(){
        parent::__construct();
    }

    public function setId_Hash(): void
    {
        $this->id_hash = sha1(uniqid());
    }

    public function getId_Hash(): String
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
     * @return String
     */
    public function getTexte(): string
    {
        return $this->texte;
    }

    /**
     * @param String $firstname
     */
    public function setTexte(string $texte): void
    {
        $this->setId_Hash();
        $this->texte = ucwords(strtolower(trim($texte)));
    }

    



}

<?php
namespace App\Forms;
use App\Core\Validator;

class Annonce extends Validator
{
    public $method = "POST";
    protected array $config = [];
    public function getConfigAdd(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"annonce-form",
                "class"=>"form-add",
                "enctype"=>"",
                "submit"=>["Ajouter l'annonce"],
                "reset"=>"Annuler"
            ],
            "divs"=>[
                "div-titre" =>[
                    "id" => "div-titre",
                    "class" => "div-form-100",
                    "inside" => ["titre"]
                ],
                "div-prix-type" =>[
                    "id" => "div-prix-type",
                    "class" => "div-form-100",
                    "inside" => ["prix","id_type"]
                ],
                "div-superficie-maison-terrain" =>[
                    "id" => "div-superficie-maison-terrain",
                    "class" => "div-form-100",
                    "inside" => ["superficieMaison","superficieTerrain"]
                ],
                "div-nombre-piece-chambre" =>[
                    "id" => "div-nombre-piece-chambre",
                    "class" => "div-form-100",
                    "inside" => ["nbrPiece","nbrChambre"]
                ],
                "div-ville-rue" =>[
                    "id" => "div-ville-rue",
                    "class" => "div-form-100",
                    "inside" => ["ville","rue"]
                ],
                "div-departement-regions" =>[
                    "id" => "div-departement-regions",
                    "class" => "div-form-100",
                    "inside" => ["departement","regions"]
                ],
            ],
            "inputs"=>[
                "titre"=>[
                    "id"=>"type-form-titre",
                    "class"=>"form-input",
                    "placeholder"=>"Titre de l'annonce",
                    "type"=>"text",
                    "error"=>"Le titre d'annonce est incorrect",
                    "label" =>[
                        "for" => "Type-form-titre",
                        "id" => "label-Type-form-titre",
                        "class" => "form-label",
                        "value" => "Titre"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "prix"=>[
                    "id"=>"type-form-prix",
                    "class"=>"form-input",
                    "placeholder"=>"Prix de l'annonce",
                    "type"=>"number",
                    "error"=>"Le prix d'annonce est incorrect",
                    "label" =>[
                        "for" => "Type-form-prix",
                        "id" => "label-Type-form-prix",
                        "class" => "form-label",
                        "value" => "Prix"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "id_type"=>[
                    "balise" => "select",
                    "id"=>"type-form-id-type",
                    "class"=>"form-input",
                    "error"=>"Le type d'annonce est incorrect",
                    "label" =>[
                        "for" => "Type-form-id-type",
                        "id" => "label-Type-form-id-type",
                        "class" => "form-label",
                        "value" => "Type d'annonce"
                    ],
                    "value"=>"typeList",
                    "required"=>true
                ],
                "superficieMaison"=>[
                    "id"=>"type-form-superficieMaison",
                    "class"=>"form-input",
                    "placeholder"=>"superficie du bien",
                    "type"=>"number",
                    "error"=>"La superficie de la maison est incorrect",
                    "label" =>[
                        "for" => "Type-form-superficieMaison",
                        "id" => "label-Type-form-superficieMaison",
                        "class" => "form-label",
                        "value" => "Superficie de la maison"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "superficieTerrain"=>[
                    "id"=>"type-form-superficieTerrain",
                    "class"=>"form-input",
                    "placeholder"=>"superficie du bien",
                    "type"=>"number",
                    "error"=>"La superficie du terrain est incorrect",
                    "label" =>[
                        "for" => "Type-form-superficieTerrain",
                        "id" => "label-Type-form-superficieTerrain",
                        "class" => "form-label",
                        "value" => "superficie du terrain"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "nbrPiece"=>[
                    "id"=>"type-form-nbrPiece",
                    "class"=>"form-input",
                    "placeholder"=>"Nombre de piece",
                    "type"=>"number",
                    "error"=>"La nombre de piece est incorrect",
                    "label" =>[
                        "for" => "Type-form-nbrPiece",
                        "id" => "label-Type-form-nbrPiece",
                        "class" => "form-label",
                        "value" => "Nombre de piece"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "nbrChambre"=>[
                    "id"=>"type-form-nbrChambre",
                    "class"=>"form-input",
                    "placeholder"=>"Nombre de chambre",
                    "type"=>"number",
                    "error"=>"La nombre de piece est incorrect",
                    "label" =>[
                        "for" => "Type-form-nbrChambre",
                        "id" => "label-Type-form-nbrChambre",
                        "class" => "form-label",
                        "value" => "Nombre de chambre"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "ville"=>[
                    "id"=>"type-form-ville",
                    "class"=>"form-input",
                    "placeholder"=>"Ville",
                    "type"=>"text",
                    "error"=>"La ville est incorrect",
                    "label" =>[
                        "for" => "Type-form-ville",
                        "id" => "label-Type-form-ville",
                        "class" => "form-label",
                        "value" => "Ville"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "rue"=>[
                    "id"=>"type-form-rue",
                    "class"=>"form-input",
                    "placeholder"=>"Rue",
                    "type"=>"text",
                    "error"=>"La rue est incorrect",
                    "label" =>[
                        "for" => "Type-form-rue",
                        "id" => "label-Type-form-rue",
                        "class" => "form-label",
                        "value" => "Rue"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "departement"=>[
                    "id"=>"type-form-departement",
                    "class"=>"form-input",
                    "placeholder"=>"Département",
                    "type"=>"text",
                    "error"=>"Le departement est incorrect",
                    "label" =>[
                        "for" => "Type-form-departement",
                        "id" => "label-Type-form-departement",
                        "class" => "form-label",
                        "value" => "Département"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "regions"=>[
                    "id"=>"type-form-regions",
                    "class"=>"form-input",
                    "placeholder"=>"Régions",
                    "type"=>"text",
                    "error"=>"La régions est incorrect",
                    "label" =>[
                        "for" => "Type-form-regions",
                        "id" => "label-Type-form-regions",
                        "class" => "form-label",
                        "value" => "Régions"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
            ]
        ];
        return $this->config;
    }

    public function getConfigUpdate(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"",
                "class"=>"form-updatde",
                "enctype"=>"",
                "submit"=>["Modifier le type d'annonce","Annuler"],
            ],
            "divs"=>[
                "div-titre" =>[
                    "id" => "div-titre",
                    "class" => "div-form-100",
                    "inside" => ["titre","id_hash"]
                ],
                "div-prix-type" =>[
                    "id" => "div-prix-type",
                    "class" => "div-form-100",
                    "inside" => ["prix","id_type"]
                ],
                "div-superficie-maison-terrain" =>[
                    "id" => "div-superficie-maison-terrain",
                    "class" => "div-form-100",
                    "inside" => ["superficieMaison","superficieTerrain"]
                ],
                "div-nombre-piece-chambre" =>[
                    "id" => "div-nombre-piece-chambre",
                    "class" => "div-form-100",
                    "inside" => ["nbrPiece","nbrChambre"]
                ],
                "div-ville-rue" =>[
                    "id" => "div-ville-rue",
                    "class" => "div-form-100",
                    "inside" => ["ville","rue"]
                ],
                "div-departement-regions" =>[
                    "id" => "div-departement-regions",
                    "class" => "div-form-100",
                    "inside" => ["departement","regions"]
                ],
            ],

            "inputs"=>[
                "id_hash"=>[
                    "id"=>"id-hash-update",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "titre"=>[
                    "id"=>"type-form-titre",
                    "class"=>"form-input",
                    "placeholder"=>"Titre de l'annonce",
                    "type"=>"text",
                    "error"=>"Le titre d'annonce est incorrect",
                    "label" =>[
                        "for" => "Type-form-titre",
                        "id" => "label-Type-form-titre",
                        "class" => "form-label",
                        "value" => "Titre"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "prix"=>[
                    "id"=>"type-form-prix",
                    "class"=>"form-input",
                    "placeholder"=>"Prix de l'annonce",
                    "type"=>"number",
                    "error"=>"Le prix d'annonce est incorrect",
                    "label" =>[
                        "for" => "Type-form-prix",
                        "id" => "label-Type-form-prix",
                        "class" => "form-label",
                        "value" => "Prix"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "id_type"=>[
                    "balise" => "select",
                    "id"=>"type-form-id-type",
                    "class"=>"form-input",
                    "error"=>"Le type d'annonce est incorrect",
                    "label" =>[
                        "for" => "Type-form-id-type",
                        "id" => "label-Type-form-id-type",
                        "class" => "form-label",
                        "value" => "Type d'annonce"
                    ],
                    "value"=>"typeList",
                    "required"=>true
                ],
                "superficieMaison"=>[
                    "id"=>"type-form-superficieMaison",
                    "class"=>"form-input",
                    "placeholder"=>"superficie du bien",
                    "type"=>"number",
                    "error"=>"La superficie de la maison est incorrect",
                    "label" =>[
                        "for" => "Type-form-superficieMaison",
                        "id" => "label-Type-form-superficieMaison",
                        "class" => "form-label",
                        "value" => "Superficie de la maison"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "superficieTerrain"=>[
                    "id"=>"type-form-superficieTerrain",
                    "class"=>"form-input",
                    "placeholder"=>"superficie du bien",
                    "type"=>"number",
                    "error"=>"La superficie du terrain est incorrect",
                    "label" =>[
                        "for" => "Type-form-superficieTerrain",
                        "id" => "label-Type-form-superficieTerrain",
                        "class" => "form-label",
                        "value" => "superficie du terrain"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "nbrPiece"=>[
                    "id"=>"type-form-nbrPiece",
                    "class"=>"form-input",
                    "placeholder"=>"Nombre de piece",
                    "type"=>"number",
                    "error"=>"La nombre de piece est incorrect",
                    "label" =>[
                        "for" => "Type-form-nbrPiece",
                        "id" => "label-Type-form-nbrPiece",
                        "class" => "form-label",
                        "value" => "Nombre de piece"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "nbrChambre"=>[
                    "id"=>"type-form-nbrChambre",
                    "class"=>"form-input",
                    "placeholder"=>"Nombre de chambre",
                    "type"=>"number",
                    "error"=>"La nombre de piece est incorrect",
                    "label" =>[
                        "for" => "Type-form-nbrChambre",
                        "id" => "label-Type-form-nbrChambre",
                        "class" => "form-label",
                        "value" => "Nombre de chambre"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "ville"=>[
                    "id"=>"type-form-ville",
                    "class"=>"form-input",
                    "placeholder"=>"Ville",
                    "type"=>"text",
                    "error"=>"La ville est incorrect",
                    "label" =>[
                        "for" => "Type-form-ville",
                        "id" => "label-Type-form-ville",
                        "class" => "form-label",
                        "value" => "Ville"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "rue"=>[
                    "id"=>"type-form-rue",
                    "class"=>"form-input",
                    "placeholder"=>"Rue",
                    "type"=>"text",
                    "error"=>"La rue est incorrect",
                    "label" =>[
                        "for" => "Type-form-rue",
                        "id" => "label-Type-form-rue",
                        "class" => "form-label",
                        "value" => "Rue"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "departement"=>[
                    "id"=>"type-form-departement",
                    "class"=>"form-input",
                    "placeholder"=>"Département",
                    "type"=>"text",
                    "error"=>"Le departement est incorrect",
                    "label" =>[
                        "for" => "Type-form-departement",
                        "id" => "label-Type-form-departement",
                        "class" => "form-label",
                        "value" => "Département"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "regions"=>[
                    "id"=>"type-form-regions",
                    "class"=>"form-input",
                    "placeholder"=>"Régions",
                    "type"=>"text",
                    "error"=>"La régions est incorrect",
                    "label" =>[
                        "for" => "Type-form-regions",
                        "id" => "label-Type-form-regions",
                        "class" => "form-label",
                        "value" => "Régions"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
            ]
        ];
        return $this->config;
    }

    public function getConfigDelete(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"",
                "class"=>"form-delete",
                "enctype"=>"",
                "submit"=>["Supprimer","Annuler"],
            ],
            "divs"=>[
                "div-form" =>[
                    "id" => "div-type-form",
                    "class" => "div-form-100",
                    "inside" => ["submit","id_hash"]
                ],
            ],
            "inputs"=>[
                "id_hash"=>[
                    "id"=>"id-hash-delete",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
            ]
        ];
        return $this->config;
    }

    function getOptionFromSelect($table){



    }
}

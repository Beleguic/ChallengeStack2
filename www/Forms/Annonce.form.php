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
                "class"=>"app-card app-card-settings shadow-sm p-4",
                "enctype"=>"",
                "submit"=>["Ajouter l'annonce"],
                "reset"=>"Annuler"
            ],
            "submit"=>[
                "Ajouter l'annonce" => [
                    "id" => "",
                    "class" => "btn app-btn-primary m-2"
                ],
            ],
            "reset"=>[
                "Annuler" => [
                    "id" => "",
                    "class" => "btn app-btn-primary m-2"
                ],
            ],
            "divs"=>[
                "div-titre" =>[
                    "id" => "div-titre",
                    "class" => "pb-4",
                    "inside" => ["titre"]
                ],
                "div-prix-type" =>[
                    "id" => "div-prix-type",
                    "class" => "row pb-4",
                    "inside" => ["prix","id_type"]
                ],
                "div-superficie-maison-terrain" =>[
                    "id" => "div-superficie-maison-terrain",
                    "class" => "row pb-4",
                    "inside" => ["superficieMaison","superficieTerrain"]
                ],
                "div-nombre-piece-chambre" =>[
                    "id" => "div-nombre-piece-chambre",
                    "class" => "row pb-4",
                    "inside" => ["nbrPiece","nbrChambre"]
                ],
                "div-ville-rue" =>[
                    "id" => "div-ville-rue",
                    "class" => "row pb-4",
                    "inside" => ["ville","rue"]
                ],
                "div-departement-regions" =>[
                    "id" => "div-departement-regions",
                    "class" => "row pb-4",
                    "inside" => ["departement","regions"]
                ],
                "div-departement-description" =>[
                    "id" => "div-description",
                    "class" => "pb-4",
                    "inside" => ["description"]
                ],
            ],
            "inputs"=>[
                "titre"=>[
                    "id"=>"type-form-titre",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-prix",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "balise" => "select",
                    "id"=>"type-form-id-type",
                    "class"=>"form-select",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-superficieMaison",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-superficieTerrain",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-nbrPiece",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-nbrChambre",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-ville",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-rue",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-departement",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-regions",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                "description"=>[
                    "balise"=>"textarea",
                    "rows" => "5",
                    "id"=>"type-form-description",
                    "class"=>"custom-textarea",
                    "placeholder"=>"",
                    "error"=>"La description est incorrect",
                    "label" =>[
                        "for" => "Type-form-description",
                        "id" => "label-Type-form-description",
                        "class" => "form-label",
                        "value" => "Description"
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
                "id"=>"update-annonce-form",
                "class"=>"app-card app-card-settings shadow-sm p-4",
                "enctype"=>"",
                "submit"=>["Modifier l'annonce"],
                "reset"=>"Annuler",
            ],
            "submit"=>[
                "Modifier l'annonce" => [
                    "id" => "",
                    "class" => "btn app-btn-primary m-2"
                ],
            ],
            "reset"=>[
                "Annuler" => [
                    "id" => "",
                    "class" => "btn app-btn-primary m-2"
                ],
            ],
            "divs"=>[
                "div-titre" =>[
                    "id" => "div-titre",
                    "class" => "pb-4",
                    "inside" => ["titre","id"]
                ],
                "div-prix-type" =>[
                    "id" => "div-prix-type",
                    "class" => "row pb-4",
                    "inside" => ["prix","id_type"]
                ],
                "div-superficie-maison-terrain" =>[
                    "id" => "div-superficie-maison-terrain",
                    "class" => "row pb-4",
                    "inside" => ["superficieMaison","superficieTerrain"]
                ],
                "div-nombre-piece-chambre" =>[
                    "id" => "div-nombre-piece-chambre",
                    "class" => "row pb-4",
                    "inside" => ["nbrPiece","nbrChambre"]
                ],
                "div-ville-rue" =>[
                    "id" => "div-ville-rue",
                    "class" => "row pb-4",
                    "inside" => ["ville","rue"]
                ],
                "div-departement-regions" =>[
                    "id" => "div-departement-regions",
                    "class" => "row pb-4",
                    "inside" => ["departement","regions"]
                ],
                "div-departement-description" =>[
                    "id" => "div-description",
                    "class" => "pb-4",
                    "inside" => ["description"]
                ],
            ],

            "inputs"=>[
                "id"=>[
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
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-prix",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "balise" => "select",
                    "id"=>"type-form-id-type",
                    "class"=>"form-select",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-superficieMaison",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-superficieTerrain",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-nbrPiece",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-nbrChambre",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-ville",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-rue",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-departement",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-regions",
                    "class"=>"custom-input",
                    "placeholder"=>"",
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
                "description"=>[
                    "balise"=>"textarea",
                    "rows" => "5",
                    "id"=>"type-form-description",
                    "class"=>"custom-textarea",
                    "placeholder"=>"",
                    "error"=>"La description est incorrect",
                    "label" =>[
                        "for" => "Type-form-description",
                        "id" => "label-Type-form-description",
                        "class" => "form-label",
                        "value" => "Description"
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
                "submit"=>["Supprimer"],
            ],
            "submit"=>[
                "Supprimer" => [
                    "id" => "",
                    "class" => "btn btn-danger m-2 text-white"
                ],
            ],
            "divs"=>[
                "div-form" =>[
                    "id" => "div-type-form",
                    "class" => "div-form-100",
                    "inside" => ["id"]
                ],
            ],
            "inputs"=>[
                "id"=>[
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

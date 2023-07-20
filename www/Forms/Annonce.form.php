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
                    "inside" => ["adresse"]
                ],
                "div-adresse-container" =>[
                    "id" => "resultats",
                    "class" => "row pb-4",
                    "inside" => []
                ],
                "div-adresse-hidden-container" =>[
                    "id" => "address-hidden",
                    "class" => "",
                    "inside" => ["region","deplabel","depnum","postcode","adrcomplet","city","latitude","longitude"]
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
                "adresse"=>[
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-adresse",
                    "class"=>"custom-input",
                    "list" => "listAdresse",
                    "placeholder"=>"",
                    "type"=>"text",
                    "error"=>"La ville est incorrect",
                    "label" =>[
                        "for" => "Type-form-ville",
                        "id" => "label-Type-form-ville",
                        "class" => "form-label",
                        "value" => "Adresse de l'annonce"
                    ],
                    "div" => [
                        'id' => "listAdresse"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "city"=>[
                    "id"=>"city-annonce-form",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "adrcomplet"=>[
                    "id"=>"adrcomplet-annonce-form",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "postcode"=>[
                    "id"=>"postcode-annonce-form",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "depnum"=>[
                    "id"=>"depnum-annonce-form",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "deplabel"=>[
                    "id"=>"deplabel-annonce-form",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "region"=>[
                    "id"=>"region-annonce-form",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "latitude"=>[
                    "id"=>"latitude-annonce-form",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "longitude"=>[
                    "id"=>"longitude-annonce-form",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
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
                    "inside" => ["adresse"]
                ],
                "div-adresse-container" =>[
                    "id" => "resultats",
                    "class" => "row pb-4",
                    "inside" => []
                ],
                "div-adresse-hidden-container" =>[
                    "id" => "address-hidden",
                    "class" => "",
                    "inside" => ["region","deplabel","depnum","postcode","adrcomplet","city","latitude","longitude"]
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
                "adresse"=>[
                    "divId"=>"",
                    "divClass"=>"col-md-6 mb-3 mb-md-0",
                    "id"=>"type-form-adresse",
                    "class"=>"custom-input",
                    "list" => "listAdresse",
                    "placeholder"=>"",
                    "type"=>"text",
                    "error"=>"La ville est incorrect",
                    "label" =>[
                        "for" => "Type-form-ville",
                        "id" => "label-Type-form-ville",
                        "class" => "form-label",
                        "value" => "Adresse de l'annonce"
                    ],
                    "div" => [
                        'id' => "listAdresse"
                    ],
                    "value"=>"",
                    "required"=>true
                ],
                "city"=>[
                    "id"=>"city-annonce-form",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "adrcomplet"=>[
                    "id"=>"adrcomplet-annonce-form",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "postcode"=>[
                    "id"=>"postcode-annonce-form",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "depnum"=>[
                    "id"=>"depnum-annonce-form",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "deplabel"=>[
                    "id"=>"deplabel-annonce-form",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "region"=>[
                    "id"=>"region-annonce-form",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "latitude"=>[
                    "id"=>"latitude-annonce-form",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "longitude"=>[
                    "id"=>"longitude-annonce-form",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
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

    public function getConfigAddPhoto(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"",
                "class"=>"form-updatde",
                "enctype"=>"multipart/form-data",
                "submit"=>["Ajouter les photos","Annuler"],
            ],
            "divs"=>[
                "div-photo" =>[
                    "id" => "div-photo",
                    "class" => "div-form-100",
                    "inside" => ["photo","idAnnonce","operation"]
                ],
                "div-preview" => [
                    "id" => "div-preview",
                    "class" => "preview",
                    "inside" => []
                ]
            ],

            "inputs"=>[
                "idAnnonce"=>[
                    "id"=>"id-annonce-add",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "photo"=>[
                    "id" => "type-form-photo",
                    "class"=>"form-input",
                    "placeholder"=>"Ajouter des photo a l'annonce",
                    "type"=>"file",
                    "error"=>"La photo est incorrect incorrect",
                    "label" =>[
                        "for" => "type-form-photo",
                        "id" => "label-Type-form-photo",
                        "class" => "form-label",
                        "value" => "Sélectionner des images à uploader (PNG, JPG)"
                    ],
                    "value"=>"",
                    "required"=>true,
                    "multiple"=>true,
                    "accept"=>".jpg, .jpeg, .png"

                ],
                "operation"=>[
                    "id"=>"id-photo-del",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"addPhoto",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
            ]
        ];
        return $this->config;

    }

    public function getConfigDelPhoto(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"",
                "class"=>"form-updatde",
                "enctype"=>"multipart/form-data",
                "submit"=>["Supprimer la photo"],
            ],
            "divs"=>[
                "div-photo" =>[
                    "id" => "div-photo",
                    "class" => "div-form-100",
                    "inside" => ["id", "operation"]
                ]
            ],

            "inputs"=>[
                "id"=>[
                    "id"=>"id-photo-del",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "operation"=>[
                    "id"=>"id-photo-del",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"delPhoto",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
            ]
        ];
        return $this->config;

    }

    public function getConfigUpdateDescription(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"",
                "class"=>"form-updatde",
                "enctype"=>"multipart/form-data",
                "submit"=>["Mettre a jour la description"],
            ],
            "divs"=>[
                "div-photo" =>[
                    "id" => "div-photo",
                    "class" => "div-form-100",
                    "inside" => ["id", "operation", "description"]
                ]
            ],

            "inputs"=>[
                "id"=>[
                    "id"=>"id-photo-del",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "operation"=>[
                    "id"=>"id-photo-del",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"updateDescription",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
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
                    "value"=>""
                ],
            ]
        ];
        return $this->config;

    }
}

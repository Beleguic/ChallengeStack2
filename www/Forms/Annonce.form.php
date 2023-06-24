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
                    "id" => "div-type-texte",
                    "class" => "div-form-100",
                    "inside" => ["titre"]
                ],
                "div-prix" =>[
                    "id" => "div-type-texte",
                    "class" => "div-form-100",
                    "inside" => ["prix","id_type"]
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
                "submit"=>["Modifier le type d'annonce"],
            ],
            "divs"=>[
                "div-texte" =>[
                    "id" => "div-type-texte",
                    "class" => "div-form-100",
                    "inside" => ["texte","id_hash"]
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
                "texte"=>[
                    "id"=>"texte-update",
                    "class"=>"form-input",
                    "type"=>"text",
                    "value"=>"",
                    "error"=>"Le type d'annonce est incorrect",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
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

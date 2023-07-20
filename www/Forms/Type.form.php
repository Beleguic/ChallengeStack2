<?php
namespace App\Forms;
use App\Core\Validator;

class Type extends Validator
{
    public $method = "POST";
    protected array $config = [];
    public function getConfigAdd(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"type-form",
                "class"=>"app-card app-card-settings shadow-sm p-4",
                "enctype"=>"",
                "submit"=>["Ajouter le type d'annonce"],
                "reset"=>"Annuler"
            ],
            "submit"=>[
                "Ajouter le type d'annonce" => [
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
                "div-texte" =>[
                    "id" => "div-type-texte",
                    "class" => "pb-4",
                    "inside" => ["texte"]
                ],
            ],
            "inputs"=>[
                "texte"=>[
                    "id"=>"type-form-texte",
                    "class"=>"custom-input",
                    "placeholder"=>"",
                    "type"=>"text",
                    "error"=>"Le type d'annonce est incorrect",
                    "label" =>[
                        "for" => "Type-form-texte",
                        "id" => "label-Type-form-texte",
                        "class" => "form-label",
                        "value" => "Type d'annonce"
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
                "class"=>"app-card app-card-settings shadow-sm p-4",
                "enctype"=>"",
                "submit"=>["Modifier le type d'annonce"],
            ],
            "submit"=>[
                "Modifier le type d'annonce" => [
                    "id" => "",
                    "class" => "btn app-btn-primary m-2"
                ],
            ],
            "divs"=>[
                "div-texte" =>[
                    "id" => "div-type-texte",
                    "class" => "div-form-100",
                    "inside" => ["texte","id"]
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
                "texte"=>[
                    "id"=>"texte-update",
                    "class"=>"custom-input",
                    "type"=>"text",
                    "value"=>"",
                    "error"=>"Le type d'annonce est incorrect",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>"",
                    "label" =>[
                        "for" => "Type-form-titre",
                        "id" => "label-Type-form-titre",
                        "class" => "form-label",
                        "value" => "Nom du type"
                    ],
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
}

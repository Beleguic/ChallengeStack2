<?php
namespace App\Forms;
use App\Core\Validator;

class Opinion extends Validator
{
    public $method = "POST";
    protected array $config = [];

    
    public function getConfigAddOpinion(): array 
    {
        $this->config = [
                "config"=>[
                    "method"=>$this->method,
                    "action"=>"",
                    "id"=>"register-form",
                    "class"=>"form",
                    "enctype"=>"",
                    "submit"=>["Ajouter l'avis"],
                ],
                "submit"=>[
                    "Ajouter l'avis" => [
                        "id" => "",
                        "class" => "btn btn-outline-b-n btn-block m-4 w-50"
                    ],
                ],
                "divs"=>[
                    "div-pwd" =>[
                        "id" => "div-register-pwd",
                        "class" => "div-form-50",
                        "inside" => ["anonyme","note","commentaire","id_agent"]
                    ],
                ],
                "inputs"=>[
                    "note"=>[
                        "divId"=>"",
                        "divClass"=>"",
                        "id"=>"opinion-form-note",
                        "class"=>"form-control",
                        "placeholder"=>"Note",
                        "type"=>"text",
                        "label" =>[
                            "for" => "opinion-form-note",
                            "id" => "label-opinion-form-note",
                            "class" => "form-label color-a",
                            "value" => "Votre note"
                        ],
                        "required"=>true
                    ], 
                    "commentaire"=>[
                        "divId"=>"",
                        "divClass"=>"",
                        "balise"=>"textarea",
                        "rows" => "5",
                        "id"=>"opinion-form-commentaire",
                        "class"=>"custom-textarea",
                        "placeholder"=>"",
                        "error"=>"L'avis n'est pas correct",
                        "label" =>[
                            "for" => "opinion-form-commentaire",
                            "id" => "label-opinion-form-commentaire",
                            "class" => "form-label",
                            "value" => "Avis"
                        ],
                        "value"=>"",
                        "required"=>false
                    ],
                    "id_agent"=>[
                        "id"=>"id-agent-opinion-add",
                        "class"=>"",
                        "type"=>"hidden",
                        "value"=>"",
                        "placeholder"=>"",
                        "error"=>"",
                        "required"=>false
                    ],        
                ]
        ];
        return $this->config;
    }
}
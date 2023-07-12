<?php

namespace App\Core;

class Validator
{
    private array $data = [];
    private array $dataFile = [];
    public array $errors = [];
    
    public function isSubmited(): bool
    {

        $this->data = ($this->method == "POST")?$_POST:$_GET;
        if(isset($_FILES) && sizeof($_FILES) > 0){
            $this->data = array_merge($this->data, $_FILES);
        }
        if(isset($this->data["submit"])){
            return true;
        }
        return false;
    }
    public function isValid(): bool
    {
        //La bonne method ?
        if($_SERVER["REQUEST_METHOD"] != $this->method){
            die("Tentative de Hack1");
        }
        //Le nb de inputs3
        if(count($this->config["inputs"])+1 != count($this->data)){
            die("Tentative de Hack2");
        }

        foreach ($this->config["inputs"] as $name=>$configInput){
            if(!isset($this->data[$name])){
                die("Tentative de Hack3");
            }
            if(isset($configInput["required"])){
                if(is_string($this->data[$name])){ // chaine de caractere
                    if(self::isEmpty($this->data[$name])){
                        die("Tentaive de hack 4");
                    }
                }
                else { // tableau
                    if(!sizeof($this->data[$name]) > 0){
                        die("Tentaive de hack 5");
                    }
                }
            } 
            if(isset($configInput["min"]) && !self::isMinLength($this->data[$name], $configInput["min"])){
                $this->errors[]=$configInput["error"];
            }
            if(isset($configInput["max"]) && !self::isMaxLength($this->data[$name], $configInput["max"])){
                $this->errors[]=$configInput["error"];
            }
            if($name == 'email' && !self::isEmailGood($this->data[$name])){
                $this->errors[]=$configInput["error"];
            }   
            if($name == 'pwd'){
                $result = self::isPwdGood($this->data[$name],$this->data['pwdConfirm']);
                if(gettype($result) != "boolean"){
                    $this->errors[]=$result;
                }                
            }
        }
        if(empty($this->errors)){
            return true;
        }
        return false;
    }

    public static function isEmpty(String $string): bool
    {
        return empty(trim($string));
    }
    public static function isMinLength(String $string, $length): bool
    {
        return strlen(trim($string))>=$length;
    }
    public static function isMaxLength(String $string, $length): bool
    {
        return strlen(trim($string))<=$length;
    }
    public static function isEmailGood(String $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public static function isPwdEqual(String $pwd, String $pwdConfirm): bool
    {
        return $pwd == $pwdConfirm;
    }
    public static function isPwdGood(String $pwd, String $pwdConfirm): bool|String
    {
        if(!empty($pwd) && self::isPwdEqual($pwd, $pwdConfirm)) {
            if (strlen($pwd) <= '8') {
                $passwordErr = "Votre mot de passe doit contenir au moins 8 carcatères !";
            }
            elseif(!preg_match("#[0-9]+#",$pwd)) {
                $passwordErr = "Votre mot de passe doit contenir au moins 1 nombre !";
            }
            elseif(!preg_match("#[A-Z]+#",$pwd)) {
                $passwordErr = "Votre mot de passe doit contenir au moins 1 lettre majuscule !";
            }
            elseif(!preg_match("#[a-z]+#",$pwd)) {
                $passwordErr = "Votre mot de passe doit contenir au moins 1 lettre minuscule !";
            }
            else{
                return true;
            }
        }
        elseif(!empty($_POST["pwd"])) {
            $passwordErr = "Les deux mot de passe ne sont pas les mêmes";
        } else {
             $passwordErr = "Entrée un mot de passe";
        }
        return $passwordErr;
    }


}
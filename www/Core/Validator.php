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
            $_SESSION['error']['message'] = 'Une erreur a été detecter, veuiller recommencer';
            $_SESSION['error']['codeErorr'] = 2;
            $_SESSION['error']['data'] = $data;
            $redirection = $_SERVER['HTTP_REFERER'];
            $redirectionExploded = explode("/", $redirection);
            $redirection = end($redirectionExploded);
            header('location: /'.$redirection);
            //die("Tentative de Hack1");
        }
        //echo("<pre>");
        //Le nb de inputs3
        //var_dump($this->config["inputs"]);
        //var_dump($this->data);
        //var_dump(count($this->data));
        //var_dump(count($this->config["inputs"])+1);
        //echo("</pre>"); 
        if(count($this->config["inputs"])+1 != count($this->data)){
            $_SESSION['error']['message'] = 'Une erreur a été detecter, veuiller recommencer';
            $_SESSION['error']['codeErorr'] = 2;
            $_SESSION['error']['data'] = $this->data;
            $redirection = $_SERVER['HTTP_REFERER'];
            $redirectionExploded = explode("/", $redirection);
            $redirection = end($redirectionExploded);
            header('location: /'.$redirection);
        }

        foreach ($this->config["inputs"] as $name=>$configInput){
            if(!isset($this->data[$name])){
                $_SESSION['error']['message'] = 'Une erreur a été detecter, veuiller recommencer';
                $_SESSION['error']['codeErorr'] = 2;
                $_SESSION['error']['data'] = $this->data;
                $redirection = $_SERVER['HTTP_REFERER'];
                $redirectionExploded = explode("/", $redirection);
                $redirection = end($redirectionExploded);
                header('location: /'.$redirection);
            }
            if(isset($configInput["required"]) && $configInput["required"]){
                if(is_string($this->data[$name])){ // chaine de caractere
                    if(self::isEmpty($this->data[$name])){
                        $_SESSION['error']['message'] = 'Une erreur a été detecter, veuiller recommencer';
                        $_SESSION['error']['codeErorr'] = 2;
                        $_SESSION['error']['data'] = $this->data;
                        $redirection = $_SERVER['HTTP_REFERER'];
                        $redirectionExploded = explode("/", $redirection);
                        $redirection = end($redirectionExploded);
                        header('location: /'.$redirection);
                    }
                }
                else { // tableau
                    if(!sizeof($this->data[$name]) > 0){
                        $_SESSION['error']['message'] = 'Une erreur a été detecter, veuiller recommencer';
                        $_SESSION['error']['codeErorr'] = 2;
                        $_SESSION['error']['data'] = $this->data;
                        $redirection = $_SERVER['HTTP_REFERER'];
                        $redirectionExploded = explode("/", $redirection);
                        $redirection = end($redirectionExploded);
                        header('location: /'.$redirection);
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
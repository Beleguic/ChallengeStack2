<?php


namespace App\Core;

class Response{
    public function setStatutCode(int $code){
        http_response_code($code);
    }
}





























?>
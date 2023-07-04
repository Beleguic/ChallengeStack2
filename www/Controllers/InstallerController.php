<?php

namespace App\Controllers;

use App\Core\Controller;


class InstallerController extends Controller
{
    public function getInstaller() : string
    {

        $data = [
            "message" => "Ceci est un exemple de réponse JSON depuis l'API."
        ];
        header("Content-Type: application/json");
        return  json_encode($data);
    }
}
<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Core\Mailer;
use App\Models\Connexion;
use App\Models\UserCode;
use App\Core\ValidatorApi;


class InstallerController extends Controller
{

    
    public function getInstaller() 
    {
        $requestData = json_decode(file_get_contents('php://input'), true);
        $host = $requestData['host'] ?? '';
        $dbname = $requestData['dbname'] ?? '';
        $port = $requestData['port'] ?? '';
        $user = $requestData['user'] ?? '';
        $password = $requestData['password'] ?? '';
        $email = $requestData['email'] ?? '';
        $name = $requestData['name'] ?? '';


        // Chemin vers le fichier config.php (à adapter selon votre besoin)
        $configFilePath = 'config.php';
        try {
            $pdo = new \PDO("pgsql:host=$host;dbname=$dbname;port=$port", $user, $password);
        } catch (\PDOException $e) {
            // En cas d'erreur de connexion, renvoyer une réponse JSON avec le message d'erreur
            $response = [
                'error' => $e->getMessage()
            ];
            http_response_code(400);
            header('Content-Type: application/json');
            echo json_encode($response);
            return;
        }








        $configContent = "<?php\n\n";
        $configContent .= "\$config['host'] = '$host';\n";
        $configContent .= "\$config['dbname'] = '$dbname';\n";
        $configContent .= "\$config['port'] = '$port';\n";
        $configContent .= "\$config['user'] = '$user';\n";
        $configContent .= "\$config['password'] = '$password';\n";
        $configContent .= "\$config['email'] = '$email';\n";
        $configContent .= "\$config['name'] = '$name';\n";
        $configContent .= "\n";

        // Écriture du contenu dans le fichier config.php
        file_put_contents($configFilePath, $configContent);


        //mettre try catch et utilisation technique thibault
        $sqlFilePath = __DIR__ . "/../bdd.sql";
        
        $sqlContent = file_get_contents($sqlFilePath);
        $pdo->exec($sqlContent);

        // Retourner une réponse JSON
        $response = [
            'message' => $host,
        ];
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($response);
        
    }
    public function createUser(){

        $validator = new ValidatorApi();
        $formData = json_decode(file_get_contents('php://input'), true);
            $validationResult = $validator->validateFormData($formData);
            http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($validationResult);
       



        
    }
    
    

}
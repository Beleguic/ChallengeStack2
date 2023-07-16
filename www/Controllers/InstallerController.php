<?php

namespace App\Controllers;

use App\Core\Controller;


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

        // insertion BDD
        // recuperation des donnée du fichier bdd.sql
        // insertion de la chaine de caractere via un $pdo->exec($query);







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

        // Retourner une réponse JSON
        $response = [
            'message' => $host,
        ];
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($response);
        
    }
}
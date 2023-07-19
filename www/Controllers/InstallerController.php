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
        $configFilePath = 'app.ini';
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








        $configContent = "[database]\n\n";
        $configContent .= "host = $host\n";
        $configContent .= "dbname = $dbname\n";
        $configContent .= "port = $port\n";
        $configContent .= "user = $user\n";
        $configContent .= "password = $password\n";
        $configContent .= "email = $email\n";
        $configContent .= "name = $name\n";
        $configContent .= "n";

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
        if (!empty($validationResult['error'])) {
            // En cas d'erreurs de validation, renvoyer les messages d'erreur JSON
            http_response_code(400);
            header('Content-Type: application/json');
            echo json_encode($validationResult);
            return;
        }
            $user = new User();
            $user->setFirstname($validator->sanitizeInput($formData['firstName']));
            $user->setLastname($validator->sanitizeInput($formData['lastName']));
            $user->setEmail($validator->sanitizeInput($formData['email']));
            $user->setPwd($validator->sanitizeInput($formData['pwd']));
            $user->setStatus(4);
            $user->save();
            $userAdd = $user->populateWithMail($formData['email']);
            
            
            $newToken = sha1(uniqid());
            $_SESSION['zfgh_login']['connected'] = true;
            $_SESSION['zfgh_login']['email'] = $formData['email'];
            $_SESSION['zfgh_login']['firstname'] = $userAdd->getFirstname();
            $_SESSION['zfgh_login']['lastname'] = $userAdd->getLastname();
            $_SESSION['zfgh_login']['id'] = $userAdd->getId();
            $_SESSION['zfgh_login']['status'] = $userAdd->getStatus();
            $_SESSION['zfgh_login']['actif'] = $userAdd->getActif();
            $_SESSION['zfgh_login']['token'] = $newToken;
           
            $user_code = new UserCode();
            $user_code->setIdUser($userAdd->getId());
            $user_code->setCode($this->createCode());
            $user_code->save();
            // Envoie du mail
            $mail = new Mailer();
            $mail->sendMail($userAdd->getEmail(),$userAdd->getFirstname()." ".$userAdd->getLastname(),"Valider votre inscription sur Moving House","Voici votre code d'activation : ".$user_code->getCode()."");
            
            $connexion = new Connexion;
            $connexion->setIdUser($userAdd->getId());
            $connexion->setToken($newToken);   
            $connexion->save();
            
            $response = [
                'message' => "Demande de validation envoyé par mail"
            ];
            
      
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode($response);
        
            
        }
        

        public function verifyUser(){
            $formData = json_decode(file_get_contents('php://input'), true);
            $validator = new ValidatorApi();
            $user_code = new UserCode();
            $user_code = $user_code->populateWith(["id_user" => $_SESSION['zfgh_login']['id']]);
            $formData_validate = $validator->valideCodeData($formData["code"]);
            if (!empty($validationResult['error'])) {
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode($formData_validate);
                return;
            }
            if($formData["code"]==$user_code->getCode()){
                    $user = new User();
                    $user = $user->populate($user_code->getIdUser());
                    $user->setActif(true);
                    $user->save();
                    $user = $user->populate($user->getId());
                    $_SESSION['zfgh_login']['actif'] = $user->getActif();
            }else{
                $response = [
                    'error' => "code invalide"
                ];
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode($response);
                return;
            }

                $response = [
                    'message' =>  $_SESSION['zfgh_login']['actif']
                ];
                
          
                http_response_code(200);
                header('Content-Type: application/json');
                echo json_encode($response);
            
                
            }
            
       



        
    



    private function createCode(){

        return str_pad(mt_rand(100000, 999999), 6, '0', STR_PAD_LEFT);

    }
    
    

}
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
        $prefixe=$requestData['prefixe'] ?? '';


        
        $configFilePath = 'app.ini';
        try {
            $pdo = new \PDO("pgsql:host=$host;dbname=$dbname;port=$port", $user, $password);
        } catch (\PDOException $e) {
          
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
        $configContent .= "prefixe = $prefixe\n";
        

        // Écriture du contenu dans le fichier app.ini
        file_put_contents($configFilePath, $configContent);

        $statements = [
            "DROP VIEW  IF EXISTS public.".$prefixe."_v_agent;",
            "DROP VIEW  IF EXISTS public.".$prefixe."_v_annonce;",
            "DROP TABLE IF EXISTS public.".$prefixe."_connexion;",
            "DROP TABLE IF EXISTS public.".$prefixe."_advice;",
            "DROP TABLE IF EXISTS public.".$prefixe."_favori;",
            "DROP TABLE IF EXISTS public.".$prefixe."_photo;",
            "DROP TABLE IF EXISTS public.".$prefixe."_newsletter;",
            "DROP TABLE IF EXISTS public.".$prefixe."_pwd_forget;",
            "DROP TABLE IF EXISTS public.".$prefixe."_status;",
            "DROP TABLE IF EXISTS public.".$prefixe."_user_code;",
            "DROP TABLE IF EXISTS public.".$prefixe."_annonce_memento;",
            "DROP TABLE IF EXISTS public.".$prefixe."_annonce;",
            "DROP TABLE IF EXISTS public.".$prefixe."_type;",
            "DROP TABLE IF EXISTS public.".$prefixe."_user;",
            
            "create table public.".$prefixe."_user (
                id uuid not null default gen_random_uuid (),
                lastname character varying(120) not null,
                firstname character varying(60) not null,
                email character varying(250) not null,
                pwd character varying(255) not null,
                status integer not null default 1,
                country character varying(2) not null default 'FR'::character varying,
                date_inserted timestamp without time zone not null default now(),
                date_updated timestamp with time zone null default now(),
                actif boolean not null default false,
                constraint ".$prefixe."_user_pkey primary key (id),
                constraint ".$prefixe."_user_email_key unique (email)
              ) tablespace pg_default;",

              "create table public.".$prefixe."_type (
                id uuid not null default gen_random_uuid (),
                texte character varying(255) null,
                constraint ".$prefixe."_type_pkey primary key (id)
              ) tablespace pg_default;",

              "create table public.".$prefixe."_annonce (
                id uuid not null default gen_random_uuid (),
                id_type uuid not null,
                titre text not null,
                prix integer not null,
                superficiemaison integer not null,
                superficieterrain integer not null,
                nbrpiece integer not null,
                nbrchambre integer not null,
                ville text not null,
                rue text not null,
                departement text not null,
                regions text not null,
                description text not null,
                id_agent uuid null,
                constraint ".$prefixe."_annonce_pkey primary key (id),
                constraint fk_id_type_user foreign key (id_type) references ".$prefixe."_type (id) on delete cascade
              ) tablespace pg_default;",

              "create table public.".$prefixe."_annonce_memento (
                id uuid not null default gen_random_uuid (),
                date_memento timestamp without time zone not null default now(),
                id_annonce uuid not null,
                id_type uuid not null,
                titre text not null,
                prix integer not null,
                superficiemaison integer not null,
                superficieterrain integer not null,
                nbrpiece integer not null,
                nbrchambre integer not null,
                ville text not null,
                rue text not null,
                departement text not null,
                regions text not null,
                description text not null,
                id_agent uuid null,
                constraint ".$prefixe."_memento_pkey primary key (id),
                constraint fk_id_annonce_user foreign key (id_annonce) references ".$prefixe."_annonce (id) on delete cascade,
                constraint fk_id_type_user foreign key (id_type) references ".$prefixe."_type (id) on delete cascade
              ) tablespace pg_default;",

              "create table public.".$prefixe."_connexion (
                id uuid not null default gen_random_uuid (),
                id_user uuid not null,
                token text not null,
                last_seen timestamp with time zone not null default now(),
                constraint userconnexion_pkey primary key (id),
                constraint fk_id_user_user foreign key (id_user) references ".$prefixe."_user (id) on update cascade on delete cascade
              ) tablespace pg_default;",

              "create table public.".$prefixe."_favori (
                id uuid not null default gen_random_uuid (),
                id_user uuid not null,
                id_annonce uuid not null,
                constraint ".$prefixe."_favorie_pkey primary key (id),
                constraint ".$prefixe."_favori_id_annonce_fkey foreign key (id_annonce) references ".$prefixe."_annonce (id) on delete cascade,
                constraint ".$prefixe."_favori_id_user_fkey foreign key (id_user) references ".$prefixe."_user (id) on delete cascade
              ) tablespace pg_default;",

              "create table public.".$prefixe."_photo (
                id uuid not null default gen_random_uuid (),
                id_annonce uuid not null,
                link_photo character varying(255) not null,
                description text null,
                constraint ".$prefixe."_photo_pkey primary key (id),
                constraint fk_photo_annonce foreign key (id_annonce) references ".$prefixe."_annonce (id) on delete cascade
              ) tablespace pg_default;",

              "create table public.".$prefixe."_newsletter (
                id uuid not null default gen_random_uuid (),
                email character varying(250) not null,
                date_add_newsletter timestamp with time zone not null default now(),
                constraint ".$prefixe."_newsletter_pkey primary key (id),
                constraint ".$prefixe."_newsletter_email_key unique (email)
              ) tablespace pg_default;",

              "create table public.".$prefixe."_pwd_forget (
                id uuid not null default gen_random_uuid (),
                email character varying not null,
                token text not null,
                validity timestamp with time zone not null default (now() at time zone 'utc'::text),
                constraint ".$prefixe."_pwd_forget_pkey primary key (id),
                constraint fk_pwd_forget_user foreign key (email) references ".$prefixe."_user (email) on delete cascade
              ) tablespace pg_default;",

              "create table public.".$prefixe."_status (
                id uuid not null default gen_random_uuid (),
                id_status bigint generated by default as identity not null,
                status text not null,
                constraint ".$prefixe."_status_pkey primary key (id)
              ) tablespace pg_default;",

              "create table public.".$prefixe."_user_code (
                id uuid not null default gen_random_uuid (),
                id_user uuid not null,
                code bigint not null,
                creation_date timestamp with time zone not null default (now() at time zone 'utc'::text),
                constraint usercode_pkey primary key (id),
                constraint fk_id_user_user foreign key (id_user) references ".$prefixe."_user (id) on delete cascade
              ) tablespace pg_default;",

              "create table public.".$prefixe."_opinion (
                id uuid not null default gen_random_uuid (),
                note float not null,
                commentaire text null,
                id_agent uuid null,
                id_user uuid null,
                date_avis timestamp with time zone not null default (now() at time zone 'utc'::text),
                avis_agence boolean not null default false,
                is_valid boolean not null default false,
                constraint idavis_pkey primary key (id),
                constraint fk_id_agent_user foreign key (id_agent) references ".$prefixe."_user (id) on delete cascade,
                constraint fk_id_user_user foreign key (id_user) references ".$prefixe."_user (id)
              ) tablespace pg_default;
            ",

            "create view public.".$prefixe."_v_agent as
            select u.id, u.lastname, u.firstname, u.email, u.country, u.status, count(a.id_agent) as nbr_annonce
            from ".$prefixe."_user u  left join ".$prefixe."_annonce a on u.id = a.id_agent
            where u.status > 1
            group by u.id
            order by (count(a.id_agent)) desc;",

            "create view public.".$prefixe."_v_annonce as
            select a.id, a.titre, a.prix, a.superficiemaison, a.superficieterrain, a.nbrpiece, a.nbrchambre, a.ville, a.rue, a.departement, a.regions, a.description, t.texte
            from ".$prefixe."_annonce a, ".$prefixe."_type t
            where  a.id_type = t.id;"







            

        ];

        

        //mettre try catch et utilisation technique thibault
        foreach($statements as $statement){
            $pdo->exec($statement);
        }
        
        

        // Retourner une réponse JSON
        $response = [
            'message' => "salut",
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
            $_SESSION[''.$GLOBALS['prefixe'].'_login']['connected'] = true;
            $_SESSION[''.$GLOBALS['prefixe'].'_login']['email'] = $formData['email'];
            $_SESSION[''.$GLOBALS['prefixe'].'_login']['firstname'] = $userAdd->getFirstname();
            $_SESSION[''.$GLOBALS['prefixe'].'_login']['lastname'] = $userAdd->getLastname();
            $_SESSION[''.$GLOBALS['prefixe'].'_login']['id'] = $userAdd->getId();
            $_SESSION[''.$GLOBALS['prefixe'].'_login']['status'] = $userAdd->getStatus();
            $_SESSION[''.$GLOBALS['prefixe'].'_login']['actif'] = $userAdd->getActif();
            $_SESSION[''.$GLOBALS['prefixe'].'_login']['token'] = $newToken;
           
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
            $user_code = $user_code->populateWith(["id_user" => $_SESSION[''.$GLOBALS['prefixe'].'_login']['id']]);
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
                    $_SESSION[''.$GLOBALS['prefixe'].'_login']['actif'] = $user->getActif();
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
                    'message' =>  $_SESSION[''.$GLOBALS['prefixe'].'_login']['actif']
                ];
                
          
                http_response_code(200);
                header('Content-Type: application/json');
                echo json_encode($response);
            
                
            }
            
       



        
    



    private function createCode(){

        return str_pad(mt_rand(100000, 999999), 6, '0', STR_PAD_LEFT);

    }
    
    

}
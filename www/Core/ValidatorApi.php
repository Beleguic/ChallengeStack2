<?php

namespace App\Core;


class ValidatorAPI {



  public function valideCodeData($code){
    $validationResult=[];
    if(!is_int($code)){
       $validationResult['error'] = "Veuillez rentrer un nombre";
       return $validationResult;
    }
  }
    public function validateFormData($formData) {
      $validationResult = [];
  
      // Check if the emails are identical
      if ($formData['email'] !== $formData['confirmEmail']) {
        $validationResult['error'] = 'Email addresses do not match';
        return $validationResult;
      }
  
      // Check if the passwords are identical
      if ($formData['pwd'] !== $formData['confirmPwd']) {
        $validationResult['error'] = 'Passwords do not match';
        return $validationResult;
      }
  
      // Check if the email has the correct format
      if (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $validationResult['error'] = 'Invalid email format';
        return $validationResult;
      }
  
      // Check if the password has the correct format (minimum 8 characters, at least one uppercase letter, one lowercase letter, and one number)
      if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $formData['pwd'])) {
        $validationResult['error'] = 'Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number';
        return $validationResult;
        
      }
  
      // You can add more checks for other form fields if needed
  
      // If all validations pass, return an empty result
      return $validationResult;
    }

    public function sanitizeInput($input) {
        // Utilisez cette fonction pour échapper les caractères spéciaux de l'input utilisateur
        // Avant d'utiliser les données dans une requête SQL ou de les afficher sur une page HTML
        // Assurez-vous d'échapper correctement les données pour éviter les attaques par injection SQL et XSS
        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
      }
  }
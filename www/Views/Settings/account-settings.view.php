<?php
    $firstName = $this->data['userInfo']->getFirstname();
    $lastName = $this->data['userInfo']->getLastname();
    $email = $this->data['userInfo']->getEmail();
    $pwd = $this->data['userInfo']->getPwd();
    $country = $this->data['userInfo']->getCountry();
    $status = $this->data['userInfo']->getStatus();
    //$dateInserted = $this->data['userInfo']->getDateInserted();
    //$dateUpdated = $this->data['userInfo']->getDateUpdated();
?>

<div class="container">
  <h1 class="text-center py-4">Paramètres du compte</h1>

  <div class="row">
    <div class="col-md-6">
      <div class="card bg-light mb-4">
        <div class="card-body">
          <h5 class="card-title text-center pb-3 m-0">Connexion</h5>
          <p class="card-text">
            <strong>Numéro de téléphone</strong><br>
            <span id="phone" class="text-muted">0123456789</span>
          </p>
          <p class="card-text">
            <strong>Adresse e-mail</strong><br>
            <span id="email" class="text-muted"><?= $email ?></span>
          </p>
          <div class="text-center">
            <a class="btn btn-outline-primary w-100" href="/modify-connexion">
              Modifier
            </a>
          </div>
        </div>
      </div>

      <div class="card bg-light mb-4">
        <div class="card-body">
          <h5 class="card-title text-center pb-3 m-0">Mot de passe</h5>
          <p class="card-text">
          <strong>Mot de passe</strong><br>
            <span id="motDePasse" class="text-muted">********</span>
          </p>
          <div class="text-center">
            <a class="btn btn-outline-primary w-100" href="/modify-password">
              Changer le mot de passe
            </a>
          </div>  
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card bg-light mb-4">
        <div class="card-body">
          <h5 class="card-title text-center pb-3 m-0">Informations personnelles</h5>
          <p class="card-text">
            <strong>Nom</strong><br>
            <span id="lastName" class="text-muted"><?= $lastName ?></span>
          </p>
          <p class="card-text">
            <strong>Prénom</strong><br>
            <span id="firstName" class="text-muted"><?= $firstName ?></span>
          </p>
          <div class="text-center">
            <a class="btn btn-outline-primary w-100" href="/modify-info">
              Modifier
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

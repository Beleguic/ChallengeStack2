<?php
  $firstName = $this->data['agentInfo']->getFirstname();
  $email = $this->data['agentInfo']->getEmail();
  $lastName = $this->data['agentInfo']->getLastname();
  $photoLink = $this->data['agentInfo']->getPhotoLink();
  $description = $this->data['agentInfo']->getDescription();
  $telephone = $this->data['agentInfo']->getTelephone();
  $mobile = $this->data['agentInfo']->getMobile();
  $skype = $this->data['agentInfo']->getSkype();
  $facebook = $this->data['agentInfo']->getFacebook();
  $twitter = $this->data['agentInfo']->getTwitter();
  $instagram = $this->data['agentInfo']->getInstagram();
  $linkedin = $this->data['agentInfo']->getLinkedin();

?>

<div class="container">
    <h1 class="text-center pb-2">Bienvenue <?= $firstName ?>,</h1>
    <h2 class="text-center pb-4">Option de compte</h2>

    <div class="col">
        <div class="card bg-light mb-4">
            <div class="card-body">
                <h4 class="card-title text-center pt-2 pb-4 m-0">Vos informations</h4>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="card-body">
                                <h5 class="card-title text-center pb-4 m-0">Description</h5>
                                <p class="card-text text-center">
                                    <strong>Votre photo de profil</strong><br>
                                </p>
                                <div class="text-center">
                                    <img src="../../<?= $photoLink ?>" alt="Votre photo de profil" class="mb-3" style="max-width: 100px; max-height: 100px;">
                                </div>
                                <p class="card-text text-center">
                                    <strong>Votre description</strong><br>
                                    <span id="description" class="text-muted"><?= $description ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mt-3 mt-md-0">
                            <div class="card-body">
                                <h5 class="card-title text-center pb-4 m-0">Téléphone / Mobile</h5>
                                <p class="card-text text-center">
                                    <strong>Numéro de téléphone</strong><br>
                                    <span id="telephone" class="text-muted"><?= $telephone ?></span>
                                </p>
                                <p class="card-text text-center">
                                    <strong>Numéro de mobile</strong><br>
                                    <span id="mobile" class="text-muted"><?= $mobile ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mt-3 mt-md-0">
                            <div class="card-body">
                                <h5 class="card-title text-center pb-4 m-0">Réseaux Sociaux</h5>
                                <p class="card-text text-center">
                                    <strong>Skype</strong><br>
                                    <span id="skype" class="text-muted"><?= $skype ?></span>
                                </p>
                                <p class="card-text text-center">
                                    <strong>Facebook</strong><br>
                                    <span id="facebook" class="text-muted"><?= $facebook ?></span>
                                </p>
                                <p class="card-text text-center">
                                    <strong>Twitter</strong><br>
                                    <span id="twitter" class="text-muted"><?= $twitter ?></span>
                                </p>
                                <p class="card-text text-center">
                                    <strong>Instagram</strong><br>
                                    <span id="instagram" class="text-muted"><?= $instagram ?></span>
                                </p>
                                <p class="card-text text-center">
                                    <strong>Linkedin</strong><br>
                                    <span id="linkedin" class="text-muted"><?= $linkedin ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <a href="/back/agent-update" class="btn app-btn-primary">
                        Modifer les informations
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

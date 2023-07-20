<?php

// View : Formlaire de modification des informations en tant qu'agents

?>

<div class="container">
  <h2 class="mb-3">Navigation</h2>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-info-circle-fill"></i> Vos informations</h5>
          <p class="card-text">Cliquez pour accéder à vos informations</p>
          <a href="/back/agent-info" class="btn app-btn-primary btn-lg btn-icon"><i class="bi bi-info-circle"></i> Vos informations</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 mt-3 mt-md-0">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-house-door-fill"></i> Accueil</h5>
          <p class="card-text">Cliquez pour retourner à la page d'accueil</p>
          <a href="/back" class="btn app-btn-primary btn-lg btn-icon"><i class="bi bi-house-door"></i> Accueil</a>
        </div>
      </div>
    </div>
  </div>
	
  <div class="mt-5">
		<h2 class="mb-3">Modifier les informations</h2>
    <?php $this->partial("form", $this->data['form'],$this->data['agentInfo']) ?>
    </div>
</div>

<script src='../../asset/back-template/js/jquery.js'></script>
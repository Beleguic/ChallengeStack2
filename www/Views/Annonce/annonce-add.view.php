	<?php

	// View : Formlaire de l'ajout d'une annonce

	?>

<div class="container">
  <h2 class="mb-3">Navigation</h2>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-house-door-fill"></i> Accueil</h5>
          <p class="card-text">Cliquez pour retourner à la page d'accueil</p>
          <a href="/" class="btn app-btn-primary btn-lg btn-icon"><i class="bi bi-house-door"></i> Accueil</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 mt-3 mt-md-0">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-list-task"></i> Liste des Annonces</h5>
          <p class="card-text">Cliquez pour accéder à la liste des annonces</p>
          <a href="/back/annonce" class="btn app-btn-primary btn-lg btn-icon"><i class="bi bi-list-task"></i> Liste des Annonces</a>
        </div>
      </div>
    </div>
  </div>
	
  <div class="mt-5">
		<h2 class="mb-3">Ajouter une annonce</h2>
    <?php $this->partial("form", $this->data['formAdd']) ?>
  </div>
</div>



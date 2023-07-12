	<?php

	// View : Formlaire de la modification d'un type de bien

	?>

	<div class="container">
		<h2 class="mb-3">Navigation</h2>
		<div class="row">
			<div class="col-md-6 mt-3 mt-md-0">
			<div class="card">
				<div class="card-body">
				<h5 class="card-title"><i class="bi bi-list-task"></i> Liste des annonces</h5>
				<p class="card-text">Cliquez pour accéder à la liste des annonces</p>
				<a href="/back/annonce" class="btn app-btn-primary btn-lg btn-icon"><i class="bi bi-list-task"></i> Liste des annonces</a>
				</div>
			</div>
			</div>
			<div class="col-md-6">
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
			<h2 class="mb-3 text-center">Supprimer l'annonce</h2>
			<p class="text-center">Êtes-vous sûr de vouloir supprimer cette annonce ?</p>
			<?php $this->partial("form", $this->data['formDel'], $this->data['formDelDate']) ?>
		</div>
	</div>
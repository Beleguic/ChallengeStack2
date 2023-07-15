	<?php

	// View : Formlaire de l'ajout d'une annonce

	?>

	<h2>Statut</h2>

	<a href="/">Accueil</a>
	<a href="/back/status">Liste des status</a>

    <div>
    	<?php $this->partial("form", $this->data['formAdd']) ?>
    </div>

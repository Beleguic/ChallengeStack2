	<?php

	// View : Formlaire de l'ajout d'une annonce

	?>

	<h2>Annonce</h2>

	<a href="/">Accueil</a>
	<a href="/back/annonce">Liste des Annonces</a>

    <div>
    	<?php $this->partial("form", $this->data['formAdd']) ?>
    </div>

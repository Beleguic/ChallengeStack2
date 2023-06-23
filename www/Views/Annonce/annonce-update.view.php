	<?php

	// View : Formlaire de la modification d'un type de bien

	?>

	<h2>Annonce</h2>

	<a href="/">Accueil</a>
	<a href="/view-annonce">Liste des Annonces</a>

    <div>
    	<?php $this->partial("form", $formUpd, $formUpdDate) ?>
    </div>
	<?php

	// View : Formlaire de l'ajout d'un type de bien

	?>

	<h2>Type annonce</h2>

	<a href="/">Accueil</a>
	<a href="/back/type">Liste des Types</a>

    <div>
    	<?php $this->partial("form", $this->data['formAdd']) ?>
    </div>

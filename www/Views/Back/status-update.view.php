	<?php

	// View : Formlaire de la modification d'un type de bien

	?>

	<h2>Statut</h2>

	<a href="/">Accueil</a>
	<a href="/back/status">Liste des statut</a>

    <div>
    	<?php $this->partial("form", $this->data['formUpd'], $this->data['formUpdData']) ?>
    </div>
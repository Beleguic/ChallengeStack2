	<?php

	// View : Formlaire de la modification d'un type de bien

	?>

	<h2>User</h2>

	<a href="/">Accueil</a>
	<a href="/back/user">Liste des utilisateurs</a>

    <div>
    	<?php $this->partial("form", $this->data['formUpd'], $this->data['formUpdDate']) ?>
    </div>
<?php

	// View : Formlaire de la modification d'un type de bien

	?>

	<h2>User</h2>

	<a href="/">Accueil</a>
	<a href="/back/annonce">Liste des utilisateurs</a>

    <div>
    	<?php $this->partial("form", $this->data['formDel'], $this->data['formDelDate']) ?>
    </div>
<?php

	/*
	*
	* Genere un tableau avec les information du type d'annonce (texte) 
	*	A une input hidden avec l'id_hashq que l'on recupere avec les script JS
	*	Un bouton modifier qui va ouvrir une modal avec le formlaire pret remplie par une function JS
	*	Un bouton suppression qui va ouvrir une modal de confirmation de suppression
	*	
	*	
	*
	*
	*
	*/

	//<!--<input type="hidden" name="id_hash" value="<?= //$row->getId_Hash()">-->
	/*
	<?php $dataValue['id_hash'] = $row->getId_Hash(); ?>
				<td><?php $this->partial("form", $formUpd, $dataValue) ?></td>
				<td><button class="button-Update" value='<?=$row->getTexte()?>'> Modifier </button></td>
				<td><?php $this->partial("form", $formDel, $dataValue) ?></td>
	*/
?>

	<!--<dialog id='modal-update'>
		<h2> Modification </h2>
		<?php // $this->partial("form", $formUpd) ?>
		<button onclick="document.getElementById('modal-update').close();"> Annuler </button>
	</dialog>
	<dialog id='modal-delete'>
		<h2> Confirmer la suppression ? </h2>
		<?php // $this->partial("form", $formDel) ?>
		<button onclick="document.getElementById('modal-delete').close();"> Annuler </button>
	</dialog>-->

	<div class="container">
		<h2 class="mb-3">Navigation</h2>
		<div class="row">
			<div class="col-6">
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
			<h2 class="mb-3">Liste des utilisateurs</h2>
			<table id='tableType' >	
				<thead>
					<tr>	
						<th> Nom </th>
						<th> Prenom </th>
						<th> Adresse mail </th>
						<th> Status </th>
						<th> Actif </th>
						<th> Action </th>
				</thead>
				<tbody>	
			<?php while ($row = $this->data['userList']->fetch()): ?>
					<tr>
						<td><?=$row->getFirstName()?></td>
						<td><?=$row->getLastName()?></td>
						<td><?=$row->getEmail()?></td>
						<?php if($row->getStatus() == 3): ?>
							<td> Administrateur </td>
						<?php elseif($row->getStatus() == 2): ?>
							<td> Agent </td>
						<?php else: ?>
							<td> Utilisateur </td>
						<?php endif; ?>
						<?php if($row->getActif() == 1): ?>
							<td> Actif </td>
						<?php else: ?>
							<td> Non Actif </td>
						<?php endif; ?>
						<td>
							<a class="button-Update" href="/back/update-user?id=<?=$row->getId()?>">Modifier</a>
							<a class="button-Delete" href="/back/delete-user?id=<?=$row->getId()?>">Supprimer</a>
						</td>
					</tr>
			<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>

	<script src='../../asset/back-template/js/jquery.js'></script>
	<script src='../../asset/back-template/js/dataTable.min.js'></script>
	<link rel="stylesheet" type="text/css" href="../../asset/back-template/css/dataTable.min.css">

	<script>

		let table = new DataTable('#tableType');

    </script>


    <!--<div>
    	<?php //$this->partial("form", $formAdd) ?>
    </div>-->




<script>
	/*
	var buttonsUpd = document.querySelectorAll('.button-Update');
	var buttonsDel = document.querySelectorAll('.button-Delete');

	buttonsUpd.forEach(function(button) {
  		button.addEventListener("click", function() {
    		let id_hash = button.attributes.idhash.value;
    		let texte = button.attributes.texte.value;
    		let modal = document.getElementById('modal-update');
    		let id_hashInput = document.getElementById('id-hash-update');
    		let texteInput = document.getElementById('texte-update');
    		id_hashInput.value = id_hash;
    		texteInput.value = texte;

    		modal.showModal();
    	
	  });
	});

	buttonsDel.forEach(function(button) {
  		button.addEventListener("click", function() {
    		let id_hash = button.attributes.idhash.value;

    		let modal = document.getElementById('modal-delete');
    		let id_hashInput = document.getElementById('id-hash-delete');
    		id_hashInput.value = id_hash;

    		modal.showModal();
    	
	  });
	});
	*/
</script>
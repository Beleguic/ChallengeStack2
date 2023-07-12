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
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title"><i class="bi bi-plus-circle-fill"></i> Ajouter un type</h5>
						<p class="card-text">Cliquez pour ajouter un nouveau type de propriété</p>
						<a href="/back/add-type" class="btn app-btn-primary btn-lg btn-icon"><i class="bi bi-plus-circle"></i> Ajouter un type</a>
					</div>
				</div>
			</div>
			<div class="col-md-6 mt-3 mt-md-0">
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
			<h2 class="mb-3">Type annonce</h2>
				<table id='tableType' >	
					<thead>	
						<tr>	
							<td> Texte </td>
							<td> Action </td>
					</thead>
					<tbody>	
				<?php while ($row = $this->data['typeList']->fetch()): ?>
						<tr>
							<td><?=$row->getTexte()?></td>
							<td>
								<a class="button-Update" href="/back/update-type?id=<?=$row->getId()?>">Modifier</a>
								<a class="button-Delete" href="/back/delete-type?id=<?=$row->getId()?>">Supprimer</a>
							</td>
						</tr>
				<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
		<table id='tableType' >	
			<thead>	
				<tr>	
					<td> Texte </td>
					<td> Action </td>
			</thead>
			<tbody>	
		<?php while ($row = $this->data['typeList']->fetch()): ?>
				<tr>
					<td><?=$row->getTexte()?></td>
					<td>
						<a class="button-Update" href="/back/update-type?id=<?=$row->getId()?>">Modifier</a>
						<a class="button-Delete" href="/back/delete-type?id=<?=$row->getId()?>">Supprimer</a>
					</td>
				</tr>
		<?php endwhile; ?>
			</tbody>
		</table>
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
<h2>Type annonce</h2>

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
	<a href="/">Accueil</a>
	<a href="/add-type">Ajouter un Type de propriéter </a>
	<div style="width: 60%; margin: auto;">
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
						<a class="button-Update" href="/update-type?id_hash=<?=$row->getId_Hash()?>">Modifier</a>
						<a class="button-Delete" href="/delete-type?id_hash=<?=$row->getId_Hash()?>">Supprimer</a>
					</td>
				</tr>
		<?php endwhile; ?>
			</tbody>
		</table>
	</div>

	<script src='/asset/js/jquery.js'></script>
	<script src='/asset/js/dataTable.min.js'></script>
	<link rel="stylesheet" type="text/css" href="/asset/css/dataTable.min.css">

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
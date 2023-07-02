<h2>Restauration d'annonce</h2>

	<a href="/back/annonce">Liste des annonces</a>
	<div style="width: 100%; margin: auto; overflow-x: scroll;">
		<table id='tableType' >	
			<thead>
				<tr>	
					<th> Date de la sauvegarde </th>
					<th> Titre </th>
					<th> Prix </th>
					<th> Type </th>
					<th> Superficie Maison </th>
					<th> Superficie Terrain </th>
					<th> Nombre de pieces </th>
					<th> Nombre de chambre </th>
					<th> Ville </th>
					<th> Rue </th>
					<th> Departement </th>
					<th> Regions </th>
					<th> Description </th>
					<th> Action </th>
			</thead>
			<tbody>	
		<?php while ($row = $this->data['resMemento']->fetch()): ?>
				<tr>
					<td><?=$row->getDateMemento()?></td>
					<td><?=$row->getTitre()?></td>
					<td><?=$row->getPrix()?></td>
					<td><?=$row->getIdType()?></td>
					<td><?=$row->getSuperficiemaison()?></td>
					<td><?=$row->getSuperficieterrain()?></td>
					<td><?=$row->getNbrpiece()?></td>
					<td><?=$row->getNbrchambre()?></td>
					<td><?=$row->getVille()?></td>
					<td><?=$row->getRue()?></td>
					<td><?=$row->getDepartement()?></td>
					<td><?=$row->getRegions()?></td>
					<td><?=$row->getDescription()?></td>
					<td>
						<a class="button-Delete" href="/back/restore-annonce?idAnnonce=<?=$row->getId()?>">Restauration</a>
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
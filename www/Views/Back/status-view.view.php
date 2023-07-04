<h1> Liste des statut </h1>
<a href="/">Accueil</a>
<a href="/back/add-status">Ajouter un status</a>
	<div style="width: 90%; margin: auto;">
		<table id='tableType' >	
			<thead>
				<tr>	
					<th> id status </th>
					<th> Nom du status </th>
					<th> Action </th>
			</thead>
			<tbody>	
		<?php while ($row = $this->data['statusList']->fetch()): ?>
				<tr>
					<td><?=$row->getIdStatus()?></td>
					<td><?=$row->getStatus()?></td>
					<td>
						<a class="button-Update" href="/back/update-status?id=<?=$row->getId()?>">Modifier</a>
						<a class="button-Delete" href="/back/delete-status?id=<?=$row->getId()?>">Supprimer</a>
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
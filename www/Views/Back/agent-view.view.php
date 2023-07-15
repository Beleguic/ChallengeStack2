<h1> Liste des agents </h1>
<a href="/">Accueil</a>
	<div style="width: 90%; margin: auto;">
		<table id='tableType' >	
			<thead>
				<tr>	
					<th> Nom </th>
					<th> Prenom </th>
					<th> Email </th>
					<th> Pays </th>
					<th> Nombre d'annonce </th>
					<th> Statut </th>
			</thead>
			<tbody>	
		<?php while ($row = $this->data['agentList']->fetch()): ?>
				<tr>
					<td><?=$row->getLastname()?></td>
					<td><?=$row->getFirstname()?></td>
					<td><?=$row->getEmail()?></td>
					<td><?=$row->getCountry()?></td>
					<td><?=$row->getNbrAnnonce()?></td>
					<?php if($row->getStatus() == 3): ?>
						<td> Administrateur </td>
					<?php elseif($row->getStatus() == 2): ?>
						<td> Agent </td>
					<?php else: ?>
						<td> Utilisateur </td>
					<?php endif; ?>
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
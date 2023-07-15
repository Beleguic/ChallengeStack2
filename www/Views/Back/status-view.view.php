<script type="text/javascript">
		
	function alert(message) { 
	    console.info(message);
	} 

</script>

<div class="container">
	<h2 class="mb-3">Navigation</h2>
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title"><i class="bi bi-plus-circle-fill"></i> Ajouter un nouveau status</h5>
					<p class="card-text">Cliquez pour ajouter un nouveau status</p>
					<a href="/back/add-status" class="btn app-btn-primary btn-lg btn-icon"><i class="bi bi-plus-circle"></i> Ajouter un nouveau status</a>
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
		<h2 class="mb-3"> Liste des statut </h2>
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

	<script src='../../asset/back-template/js/jquery.js'></script>
	<script src='../../asset/back-template/js/dataTable.min.js'></script>
	<link rel="stylesheet" type="text/css" href="../../asset/back-template/css/dataTable.min.css">

	<script>

		let table = new DataTable('#tableType');



    </script>
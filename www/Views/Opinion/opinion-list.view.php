
<h2> Liste des opinion en cour de validation </h2>
<table id="tableOpinionNotValid">
	<thead>
		<tr>
			<th> Note </th>
			<th> Commentaire </th>
			<th> Agent / Agence </th>
			<th> Action </th>
		</tr>
	</thead>
	<tbody>
<?php while ($row = $this->data['opinionNotValid']->fetch()): ?>
	<tr>
		<td><?=$row->getNote()?></td>
		<td><?=$row->getCommentaire()?></td>
		<?php if($row->getAvisAgence()): ?>
			<td><?=$row->getIdAgent()?></td>
		<?php else: ?>
			<td> Agence </td>
		<?php endif; ?>
		<td>
			<a class="button-Update" href="/back/opinion-valid?id=<?=$row->getId()?>">Valider</a>
			<a class="button-Delete" href="/back/opinion-delete?id=<?=$row->getId()?>">Refuser</a>
		</td>

<?php endwhile; ?>
	</tbody>
</table>
<h2> Liste des opinion valider</h2>
<table id="tableOpinionValid">
	<thead>
		<tr>
			<th> Note </th>
			<th> Commentaire </th>
			<th> Agent / Agence </th>
			<th> Action </th>
		</tr>
	</thead>
	<tbody>
<?php while ($row = $this->data['opinionValid']->fetch()): ?>
	<tr>
		<td><?=$row->getNote()?></td>
		<td><?=$row->getCommentaire()?></td>
		<?php if($row->getAvisAgence()): ?>
			<td><?=$row->getIdAgent()?></td>
		<?php else: ?>
			<td> Agence </td>
		<?php endif; ?>
		<td>
			<a class="button-Delete" href="/back/opinion-delete?id=<?=$row->getId()?>">Supprimer l'opinion</a>
		</td>

<?php endwhile; ?>
	</tbody>
</table>

<script src='../../asset/back-template/js/jquery.js'></script>
<script src='../../asset/back-template/js/dataTable.min.js'></script>
<link rel="stylesheet" type="text/css" href="../../asset/back-template/css/dataTable.min.css">

<script>

	let tableNotValid = new DataTable('#tableOpinionNotValid');
	let tableValid = new DataTable('#tableOpinionValid');

</script>
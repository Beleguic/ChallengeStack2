
<a href="/add-opinion-agent?id_agent=5afad924-afcf-475f-b1be-1a32bc5277ab"> Ajouter une review agent</a>
<a href="/add-opinion-agence"> AJouter une review agence</a>
<?php while ($row = $this->data['opinionList']->fetch()): ?>
	<p> <?=$row->getNote() ?></p>
	<p> <?=$row->getCommentaire() ?></p>
	<p> <?=$row->getIdUser() ?></p>
	<p> <?=$row->getIdAgent() ?></p>
<?php endwhile; ?>
<?php 
	$titre = $this->data['annonceOne']->getTitre();
	$texte = $this->data['annonceOne']->getTexte();
	$prix = $this->data['annonceOne']->getPrix();
	$description = $this->data['annonceOne']->getDescription();
	$superficieMaison = $this->data['annonceOne']->getSuperficiemaison();
	$superficieTerrain = $this->data['annonceOne']->getSuperficieterrain();
	$nbPiece = $this->data['annonceOne']->getNbrpiece();
	$nbChambre = $this->data['annonceOne']->getNbrchambre();
	$ville = $this->data['annonceOne']->getVille();
	$rue = $this->data['annonceOne']->getRue();
	$departement = $this->data['annonceOne']->getdepartement();
	$region = $this->data['annonceOne']->getRegions();
?>
<div class="container">
  <h1 class="text-center py-4">Annonce détaillée : <?= $titre ?></h1>
  <div class="row">
    <div class="col-md-6">
      <img src="../../asset/img/appartement.jpg" class="img-fluid rounded" alt="Appartement">
    </div>
    <div class="col-md-6">
      <h2 class="fs-2 text-primary"><?= $texte ?></h2>
      <h4 class="">Prix : <?= $prix ?> €</h4>
      <p><?= $description ?></p>
      <ul>
        <li><strong>Surface total : </strong><?= $superficieMaison ?>m²</li>
        <li><strong>Surface du terrain : </strong><?= $superficieTerrain ?>m²</li>
        <li><strong>Pièce : </strong><?= $nbPiece ?></li>
        <li><strong>Chambre : </strong><?= $nbChambre ?></li>
      </ul>
      <a href="#" class="btn btn-primary text-light me-2">Nous contacter</a>
      <a href="#" class="btn btn-danger">Ajouter aux favoris</a>
    </div>
  </div>
  <div class="row">
    <div class="col">
		<h3>Localisation</h3>
		<p>
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi labore totam, numquam ullam accusantium
			cum odit rem saepe accusamus expedita itaque.
		</p>
		<hr>
		<p>Ville : <?= $ville ?></p>
		<p>Rue : <?= $rue ?></p>
		<p>Département : <?= $departement ?></p>
		<p>Région : <?= $region ?></p>
    </div>
  </div>
</div>
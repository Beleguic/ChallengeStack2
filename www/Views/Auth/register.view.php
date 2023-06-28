<h2>S'inscrire</h2>

<?php $this->partial("form", $this->data["form"]) ?>
<?php if(isset($this->data['formErrors'])): ?>
	<?php print_r($this->data['formErrors']) ?>
<?php endif; ?>

<a href="/login">Se connecter</a>
<a href="/">Accueil</a>

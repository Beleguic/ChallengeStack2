<h2 class="text-center title-form mb-4">Inscription</h2>

<?php $this->partial("form", $this->data["form"]) ?>

<div class="bg-warning">
	<p>Gestion des msg d'erreurs</p>
	<?php if(isset($this->data['formErrors'])): ?>
		<?php print_r($this->data['formErrors']) ?>
	<?php endif; ?>
</div>

<p class="text-center">Vous avez déjà un compte ? <a href="/login" class="color-b">Se connecter</a></p>

<div class="container">
  <h1 class="text-center py-4">Modifier le mot de passe</h1>

  <div class="mb-3">
    <a href="/account-settings"><-- Revenir en arrière</a>
  </div>
  <?php $this->partial("form", $this->data['form']) ?>
  <?php if(isset($this->data['formErrors'])): ?>
	  <?php print_r($this->data['formErrors']) ?>
  <?php endif; ?>
</div>

<div class="container">
  <h1 class="text-center py-4">Modifier le mot de passe</h1>

  <?php $this->partial("form", $this->data['form']) ?>
  <?php if(isset($this->data['formErrors'])): ?>
	  <?php print_r($this->data['formErrors']) ?>
  <?php endif; ?>

  <!-- <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card bg-light mb-4">
        <div class="card-body">
          <form action="/update-password" method="post">
            <div class="mb-3">
              <label for="currentPassword" class="form-label">Mot de passe actuel</label>
              <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
            </div>

            <div class="mb-3">
              <label for="newPassword" class="form-label">Nouveau mot de passe</label>
              <input type="password" class="form-control" id="newPassword" name="newPassword" required>
            </div>

            <div class="mb-3">
              <label for="confirmPassword" class="form-label">Confirmer le nouveau mot de passe</label>
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>

            <div class="text-center py-4">
              <button type="submit" class="btn btn-outline-primary btn-block w-75 mb-3">Enregistrer</button>
              <a href="/account-settings" class="btn btn-outline-secondary btn-block w-75 mt-3">Retour</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> -->
</div>

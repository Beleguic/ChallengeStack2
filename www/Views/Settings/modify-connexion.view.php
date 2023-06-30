<div class="container">
  <h1 class="text-center py-4">Modifier les données de connexion</h1>

  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card bg-light mb-4">
        <div class="card-body">
          <form action="/update-password" method="post">
            <div class="mb-3">
              <label for="newPhone" class="form-label">Nouveau numéro de téléphone</label>
              <input type="tel" class="form-control" id="newPhone" name="newPhone" required>
            </div>

            <div class="mb-3">
              <label for="newPhone" class="form-label">Nouveau adresse e-mail</label>
              <input type="email" class="form-control" id="newEmail" name="newEmail" required>
            </div>

            <div class="text-center py-4">
              <button type="submit" class="btn btn-outline-primary btn-block w-75 mb-3">Enregistrer</button>
              <a href="/account-settings" class="btn btn-outline-secondary btn-block w-75 mt-3">Retour</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

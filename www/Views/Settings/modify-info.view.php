<?php
    $firstName = $this->data['userInfo']->getFirstname();
    $lastName = $this->data['userInfo']->getLastname();
?>

<div class="container">
  <h1 class="text-center py-4">Modifier les informations personnelles</h1>

  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card bg-light mb-4">
        <div class="card-body">
          <form action="/update-password" method="post">
            <div class="mb-3">
              <label for="newLastName" class="form-label">Nouveau nom</label>
              <input type="text" class="form-control" id="newLastName" name="newLastName" value="<?= $lastName ?>" required>
            </div>

            <div class="mb-3">
              <label for="firstName" class="form-label">Nouveau prénom</label>
              <input type="text" class="form-control" id="newFirstName" name="newFirstName" value="<?= $firstName ?>" required>
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
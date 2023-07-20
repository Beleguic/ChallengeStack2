<div class="container">
  <section class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Connexion</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/">Accueil</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Connexion
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->

  <?php $this->partial("form", $this->data['form']) ?>

  <p class="text-center">Vous n'avez pas de compte ? <a href="/s-inscrire" class="text-center color-b">Créer un compte ! </a>
  / <a href="/reset-pwd-mail" class="text-center color-b"> Mot de passe oublié ?</a></p>


</div>
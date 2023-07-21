<div class="container">
  <section class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Inscription</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/">Accueil</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Inscription
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->

  <?php 
    if(isset($_SESSION['error']['message'])){

      echo("<script> showPopUpError('".$_SESSION['error']['message']."',".$_SESSION['error']['codeErorr']."); </script>");
    }
    ?>
  <?php 
  if(isset($_POST['firstname'])){
    $valueData = $_POST;
  }
  elseif(isset($_SESSION['error']['data']['firstname'])){
    $valueData = $_SESSION['error']['data'];
  }
  else{
    $valueData = [];
  }
  ?>
  <?php $this->partial("form", $this->data["form"], $valueData, $this->data['formErrors']) ?>
  <!--<?php $errors = $this->data['formErrors']; ?>-->
  

  <p class="text-center">Vous avez déjà un compte ? <a href="/login" class="color-b">Se connecter</a></p>
</div>

<?php
  unset($_SESSION['error']);
?>
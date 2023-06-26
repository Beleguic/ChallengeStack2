<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Moving House</title>
    <meta name="description" content="Moving House">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <link rel="icon" href="../asset/img/Logo.png">
</head>
<body>
  <div class="fluid-container">
  <nav class="navbar navbar-expand-lg navbar-dark bg-darker-blue">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="../asset/img/Logo.png" alt="Logo" width="75" height="75" class="d-inline-block align-top me-2">
      <span class="fs-4 mb-0">Moving House</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end text-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white fs-6" href="/">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white fs-6" href="/a-propos">À propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white fs-6" href="/contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white fs-6" href="/login">Mon compte</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  </div>

  <!-- BEGIN : Main Content -->
  <main class="container">
    <?php include $this->view;?>
  </main>
  <!-- END : Main Content -->

  <!-- BEGIN: Footer -->
  <footer>
  <div class="container-fluid py-5 bg-darker-blue">
    <section class="newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <h2 class="text-center text-light mb-4">Inscrivez-vous à notre newsletter</h2>
            <form class="row g-3">
              <div class="col-sm-8">
                <input type="email" class="form-control" placeholder="Votre adresse e-mail" required>
              </div>
              <div class="col-sm-4">
                <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  <!-- Script JS -->
  <script src="../asset/js/bootstrap.js"></script>
  <script src="../asset/js/jquery.js"></script>
  
  <!-- <script type="text/javascript">
    var nav = document.querySelector('nav');

    window.addEventListener('scroll', function () {
      if (window.pageYOffset > 100) {
        nav.classList.add('bg-dark', 'shadow');
      } else {
        nav.classList.remove('bg-dark', 'shadow');
      }
    });
  </script> -->
    <hr class="text-light my-5">

    <div class="text-center">
      <a href="#" class="text-decoration-none text-white" data-bs-toggle="modal" data-bs-target="#mentionsLegales">Mentions légales</a>
    </div>
    <p class="text-light text-center">&copy; 2023 Moving House | All Right Reserved</p>
  </div>
</footer>
<!-- END: Footer -->

 
</body>
</html>
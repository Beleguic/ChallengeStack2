<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Moving House</title>
    <meta name="description" content="Moving House">
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/css/main.css">
</head>
<body>
  <div class="fluid-container">
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-danger">
      <a class="navbar-brand" href="#">
          <img src="../asset/img/Logo.png" alt="Logo moving house" class="logo-img mx-5">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link fs-5" href="/">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5" href="/a-propos">À propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5" href="/contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5" href="/login">Mon compte</a>
          </li>
        </ul>
      </div>
    </nav> -->

        <!-- Navbar  -->
    <nav class="navbar navbar-expand-lg bg-darker-blue p-md-3">
      <div class="">
        <a class="navbar-brand" href="/"><img src="../asset/img/Logo.png" alt="Logo Moving House" class="logo-img"></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mx-auto"></div>
          <ul class="navbar-nav align-items-center">
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

  <footer>
    <p class="text-center">&copy Copyright 2023 - All Right Reserved </p>
  </footer>

    
</body>
</html>
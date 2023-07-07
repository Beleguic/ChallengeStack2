<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Moving House</title>
  <meta name="description" content="Moving House">
  <meta name="keywords" content="">

  <!-- Old template -->
  <!-- <link rel="stylesheet" href="../asset/css/style.css">
  <link rel="stylesheet" href="../asset/css/bootstrap.css">
  <link rel="shortcut icon" href="../../asset/images/logo.png"> -->

  <!-- ################ New template ################## -->

  <!-- Favicons -->
  <link rel="shortcut icon" href="../../asset/images/logo.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- CSS Files -->
  <link href="../../asset/front-template/animate.css/animate.min.css" rel="stylesheet">
  <link href="../../asset/front-template/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../asset/front-template/bootstrap-icons/bootstrap-icons.min.css" rel="stylesheet">
  <link href="../../asset/front-template/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main style CSS -->
  <link href="../../asset/front-template/style.css" rel="stylesheet">

  <!-- Jquery -->
  <script type="text/javascript" src="../../asset/js/jquery.js"></script>

</head>

<body>
  <!-- BEGIN: Header -->
  <!-- <div class="fluid-container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-darker-blue">
      <div class="container-fluid mx-5">
        <a class="navbar-brand d-flex align-items-center" href="/">
          <img src="../asset/images/logo.png" alt="Logo" width="75" height="75" class="d-inline-block align-top me-2">
          <span class="fs-4 mb-0">Moving House</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end text-center" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-white fs-6" href="/a-propos">À propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white fs-6" href="/contact">Contact</a>
            </li>
            <?php if(isset($_SESSION['zfgh_login']['connected']) && $_SESSION['zfgh_login']['connected'] == true): ?>
              <li class="nav-item">
                <a class="nav-link text-white fs-6" href="/account-settings">Parametre du compte</a>
              </li>
            <?php endif; ?>
            <?php if(isset($_SESSION['zfgh_login']['connected']) && $_SESSION['zfgh_login']['connected'] == true && ($_SESSION['zfgh_login']['status'] == 2 || $_SESSION['zfgh_login']['status'] == 3)): ?>
              <li class="nav-item">
                <a class="nav-link text-white fs-6" href="/back">Administration</a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <?php if(isset($_SESSION['zfgh_login']['connected']) && $_SESSION['zfgh_login']['connected'] == true): ?>
                <a class="nav-link text-white fs-6" href="/logout">Déconnexion</a>
              <?php else: ?>
                <a class="nav-link text-white fs-6" href="/login">Mon compte</a>
              <?php endif; ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </div> -->
  <!-- END: Header -->



  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="/"><span class="color-b">Moving</span>House</a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link active" href="/">Accueil</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="/about-us">A propos</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Proriétés</a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="#">Acheter</a>
              <a class="dropdown-item " href="#">Louer</a>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="/contact">Contact</a>
          </li>
          
        </ul>
      </div>

      <a href="<?php echo (isset($_SESSION['zfgh_login']['connected']) && $_SESSION['zfgh_login']['connected'] == true) ? '/account-settings' : '/login'; ?>" class="btn btn-b-n">
        <i class="bi bi-person-square"></i>
        <span class="space">Mon Compte</span>
      </a>

    </div>
  </nav><!-- End Header/Navbar -->

  <!-- BEGIN : Main Content -->
  <main class="container intro-single">
    {{content}}
  </main>
  <!-- END : Main Content -->


  <!-- BEGIN: Footer -->
  <!-- <footer>
    <div class="container-fluid pt-5 pb-3 bg-darker-blue">
      <section class="newsletter">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <h2 class="text-center text-light mb-4">Inscrivez-vous à notre newsletter</h2>
              {{newsletter}}
            </div>
          </div>
        </div>
      </section>
      <hr class="text-light my-4">
      <div class="text-center">
        <a href="#" class="text-decoration-none text-white" data-bs-toggle="modal" data-bs-target="#mentionsLegales">Mentions légales</a>
      </div>
      <p class="text-light text-center">Copyright &copy; 2023 Moving House | All Rights Reserved.</p>
    </div>
  </footer> -->
  <!-- END: Footer -->
  
  <!-- BEGIN: Modal: Legal mentions -->
  <!-- <div class="modal fade" id="mentionsLegales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title">Mentions Légales</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, hic suscipit dolore vel dolor minus quaerat, laudantium animi optio itaque nam rem eligendi temporibus eveniet beatae aliquam voluptatum voluptate reiciendis?
          </p>
          
          <h2 class="fs-4 text-center">Conditions d'utilisation</h2>     
          <p class="text-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus officia iste repellendus, ipsam inventore, expedita quaerat quae maxime facilis mollitia temporibus obcaecati iure, quo corrupti natus soluta exercitationem molestias rerum.<br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam delectus porro exercitationem recusandae autem similique dolore, quis nesciunt dolorem at beatae blanditiis itaque atque provident voluptatem a iste facere quibusdam.
          </p>
          
          <h2 class="fs-4 text-center">Liens hypertextes</h2>
          <p class="text-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, rerum veniam asperiores nobis repudiandae, perspiciatis reprehenderit, reiciendis distinctio placeat ducimus qui nostrum nisi excepturi consectetur itaque expedita natus nesciunt laudantium?<br>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse, odio. Necessitatibus facilis, expedita iusto dignissimos molestias nemo illo earum delectus? Dolores optio quibusdam corrupti ipsa perspiciatis minima doloribus eum aperiam!
          </p>  
                  
          <h2 class="fs-4 text-center">Services fournis</h2>
          <p class="text-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet officiis consequuntur quasi veniam animi hic tenetur qui velit eaque accusantium porro laboriosam commodi, quas, quis magni nulla sed ab minima?
          </p>    
          <h2 class="fs-4 text-center">Limitation contractuelles sur les données</h2>
              
          <p class="text-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet iste at recusandae repellat aliquam rerum non magnam incidunt quas architecto ipsam id maiores porro, veritatis neque autem quidem illo iure.<br>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit officia fugit officiis cumque, qui quod aliquid expedita modi molestiae quas. Sequi voluptatem assumenda totam explicabo corrupti dolores aut. Dignissimos, architecto?
          </p>

          <h2 class="fs-4 text-center">Propriété intellectuelle</h2>
          <p class="text-center"> 
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora dolor voluptatem, repudiandae veniam libero eum, mollitia tenetur fugiat modi omnis iste corporis perspiciatis labore ipsa natus illo, numquam pariatur dolorum.
          </p>

          <h2 class="fs-4 text-center">Litiges</h2>
          <p class="text-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi quaerat optio dolorum alias placeat odit et, eum eveniet quasi voluptatum, exercitationem explicabo impedit ipsum sapiente ratione obcaecati, numquam rerum consectetur?
          </p>

          <h2 class="fs-4 text-center">Données personnelles</h2>
          <p class="text-center">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus impedit a vel eveniet provident animi iusto, minus quae, beatae, asperiores delectus minima molestiae accusamus veniam totam consectetur nulla. Facere, repudiandae.
          </p>
          <h2 class="fs-4 text-center">Editeur du site</h2>
          <p class="text-center">
            M. [Nom]<br>
            Responsable éditorial : [Nom]<br>
            Email : [email]<br>
            Site Web : [site-web.fr]<br>
          </p>

          <h2 class="fs-4 text-center">Développement</h2>
          <p class="text-center">
            M. [Nom]<br>
            Site Web : [site-web.fr]<br>
          </p>
          
          <h2 class="fs-4 text-center">Hébergement</h2>
          <p class="text-center">
            Hébergeur : [Hebergeur]<br>
            Site Web : [site-web.fr]<br>
          </p>
        </div>
      </div>
    </div>
  </div> -->
  <!-- END: Modal: Legal mentions -->

    <!-- ======= Footer ======= -->
    <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Moving House</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                Enim minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis
                sed aute irure.
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Email :</span> contact@example.com
                </li>
                <li class="color-a">
                  <span class="color-text-a">Phone :</span> +54 356 945234
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">La société</h3>
            </div>
            <div class="w-body-a">
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Site Map</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Mention légales</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Agent Admin</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Careers</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Affiliate</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Privacy Policy</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Propriétés</h3>
            </div>
            <div class="w-body-a">
              <ul class="list-unstyled">
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Appartement</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Maison</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Parking</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Terrain</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Singapore</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Philippines</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="/">Accueil</a>
              </li>
              <li class="list-inline-item">
                <a href="/about-us">A propos</a>
              </li>
              <li class="list-inline-item">
                <a href="/contact">Contact</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-linkedin" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright 2023
              <span class="color-a">Moving House</span> | All Rights Reserved.
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <!-- Script JS -->
  <!-- <script src="../asset/js/bootstrap.js"></script>
  <script src="../asset/js/jquery.js"></script> -->


  <!-- Vendor JS Files -->
  <script src="../../asset/front-template/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../asset/front-template/swiper/swiper-bundle.min.js"></script>
  <script src="../../asset/front-template/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../asset/front-template/main.js"></script>

</body>
</html>
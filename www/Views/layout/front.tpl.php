<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Moving House</title>
  <meta name="description" content="Moving House">
  <meta name="keywords" content="Moving House">

  <!-- Favicons -->
  <link rel="shortcut icon" href="../../asset/front-template/images/logo.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- CSS Files -->
  <link href="../../asset/front-template/animate.css/animate.min.css" rel="stylesheet">
  <link href="../../asset/front-template/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../asset/front-template/bootstrap-icons/bootstrap-icons.min.css" rel="stylesheet">
  <link href="../../asset/front-template/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main style CSS -->
  <link href="../../asset/front-template/style.css" rel="stylesheet">

</head>

<body>
  <dialog id="errorContainer">

    <button id=""> Fermer </button>
  </dialog>
  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="text-brand" href="/"><span class="color-b">Moving</span>House</a>

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
              <a class="dropdown-item " href="/annonce-all">Voir les annonces</a>
              <a class="dropdown-item " href="/favoris">Favoris</a>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="/contact">Contact</a>
          </li>
          
        </ul>
      </div>

      <a href="<?php echo (isset($_SESSION[''.$GLOBALS['prefixe'].'_login']['connected']) && $_SESSION[''.$GLOBALS['prefixe'].'_login']['connected'] == true) ? '/account-settings' : '/login'; ?>" class="btn btn-b-n">
        <i class="bi bi-person-square"></i><span class="space d-none d-md-inline">Mon Compte</span>
      </a>
    </div>
  </nav><!-- End Header/Navbar -->

  <!-- ======= Main Content ======= -->
  <main class="<?php echo ($_SERVER['REQUEST_URI'] === '/' || empty($_SERVER['REQUEST_URI']) || $_SERVER['REQUEST_URI'] === '/?conn=true' || $_SERVER['REQUEST_URI'] === '/?logout=true') ? 'intro-single pt-0' : 'intro-single'; ?>">
    {{content}}
  </main><!-- End Main Content -->


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
                    <i class="bi bi-chevron-right"></i> <a href="/annonces-buy">Acheter</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="/favoris">Favoris</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Appartements</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Maisons</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Parkings</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Privacy Policy</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#" data-bs-toggle="modal" data-bs-target="#mentionsLegales">Mentions légales</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Newsletter</h3>
            </div>
            <div>
              <p>
                Inscrivez-vous à notre newsletter pour recevoir les dernières mises à jour et offres spéciales.
              </p>
            </div>
            <div>
              {{newsletter}}
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

    <!-- BEGIN: Modal: Legal mentions -->
    <div class="modal fade" id="mentionsLegales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div>
    <!-- END: Modal: Legal mentions -->

  </footer><!-- End  Footer -->

  <!-- Vendor JS Files -->
  <script src="../../asset/front-template/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../asset/front-template/swiper/swiper-bundle.min.js"></script>
  <script src="../../asset/front-template/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../asset/front-template/main.js"></script>

</body>
</html>
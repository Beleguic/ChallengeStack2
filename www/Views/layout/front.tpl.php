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
      <div class="container-fluid mx-lg-5">
        <a class="navbar-brand d-flex align-items-center" href="/">
          <img src="../asset/img/Logo.png" alt="Logo" width="75" height="75" class="d-inline-block align-top me-2">
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
            <li class="nav-item">
              <a class="nav-link text-white fs-6" href="/login">Mon compte</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- BEGIN : Main Content -->
  <main class="container py-5">
    {{content}}
  </main>
  <!-- END : Main Content -->

  <!-- BEGIN: Footer -->
  <footer>
    <div class="container-fluid pt-5 pb-3 bg-darker-blue">
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
                  <button type="submit" class="btn btn-outline-light btn-block mb-4 w-100">S'inscrire</button>
                </div>
              </form>
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
  </footer>
  <!-- END: Footer -->
  
  <!-- BEGIN: Modal -->
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
  <!-- END: Modal -->

  <!-- Script JS -->
  <script src="../asset/js/bootstrap.js"></script>
  <script src="../asset/js/jquery.js"></script>

</body>
</html>
<?php 

	$titre = $this->data['annonceOne']->getTitre();
	$texte = $this->data['annonceOne']->getTexte();
	$prix = $this->data['annonceOne']->getPrix();
	$description = $this->data['annonceOne']->getDescription();
	$superficieMaison = $this->data['annonceOne']->getSuperficiemaison();
	$superficieTerrain = $this->data['annonceOne']->getSuperficieterrain();
	$nbPiece = $this->data['annonceOne']->getNbrpiece();
	$nbChambre = $this->data['annonceOne']->getNbrchambre();
	$city = $this->data['annonceOne']->getCity();
	$adrcomplet = $this->data['annonceOne']->getAddressComplet();
	$postcode = $this->data['annonceOne']->getPostCode();
	$deplab = $this->data['annonceOne']->getDepLabel();
	$depnum = $this->data['annonceOne']->getDepNum();
	$region = $this->data['annonceOne']->getRegions();
  $agentFirstname = $this->data['annonceOne']->getFirstnameAgent();
  $agentLastname = $this->data['annonceOne']->getLastnameAgent();
  $agentEmail = $this->data['annonceOne']->getEmailAgent();

  // Agent
  $agentId = $this->data['agentAnnonce']->getId();
  $agentPhotoLink = $this->data['agentAnnonce']->getPhotoLink();
  $agentDescription = $this->data['agentAnnonce']->getDescription();
  $agentMobile = $this->data['agentAnnonce']->getMobile();
  $agentTelephone = $this->data['agentAnnonce']->getTelephone();
  $agentSkype = $this->data['agentAnnonce']->getSkype();
  $agentFacebook = $this->data['agentAnnonce']->getFacebook();
  $agentTwitter = $this->data['agentAnnonce']->getTwitter();
  $agentInstagram = $this->data['agentAnnonce']->getInstagram();
  $agentLinkedin = $this->data['agentAnnonce']->getLinkedin();

?>

    <!-- ======= Intro Single ======= -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-7">
            <div class="title-single-box">
              <h1 class="title-single"><?= $titre ?></h1>
              <span class="color-text-a"><?= $adrcomplet,", ", $city,", ", $postcode,", ", $deplab,", ", $region  ?></span>
            </div>
          </div>
          <div class="col-md-12 col-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/">Accueil</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="/annonce-all">Propriétés</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?= $titre ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div id="property-single-carousel" class="swiper">
              <div class="swiper-wrapper">
                <?php while($row = $this->data['imagesAnnonce']->fetch()): ?>
                  <div class="carousel-item-b swiper-slide">                
                    <img src="../../<?= $row->getLinkPhoto() ?>" alt="Image 2 Carroussel">
                  </div>
                <?php endwhile; ?>
              </div>
            </div>
            <div class="property-single-carousel-pagination carousel-pagination"></div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">

            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="bi bi-cash">€</span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c"><?= $prix ?></h5>
                    </div>
                  </div>
                </div>
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">Sommaire rapide</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <ul class="list">
                      <li class="d-flex justify-content-between">
                        <strong>Property ID :</strong>
                        <span>A VOIR</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Localisation :</strong>
                        <span><?= $city ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Type de propriétée :</strong>
                        <span><?= $texte ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Status :</strong>
                        <span>A VOIR</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Surperficie du bien :</strong>
                        <span><?= $superficieMaison ?>m<sup>2</sup>
                        </span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Surface du terrain :</strong>
                        <span><?= $superficieTerrain ?>m<sup>2</sup></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Nombre de pièces:</strong>
                        <span><?= $nbPiece ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Nombre de chambres :</strong>
                        <span><?= $nbChambre ?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Description de la propriété</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a">
                    <?= $description ?>
                  </p>
                </div>
                <div class="row section-t3">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Amenities</h3>
                    </div>
                  </div>
                </div>
                <div class="amenities-list color-text-a">
                  <ul class="list-a no-margin">
                    <li>Balcony</li>
                    <li>Outdoor Kitchen</li>
                    <li>Cable Tv</li>
                    <li>Deck</li>
                    <li>Tennis Courts</li>
                    <li>Internet</li>
                    <li>Parking</li>
                    <li>Sun Room</li>
                    <li>Concrete Flooring</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-10 offset-md-1">
            <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-map-tab" data-bs-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map" aria-selected="false">Ubication</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" id="pills-video-tab" data-bs-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="true">Video</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-plans-tab" data-bs-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans" aria-selected="false">Floor Plans</a>
              </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                <iframe src="https://player.vimeo.com/video/73221098" width="100%" height="460" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </div>
              <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
                <img src="assets/img/plan2.jpg" alt="" class="img-fluid">
              </div>
              <div class="tab-pane fade show active" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834" width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Contact Agent</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <img src="../../<?= $agentPhotoLink ?>" alt="Photo Agent" class="img-fluid">
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="property-agent">
                  <h4 class="title-agent"><?= $agentFirstname, ", ", $agentLastname ?></h4>
                  <p class="color-text-a">
                    <?= $agentDescription ?>
                  </p>
                  <ul class="list-unstyled">
                    <li class="d-flex justify-content-between">
                      <strong>Phone:</strong>
                      <span class="color-text-a"><?= $agentTelephone ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Mobile:</strong>
                      <span class="color-text-a"><?= $agentMobile ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Email:</strong>
                      <span class="color-text-a"><?= $agentEmail ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Skype:</strong>
                      <span class="color-text-a"><?= $agentSkype ?></span>
                    </li>
                  </ul>
                  <div class="socials-a">
                    <ul class="list-inline">
                      <?php if( $agentFacebook != null ): ?>
                          <li class="list-inline-item">
                              <a href="<?= $agentFacebook ?>" class="link-one" target="_blank">
                                  <i class="bi bi-facebook" aria-hidden="true"></i>
                              </a>
                          </li>
                      <?php endif; ?>
                      <?php if( $agentTwitter != null ): ?>
                          <li class="list-inline-item">
                              <a href="<?= $agentTwitter ?>" class="link-one" target="_blank">
                                  <i class="bi bi-twitter" aria-hidden="true"></i>
                              </a>
                          </li>
                      <?php endif; ?>
                      <?php if( $agentInstagram != null ): ?>
                          <li class="list-inline-item">
                              <a href="<?= $agentInstagram ?>" class="link-one" target="_blank">
                                  <i class="bi bi-instagram" aria-hidden="true"></i>
                              </a>
                          </li>
                      <?php endif; ?>
                      <?php if( $agentLinkedin != null ): ?>
                          <li class="list-inline-item">
                              <a href="<?= $agentLinkedin ?>" class="link-one" target="_blank">
                                  <i class="bi bi-linkedin" aria-hidden="true"></i>
                              </a>
                          </li>
                      <?php endif; ?>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <div class="property-contact">
                  <form class="form-a">
                    <div class="row">
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-a">Send Message</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Property Single-->

  </main><!-- End #main -->

  
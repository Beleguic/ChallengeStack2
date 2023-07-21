<section class="pb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">A Propos De Moving House</h1>
              <span class="color-text-a">Découvrez Moving House, votre partenaire de confiance pour une transition sans stress vers votre nouvelle maison. Profitez d'un service complet de déménagement, de l'emballage au transport, pour une expérience simple et agréable.</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/">Accueil</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  A propos
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= About Section ======= -->
    <section class="section-about">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 position-relative">
            <div class="about-img-box">
              <img src="../../asset/front-template/img/background-3.jpg" alt="" class="img-fluid">
            </div>
            <div class="sinse-box">
              <h3 class="sinse-title">Moving House
                <span></span>
                <br> Depuis 2023
              </h3>
              <p>Suivi & accompagnement</p>
            </div>
          </div>
          <div class="col-md-12 section-t8 position-relative">
            <div class="row">
              <div class="col-md-6 col-lg-5">
                <img src="../../asset/front-template/img/background-1.jpg" alt="" class="img-fluid">
              </div>
              <div class="col-lg-2  d-none d-lg-block position-relative">
                <div class="title-vertical d-flex justify-content-start">
                  <span>Moving House Exclusive Property</span>
                </div>
              </div>
              <div class="col-md-6 col-lg-5 section-md-t3">
                <div class="title-box-d">
                  <h3 class="title-d">Sed
                    <span class="color-d">porttitor</span> lectus
                    <br> nibh.
                  </h3>
                </div>
                <p class="color-text-a">
                  Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget
                  consectetur sed, convallis
                  at tellus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum
                  ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit
                  neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                </p>
                <p class="color-text-a">
                  Sed porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
                  Mauris blandit aliquet
                  elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed,
                  convallis at tellus.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

        <!-- =======Team Section ======= -->
        <section class="section-agents section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Découvrer notre équipe</h2>
              </div>
              <div class="title-link">
                <a href="/all-agents">Tous les agents
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <?php for ($i = 0; $i < 3; $i++): ?>
            <?php if ($row = $this->data['teamAgents']->fetch()): ?>
              <div class="col-md-4">
              <div class="card-box-d">
                <div class="card-img-d">
                  <img src="../../<?= ($row->getPhotoLink() != " ") ? $row->getPhotoLink() : 'asset/data/agent/default.png' ?>" alt="Photo Agent <?= $row->getId() ?>" class="img-d img-fluid w-100" style="max-width:416px ; max-height: 466px;">
                </div>
                <div class="card-overlay card-overlay-hover">
                  <div class="card-header-d">
                    <div class="card-title-d align-self-center">
                      <h3 class="title-d">
                        <a href="/all-agents/<?= $row->getId() ?>" class="link-two"><?= $row->getFirstname() ?>
                          <br><?= $row->getLastname() ?></a>
                      </h3>
                    </div>
                  </div>
                  <div class="card-body-d">
                    <p class="content-d color-text-a">
                      <?= $row->getDescription() ?>
                    </p>
                    <div class="info-agents color-a">
                      <p>
                        <strong>Phone: </strong> <?= $row->getTelephone() ?>
                      </p>
                      <p>
                        <strong>Email: </strong> <?= $row->getEmail() ?>
                      </p>
                    </div>
                  </div>
                  <div class="card-footer-d">
                    <div class="socials-footer d-flex justify-content-center">
                      <ul class="list-inline">
                        <?php if( $row->getFacebook() != null ): ?>
                          <li class="list-inline-item">
                            <a href="<?= $row->getFacebook() ?>" class="link-one">
                              <i class="bi bi-facebook" aria-hidden="true"></i>
                            </a>
                          </li>
                        <?php endif; ?>
                        <?php if( $row->getTwitter() != null ): ?>
                        <li class="list-inline-item">
                          <a href="<?= $row->getTwitter() ?>" class="link-one">
                            <i class="bi bi-twitter" aria-hidden="true"></i>
                          </a>
                        </li>
                        <?php endif; ?>
                        <?php if( $row->getInstagram() != null ): ?>
                        <li class="list-inline-item">
                          <a href="<?= $row->getInstagram() ?>" class="link-one">
                            <i class="bi bi-instagram" aria-hidden="true"></i>
                          </a>
                        </li>
                        <?php endif; ?>
                        <?php if( $row->getLinkedin() != null ): ?>
                        <li class="list-inline-item">
                          <a href="<?= $row->getLinkedin() ?>" class="link-one">
                            <i class="bi bi-linkedin" aria-hidden="true"></i>
                          </a>
                        </li>
                        <?php endif; ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
          <?php endfor; ?>
        </div>
      </div>
    </section><!-- End About Section-->
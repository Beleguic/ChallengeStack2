<!-- ======= Intro Section ======= -->
<div class="intro intro-carousel swiper position-relative">
  <div class="swiper-wrapper">
  <?php while ($row = $this->data['carrousselAnnonce']->fetch()): ?>
    <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(../../asset/front-template/img/slide-1.jpg)">
      <div class="overlay overlay-a"></div>
      <div class="intro-content display-table">
        <div class="table-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="intro-body">
                  <p class="intro-title-top">Mooving House
                  </p>
                  <h1 class="intro-title mb-4 ">
                    <span><?= $row->getTitre()?></span>
                  </h1>
                  <p class="intro-subtitle intro-price">
                    <a href="#"><span class="price-a">Louer |<?= $row->getPrix()?>€</span></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; ?>   
  </div>
  <div class="swiper-pagination"></div>
</div><!-- End Intro Section -->

<!-- ======= Services Section ======= -->
<section class="section-services section-t8">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">Our Services</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card-box-c foo">
          <div class="card-header-c d-flex">
            <div class="card-box-ico">
              <span class="bi bi-cart"></span>
            </div>
            <div class="card-title-c align-self-center">
              <h2 class="title-c">Lifestyle</h2>
            </div>
          </div>
          <div class="card-body-c">
            <p class="content-c">
              Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
              convallis a pellentesque
              nec, egestas non nisi.
            </p>
          </div>
          <div class="card-footer-c">
            <a href="#" class="link-c link-icon">Read more
              <span class="bi bi-chevron-right"></span>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box-c foo">
          <div class="card-header-c d-flex">
            <div class="card-box-ico">
              <span class="bi bi-calendar4-week"></span>
            </div>
            <div class="card-title-c align-self-center">
              <h2 class="title-c">Loans</h2>
            </div>
          </div>
          <div class="card-body-c">
            <p class="content-c">
              Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Mauris blandit
              aliquet elit, eget tincidunt
              nibh pulvinar a.
            </p>
          </div>
          <div class="card-footer-c">
            <a href="#" class="link-c link-icon">Read more
              <span class="bi bi-calendar4-week"></span>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box-c foo">
          <div class="card-header-c d-flex">
            <div class="card-box-ico">
              <span class="bi bi-card-checklist"></span>
            </div>
            <div class="card-title-c align-self-center">
              <h2 class="title-c">Sell</h2>
            </div>
          </div>
          <div class="card-body-c">
            <p class="content-c">
              Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
              convallis a pellentesque
              nec, egestas non nisi.
            </p>
          </div>
          <div class="card-footer-c">
            <a href="#" class="link-c link-icon">Read more
              <span class="bi bi-chevron-right"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Services Section -->


<!-- ======= Latest Properties Section ======= -->
<!-- End Latest Properties Section -->

<!-- ======= Agents Section ======= -->
<section class="section-agents section-t8">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">Best Agents</h2>
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
        <?php if ($row = $this->data['bestAgents']->fetch()): ?>
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
</section><!-- End Agents Section -->
<!-- ======= Intro Single ======= -->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
            <h1 class="title-single">Nos Incroyables Propriétés</h1>
            <span class="color-text-a">A Acheter Uniquement</span>
        </div>
        </div>
        <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Accueil</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Propriété à acheter
            </li>
            </ol>
        </nav>
        </div>
    </div>
</div><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid mt-5">
      <div class="container">
        <div class="row">
			<?php while ($row = $this->data['annoncelist']->fetch()): ?>
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="../../asset/front-template/img/property-1.jpg" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#">
                        <br /> <?= $row->getTitre()?>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span></span> <?=$row->getPrix()?> 
                      </span>
                    </div>
                    <a href="/annonce/<?=$row->getId()?>" class="link-a">Click here to view
                      <span class="bi bi-chevron-right"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span><?=$row->getSuperficieterrain()?>
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Pièces</h4>
                        <span><?=$row->getNbrpiece()?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Chambre</h4>
                        <span><?=$row->getNbrchambre()?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Supérficie Maison</h4>
                        <span><?=$row->getSuperficiemaison()?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php endwhile; ?>

        </div>
        <div class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <span class="bi bi-chevron-left"></span>
                  </a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item next">
                  <a class="page-link" href="#">
                    <span class="bi bi-chevron-right"></span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Property Grid Single-->
<!-- ======= Intro Single ======= -->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
            <h1 class="title-single">Nos Incroyables Propriétés</h1>
            <span class="color-text-a">Explorez notre collection exclusive de propriétés uniques et exceptionnelles. Découvrez des espaces de vie extraordinaires qui reflètent le luxe, le confort et l'élégance, conçus pour répondre à tous vos besoins et désirs</span>
        </div>
        </div>
        <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Accueil</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Toutes Les Propriétés
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
                <img src="../../asset/front-template/img/property-1.jpg" alt="" class="img-a img-fluid" style="max-width: 416px; max-height: 555px;">
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
                      <span class="price-a">Louer | <?=$row->getPrix()?>€</span> 
                    </div>
                    <a href="/annonce/<?=$row->getId()?>" class="link-a">Cliquer ici pour voir l'annonce
                      <span class="bi bi-chevron-right"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                    <li>
                        <h4 class="card-info-title">Surperficie</h4>
                        <span><?=$row->getSuperficiemaison()?>m<sup>2</sup></span>
                      </li>  
                      <li>
                        <h4 class="card-info-title">Surface terrain</h4>
                        <span><?=$row->getSuperficieterrain()?>m<sup>2</sup></span>
                      </li>

                      <li>
                        <h4 class="card-info-title">Pièces</h4>
                        <span><?=$row->getNbrpiece()?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Chambres</h4>
                        <span><?=$row->getNbrchambre()?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php endwhile; ?>
    </div>
  </div>
</section><!-- End Property Grid Single-->
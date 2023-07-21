<!-- =======Intro Single ======= -->
<section class="container pb-5">
    <div class="row">
        <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
            <h1 class="title-single">Nos Super Agents</h1>
            <span class="color-text-a">Grid Properties</span>
        </div>
        </div>
        <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Accueil</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Tous Les Agents
            </li>
            </ol>
        </nav>
        </div>
    </div>
    </div>
</section><!-- End Intro Single-->

<!-- ======= All Agents ======= -->
<section class="agents-grid grid">
  <div class="container">
    <div class="row">
      <?php while($row=$this->data['allAgents']->fetch()):?>
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

      <?php endwhile; ?>
    
      
        
    </div>
    </div>
</section><!-- End All Agents-->
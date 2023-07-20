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
            <img src="../../asset/front-template/img/agent-7.jpg" alt="" class="img-d img-fluid">
          </div>
          <div class="card-overlay card-overlay-hover">
            <div class="card-header-d">
              <div class="card-title-d align-self-center">
                <h3 class="title-d">
                  <a href="/all-agents/<?=$row->getId()?>" class="link-two"><?=$row->getFirstname()?>
                    <br> Escala</a>
                </h3>
              </div>
            </div>
            <div class="card-body-d">
              <p class="content-d color-text-a">
                Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
              </p>
              <div class="info-agents color-a">
                <p>
                  <strong>Phone: </strong> +54 356 945234
                </p>
                <p>
                  <strong>Email: </strong> agents@example.com
                </p>
              </div>
            </div>
            <div class="card-footer-d">
              <div class="socials-footer d-flex justify-content-center">
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="bi bi-facebook" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="bi bi-twitter" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="bi bi-instagram" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="bi bi-linkedin" aria-hidden="true"></i>
                    </a>
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
</section><!-- End All Agents-->
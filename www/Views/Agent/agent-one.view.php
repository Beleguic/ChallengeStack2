<?php 

	$firstname = $this->data['agentOne']->getFirstname();
	$lastname = $this->data['agentOne']->getLastname();
	$photolink = $this->data['agentOne']->getPhotoLink();
	$description = $this->data['agentOne']->getDescription();
	$mobile = $this->data['agentOne']->getMobile();
	$telephone = $this->data['agentOne']->getTelephone();
	$email = $this->data['agentOne']->getEmail();
	$skype = $this->data['agentOne']->getSkype();
	$facebook = $this->data['agentOne']->getFacebook();
	$twitter = $this->data['agentOne']->getTwitter();
	$instagram = $this->data['agentOne']->getInstagram();
	$linkedin = $this->data['agentOne']->getLinkedin();

?>


<!-- ======= Intro Single ======= -->
<section class="pb-5">
    <div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-7">
        <div class="title-single-box">
            <h1 class="title-single"><?= $firstname,' ', $lastname; ?></h1>
            <span class="color-text-a">Agent Immobilier</span>
        </div>
        </div>
        <div class="col-md-12 col-lg-5">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Accueil</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/all-agents">Tous Les Agents</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <?= $firstname,' ', $lastname; ?>
            </li>
            </ol>
        </nav>
        </div>
    </div>
    </div>
</section><!-- End Intro Single -->

<!-- ======= Agent Single ======= -->
<section class="agent-single">
    <div class="container">
    <div class="row">
        <div class="col-sm-12">
        <div class="row">
            <div class="col-md-6">
            <div class="agent-avatar-box">
                <img src="../../<?= ($photolink != " ") ? $photolink : "asset/data/agent/default.png" ?>" alt="" class="agent-avatar img-fluid w-100">
            </div>
            </div>
            <div class="col-md-5 section-md-t3">
            <div class="agent-info-box">
                <div class="agent-title">
                <div class="title-box-d">
                    <h3 class="title-d"><?= $firstname ?>
                    <br> <?= $lastname; ?>
                    </h3>
                </div>
                </div>
                <div class="agent-content mb-3">
                <p class="content-d color-text-a">
                    <?= $description ?>
                </p>
                <div class="info-agents color-a">
                    <p>
                        <strong>Phone: </strong>
                        <span class="color-text-a"><?= $telephone ?></span>
                    </p>
                    <p>
                        <strong>Mobile: </strong>
                        <span class="color-text-a"><?= $mobile ?></span>
                    </p>
                    <p>
                        <strong>Email: </strong>
                        <span class="color-text-a"><?= $email ?></span>
                    </p>
                    <p>
                        <strong>Skype: </strong>
                        <span class="color-text-a"><?= $skype ?></span>
                    </p>
                </div>
                </div>
                <div class="socials-footer">
                <ul class="list-inline">
                    <?php if( $facebook != null ): ?>
                        <li class="list-inline-item">
                            <a href="<?= $facebook ?>" class="link-one" target="_blank">
                                <i class="bi bi-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if( $twitter != null ): ?>
                        <li class="list-inline-item">
                            <a href="<?= $twitter ?>" class="link-one" target="_blank">
                                <i class="bi bi-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if( $instagram != null ): ?>
                        <li class="list-inline-item">
                            <a href="<?= $instagram ?>" class="link-one" target="_blank">
                                <i class="bi bi-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if( $linkedin != null ): ?>
                        <li class="list-inline-item">
                            <a href="<?= $linkedin ?>" class="link-one" target="_blank">
                                <i class="bi bi-linkedin" aria-hidden="true"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                </div>
                <div class="add-avis">
                    <?php $this->partial("form", $this->data['formOpinion'], ['id_agent' => $this->data['id_agent']],$this->data['formErrors']) ?>
                </div>
                <div class="avis">
                    <?php while($row=$this->data['avisCommentaire']->fetch()): ?>
                    <div style="border-radius: 15px; padding: 5px; background-color: lightgray; margin: 20px;">
                        <p> Commentaire : <?= $row->getCommentaire() ?></p>
                        <p> Note : <?= $row->getNote() ?></p>
                    
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section><!-- End Agent Single -->
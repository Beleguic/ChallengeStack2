	<?php

	// View : Formlaire de la modification d'un type de bien

	?>

	<h2>Activation du compte</h2>

	<a href="/">Accueil</a>

    <div>
    	<?php $this->partial("form", $this->data['formActivation'], $this->data['formActivationData']) ?>
    	<p> Vous n'avez pas reçu de mail ?<a href="/activation?email=resend"> Renvoyer le mail ? </a></p>
    </div>
    <?php if(isset($_GET['e']) && $_GET['e'] == 1): ?>
    	<p> Code Invalide, Veuillez réeesayer </p>		
    <?php endif; ?>
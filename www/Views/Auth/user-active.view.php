	<?php

	// View : Formlaire de la modification d'un type de bien

	?>

	<h2 class="text-center mb-4">Activation du compte</h2>

    <div>
    	<?php $this->partial("form", $this->data['formActivation'], $this->data['formActivationData']) ?>
    	<p class="text-center"> Vous n'avez pas reçu de mail ?<a href="/activation?email=resend" class="color-b"> Renvoyer le mail ? </a></p>
    </div>
    <?php if(isset($_GET['e']) && $_GET['e'] == 1): ?>
    	<p> Code Invalide, Veuillez réeesayer </p>		
    <?php endif; ?>
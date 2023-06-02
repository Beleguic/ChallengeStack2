<h2>Welcome to Home Page</h2>



<?php
	//var_dump($this->data);
	// Pour recupere la data passer par 'view->assign' -> '$this->data'

	if(isset($_SESSION['zfgh_login']['connected']) && $_SESSION['zfgh_login']['connected']):
		echo("<pre>");
		var_dump($_SESSION['zfgh_login']);
		echo("</pre>");
		?>
		<a href="/logout">Deconnexion</a>
		<?php
	
	else:?>

		<a href="/login">Se connecter</a>
		<a href="/s-inscrire">Inscription</a>


	<?php
	endif;

?>
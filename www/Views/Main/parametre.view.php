<?php
	$firstName = $this->data['userInfo']->getFirstname();
	$lastName = $this->data['userInfo']->getLastname();
	$email = $this->data['userInfo']->getEmail();
	$pwd = $this->data['userInfo']->getPwd();
	$country = $this->data['userInfo']->getCountry();
	$status = $this->data['userInfo']->getStatus();
	//$dateInserted = $this->data['userInfo']->getDateInserted();
	//$dateUpdated = $this->data['userInfo']->getDateUpdated();
?>

<h1>Vue parametre de compte</h1>
<p>Info user : <?= $firstName ?> <p>
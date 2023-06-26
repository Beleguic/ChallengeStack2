<?php



var_dump($params);
echo("<pre>");
var_dump($this);
echo("</pre>");




?>
<h2>Bienvenue dans le home </h2>
<?php $this->partial("form", $formAdd) ?>
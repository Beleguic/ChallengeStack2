<?php if(isset($this->data['id_agent'])): ?>
	<?php $this->partial("form", $this->data['formOpinion'], ['id_agent' => $this->data['id_agent']]) ?>
<?php else: ?>
	<?php $this->partial("form", $this->data['formOpinion']) ?>
<?php endif; ?>
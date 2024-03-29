<h2>Photo de l'Annonce (<?=($this->data['idAnnonce']['idAnnonce']) ?>)</h2>

<a href="/">Accueil</a>
<a href="/back/annonce">Liste des Annonces</a>

<?php while ($row = $this->data['imageList']->fetch()): ?>
	<img width="150" src="/<?=$row->getLinkPhoto() ?>">
	<?php var_dump($row->getId()); ?>
	<?php $this->partial("form", $this->data['formDelPhoto'], ['id' => $row->getId()]) ?>
	<?php $this->partial("form", $this->data['photoFromDescription'], ['id' => $row->getId(),'description' => $row->getDescription()]) ?>
<?php endwhile; ?>	


<div>
	<?php $this->partial("form", $this->data['formAddPhoto'], $this->data['idAnnonce']) ?>
</div>

<style type="text/css">
	html {
	  font-family: sans-serif;
	}

	form {
	  width: 600px;
	  background: #ccc;
	  margin: 0 auto;
	  padding: 20px;
	  border: 1px solid black;
	}

	form ol {
	  padding-left: 0;
	}

	form li, div > p {
	  background: #eee;
	  display: flex;
	  justify-content: space-between;
	  margin-bottom: 10px;
	  list-style-type: none;
	  border: 1px solid black;
	}

	form img {
	  height: 64px;
	  order: 1;
	}

	form p {
	  line-height: 32px;
	  padding-left: 10px;
	}

	form label, form button {
	  background-color: #7F9CCB;
	  padding: 5px 10px;
	  border-radius: 5px;
	  border: 1px ridge black;
	  font-size: 0.8rem;
	  height: auto;
	}

	form label:hover, form button:hover {
	  background-color: #2D5BA3;
	  color: white;
	}

	form label:active, form button:active {
	  background-color: #0D3F8F;
	  color: white;
	}

</style>

<script type="text/javascript">
	
	var input = document.querySelector('input');
	var preview = document.querySelector('.preview');

	input.style.opacity = 0;

	input.addEventListener('change', updateImageDisplay);

	function updateImageDisplay() {
	  while(preview.firstChild) {
	    preview.removeChild(preview.firstChild);
	  }

	  var curFiles = input.files;
	  if(curFiles.length === 0) {
	    var para = document.createElement('p');
	    para.textContent = 'No files currently selected for upload';
	    preview.appendChild(para);
	  } else {
	    var list = document.createElement('ol');
	    preview.appendChild(list);
	    for(var i = 0; i < curFiles.length; i++) {
	      var listItem = document.createElement('li');
	      var para = document.createElement('p');
	      if(validFileType(curFiles[i])) {
	        para.textContent = 'File name ' + curFiles[i].name + ', file size ' + returnFileSize(curFiles[i].size) + '.';
	        var image = document.createElement('img');
	        image.src = window.URL.createObjectURL(curFiles[i]);

	        listItem.appendChild(image);
	        listItem.appendChild(para);

	      } else {
	        para.textContent = 'File name ' + curFiles[i].name + ': Not a valid file type. Update your selection.';
	        listItem.appendChild(para);
	      }

	      list.appendChild(listItem);
	    }
	  }
	}

	var fileTypes = [
	  'image/jpeg',
	  'image/pjpeg',
	  'image/png'
	]

	function validFileType(file) {
	  for(var i = 0; i < fileTypes.length; i++) {
	    if(file.type === fileTypes[i]) {
	      return true;
	    }
	  }

	  return false;
	}

	function returnFileSize(number) {
	  if(number < 1024) {
	    return number + ' octets';
	  } else if(number >= 1024 && number < 1048576) {
	    return (number/1024).toFixed(1) + ' Ko';
	  } else if(number >= 1048576) {
	    return (number/1048576).toFixed(1) + ' Mo';
	  }
	}


</script>
	<?php

	// View : Formlaire de l'ajout d'une annonce

	?>

<div class="container">
  <h2 class="mb-3">Navigation</h2>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-list-task"></i> Liste des annonces</h5>
          <p class="card-text">Cliquez pour accéder à la liste des annonces</p>
          <a href="/back/annonce" class="btn app-btn-primary btn-lg btn-icon"><i class="bi bi-list-task"></i> Liste des annonces</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 mt-3 mt-md-0">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-house-door-fill"></i> Accueil</h5>
          <p class="card-text">Cliquez pour retourner à la page d'accueil</p>
          <a href="/back" class="btn app-btn-primary btn-lg btn-icon"><i class="bi bi-house-door"></i> Accueil</a>
        </div>
      </div>
    </div>
  </div>
	
  <div class="mt-5">
		<h2 class="mb-3">Ajouter une annonce</h2>
    <?php $this->partial("form", $this->data['formAdd']) ?>
  </div>
</div>



<script type="text/javascript">

    //let q = document.getElementById('type-form-adresse').value;
    /*q = "résidence des lignieres";
    $.get(`https://api-adresse.data.gouv.fr/search/?q=${q}`, function(data){*/

        $(document).ready(function() {
            $('#type-form-adresse').on('keyup', function() {
                const adresseRecherchee = $('#type-form-adresse').val();

                $.ajax({ // Call Ajax vers l'API 'adress' du gouvernement
                    url: 'https://api-adresse.data.gouv.fr/search/',
                    method: 'GET',
                    data: { q: adresseRecherchee },
                    dataType: 'json',
                    success: function(data) {
                        afficherResultats(data);
                    },
                    error: function(error) {
                        console.error('Erreur lors de la récupération des données:', error);
                    }
                });
            });

            $(document).on('click', '.button-adresse', function() {
                $('#type-form-adresse').val(this.textContent);
                $.ajax({
                    url: 'https://api-adresse.data.gouv.fr/search/',
                    method: 'GET',
                    data: { q: this.textContent },
                    dataType: 'json',
                    success: function(data) {
                        completeInputAdresse(data);
                    },
                    error: function(error) {
                        console.error('Erreur lors de la récupération des données:', error);
                    }
                });
            });
        });

        function completeInputAdresse(data) {

            $('#city-annonce-form').val(data.features[0].properties.city);
            $('#adrcomplet-annonce-form').val(data.features[0].properties.name);
            $('#postcode-annonce-form').val(data.features[0].properties.postcode);
            // perform explode -> context : depnum, deplabel, region
            let context = data.features[0].properties.context.split(', ');
            $('#depnum-annonce-form').val(context[0]);
            $('#deplabel-annonce-form').val(context[1]);
            $('#region-annonce-form').val(context[2]);
            // latitude - longitude
            $('#longitude-annonce-form').val(data.features[0].geometry.coordinates[0]);
            $('#latitude-annonce-form').val(data.features[0].geometry.coordinates[1]);
        }

        function afficherResultats(data) {
            data = data.features;
            const resultatsDiv = $('#listAdresse');
            resultatsDiv.empty(); // vide la division des resultats
            $.each(data, function(index, adresse) { // parcour chaque resultat
                adresse = adresse.properties.label
                const division = $('<div>'); // creation div

                const inputAdresse = $('<button class="button-adresse">').attr('type', 'button').text(adresse);
                division.append(inputAdresse); // append adrress dans la div

                resultatsDiv.append(division); // append la div dans la div des resultats
            });
        }


    </script>


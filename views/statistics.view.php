<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing-content">
  <div class="row offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1 col-lg-11 col-md-11 col-sm-11 col-xs-11">
    <svg class="burgerResponsive col-lg-2 col-sm-2 col-md-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
    <h1 class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1">Statistiques</h1>
  </div>
</section>
<div class="row">
	<div class="row col-lg-9 col-md-9 col-sm-9 col-xs-9">
      	<div id="chart_visite" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing background-content content-padding dashboard-chart">
        	<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 activities-title">Visites</h2>
        	<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             	<canvas class="col-lg-12 col-md-12 col-sm-12 col-xs-12 canvas_dashboard" id="line-chart"></canvas>
            </article>
      	</div>
      	<div id="chart_visite_jour" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing background-content content-padding dashboard-chart">
        	<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 activities-title">Nombre de visites par jour</h2>
        	<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             	<canvas class="col-lg-12 col-md-12 col-sm-12 col-xs-12 canvas_dashboard" id="line-chart2"></canvas>
            </article>
      	</div>
      	<div id="chart_nb_inscrit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing background-content content-padding dashboard-chart">
        	<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 activities-title">Nombre d'inscrit ce jour</h2>
        	<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             	<canvas class="col-lg-12 col-md-12 col-sm-12 col-xs-12 canvas_dashboard" id="line-chart3"></canvas>
            </article>
      	</div>
      	<div id="chart_nb_resa" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing background-content content-padding dashboard-chart">
        	<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 activities-title">Nombre de réservation ce jour</h2>
        	<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             	<canvas class="col-lg-12 col-md-12 col-sm-12 col-xs-12 canvas_dashboard" id="line-chart4"></canvas>
            </article>
      	</div>
      	<div id="chart_nb_partie" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 placing background-content content-padding dashboard-chart">
        	<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 activities-title">Nombre de partie ce jour</h2>
        	<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             	<canvas class="col-lg-12 col-md-12 col-sm-12 col-xs-12 canvas_dashboard" id="line-chart5"></canvas>
            </article>
      	</div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 background-content">
    	<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 activities-title">Activer/Désactiver les statistiques</h2>
    	<section class="row">
    		<h4>Visite :</h4>
    		<label for="visite">Afficher</label>
	    	<input class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" type="checkbox" id="visite" name="feature" 
	    	value="Afficher" checked onclick="visible_hidden_visite()" />
    	</section> 
    	<section class="row">
    		<h4>Nombre de visites par jour :</h4>
    		<label for="visite">Afficher</label>
	    	<input class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" type="checkbox" id="visite_jour" name="feature" 
	    	value="Afficher" checked  onclick="visible_hidden_visite_jour()" />
    	</section> 
    	<section class="row">
    		<h4>Nombre d'inscrit :</h4>
    		<label for="visite">Afficher</label>
	    	<input class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" type="checkbox" id="nb_inscrit" name="feature" 
	    	value="Afficher" checked onclick="visible_hidden_nb_inscrit()" />
    	</section> 
    	<section class="row">
    		<h4>Nombre de réservation ce jour :</h4>
    		<label for="visite">Afficher</label>
	    	<input class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" type="checkbox" id="nb_resa" name="feature" 
	    	value="Afficher" checked onclick="visible_hidden_nb_resa()" />
    	</section> 
    	<section class="row">
    		<h4>Nombre de partie ce jour :</h4>
    		<label for="visite">Afficher</label>
	    	<input class="offset-lg-1 offset-md-1 offset-sm-1 offset-xs-1" type="checkbox" id="nb_parti" name="feature" 
	    	value="Afficher" checked onclick="visible_hidden_nb_partie()" />
    	</section>    	
    </div>
</div>
<script>
function visible_hidden_visite(){

	if (chart_visite.style.visibility=="hidden"){
		chart_visite.style.visibility = "visible";
		chart_visite.style.height = "auto";	
	}else{
		chart_visite.style.visibility = "hidden";
		chart_visite.style.height = "0";
	}
}

function visible_hidden_visite_jour(){
	if (chart_visite_jour.style.visibility=="hidden"){
		chart_visite_jour.style.visibility = "visible";
		chart_visite_jour.style.height = "auto";	
	}else{
		chart_visite_jour.style.visibility = "hidden";
		chart_visite_jour.style.height = "0";
	}
}

function visible_hidden_nb_inscrit(){
	if (chart_nb_inscrit.style.visibility=="hidden"){
		chart_nb_inscrit.style.visibility = "visible";
		chart_nb_inscrit.style.height = "auto";	
	}else{
		chart_nb_inscrit.style.visibility = "hidden";
		chart_nb_inscrit.style.height = "0";
	}
}	

function visible_hidden_nb_resa(){
	if (chart_nb_resa.style.visibility=="hidden"){
		chart_nb_resa.style.visibility = "visible";
		chart_nb_resa.style.height = "auto";	
	}else{
		chart_nb_resa.style.visibility = "hidden";
		chart_nb_resa.style.height = "0";
	}
}	

function visible_hidden_nb_partie(){
	if (chart_nb_partie.style.visibility=="hidden"){
		chart_nb_partie.style.visibility = "visible";
		chart_nb_partie.style.height = "auto";	
	}else{
		chart_nb_partie.style.visibility = "hidden";
		chart_nb_partie.style.height = "0";
	}
}
</script>
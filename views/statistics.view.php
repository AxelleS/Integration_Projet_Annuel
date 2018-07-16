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

$(document).ready(function(){

  $.ajax({
    url : '<?php echo DIRNAME.Route::getSlug('statistics','ajaxStatistics'); ?>',
    type : 'GET',
    complete : function(data) {
      console.log("test" + data['responseText']);
      var result = JSON.parse(data['responseText']);

      var ctx = document.getElementById("line-chart").getContext("2d");

      var dataChart = {
        labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050,4000],
        datasets: [{
            data: [86,114,106,106,107,111,133,221,783,2478],
            label: "Par jour",
            borderColor: "#3e95cd",
            fill: false
          }, {
            data: [282,350,411,502,635,809,947,1402,3700,5267],
            label: "Par semaine",
            borderColor: "#8e5ea2",
            fill: false
          }
        ]
      };

      var lineChart = new Chart(ctx, {
        type: 'line',
        data: dataChart,
        options: {
          maintainAspectRatio: false,
          title: {
            display: true,
            text: 'Nombre de visiteurs'
          }
        }
      });

      var ctx = document.getElementById("line-chart2").getContext("2d");

      var dataChart2 = {
        labels: [10,20,30,40,50,60,70,80,90,100,200],
        datasets: [{
            data: [2,24,7,45,33,10,66,45,23,17],
            label: "Par jour",
            borderColor: "#FF8000",
            fill: false
          }
        ]
      };

      var lineChart2 = new Chart(ctx, {
        type: 'line',
        data: dataChart2,
        options: {
          maintainAspectRatio: false,
          title: {
            display: true,
            text: 'Nombre de visiteurs'
          }
        }
      });

      var ctx = document.getElementById("line-chart3").getContext("2d");

      var dataChart3 = {
        labels: [20,24,24,26,33,45,45,45,46,76],
        datasets: [{
            data: [20,24,24,26,33,45,45,45,46,76],
            label: "Total",
            borderColor: "#0101DF",
            fill: false
          }
        ]
      };

      var lineChart3 = new Chart(ctx, {
        type: 'line',
        data: dataChart3,
        options: {
          maintainAspectRatio: false,
          title: {
            display: true,
            text: 'Nombre de visiteurs'
          }
        }
      });
      var ctx = document.getElementById("line-chart4").getContext("2d");

      var dataChart4 = {
        labels: ['00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23'],
        datasets: [{
            data: [2,1,0,0,0,0,0,0,0,3,1,6,2,2,4,5,2,0,5,11,9,6,3,0], 
            label: "Ce jour",
            borderColor: "#DF013A",
            fill: false
          }
        ]
      };

      var lineChart4 = new Chart(ctx, {
        type: 'line',
        data: dataChart4,
        options: {
          maintainAspectRatio: false,
          title: {
            display: true,
            text: 'Nombre de visiteurs'
          }
        }
      });

      var ctx = document.getElementById("line-chart5").getContext("2d");

      var dataChart5 = {
        labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050,4000],
        datasets: [{
            data: [86,114,106,106,107,111,133,221,783,2478],
            label: "Ce jour",
            borderColor: "#01DF3A",
            fill: false
          }
        ]
      };

      var lineChart5 = new Chart(ctx, {
        type: 'line',
        data: dataChart5,
        options: {
          maintainAspectRatio: false,
          title: {
            display: true,
            text: 'Nombre de visiteurs'
          }
        }
      });

      window.addEventListener('resize', function () {
        lineChart.resize(),
        lineChart2.resize(),
        lineChart3.resize(),
        lineChart4.resize(),
        lineChart5.resize()
      });
    }
  });
});
  


</script>
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

$(document).ready(function(){
  refresh();
  //setInterval("refresh()", 30*60000)
});

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

//Récuperation de la date du jour
var today = new Date();
var todayDay = today.getDate()
var todayMonth = today.getMonth() +1;
var todayYear = today.getFullYear();

//formatage de la date du jour
var todayM = todayDay + '/' +todayMonth + '/' +todayYear;

var todayDayM1 =today.getDate() -1; 
//formatage de la date du jour -1
var todayDayM1 = todayDayM1 + '/' +todayMonth + '/' +todayYear;

var todayDayM2 =today.getDate() -2; 
//formatage de la date du jour -2
var todayDayM2 = todayDayM2 + '/' +todayMonth + '/' +todayYear;

var todayDayM3 =today.getDate() -3; 
//formatage de la date du jour -3
var todayDayM3 = todayDayM3 + '/' +todayMonth + '/' +todayYear;

var todayDayM4 =today.getDate() -4;
//formatage de la date du jour -4
var todayDayM4 = todayDayM4 + '/' +todayMonth + '/' +todayYear;

var todayDayM5 =today.getDate() -5; 
//formatage de la date du jour -5
var todayDayM5 = todayDayM5 + '/' +todayMonth + '/' +todayYear;


function refresh() {
  $.ajax({
    url : '<?php echo DIRNAME.Route::getSlug('statistics','ajaxStatistics'); ?>',
    type : 'GET',
    complete : function(data) {
      var result = JSON.parse(data['responseText']);

      var ctx = document.getElementById("line-chart").getContext("2d");

      var dataChart = {
        labels: [todayDayM5,todayDayM4,todayDayM3,todayDayM2,todayDayM1,todayM],
        datasets: [{
            data: [result['number_visite'][5][0],result['number_visite'][4][0],result['number_visite'][3][0],result['number_visite'][2][0],result['number_visite'][1][0],result['number_visite'][0][0]],
            label: "Par jour",
            borderColor: "#3e95cd",
            fill: false
          }
          // }, {
          //   data: [282,350,411,502,635,809,947,1402,3700,5267],
          //   label: "Par semaine",
          //   borderColor: "#8e5ea2",
          //   fill: false
          // }
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
        labels: ["00H00","01H00","02H00","03H00","04H00","05H00","06H00","07H00","08H00","09H00","10H00","11H00","12H00","13H00","14H00","15H00","16H00","17H00","18H00","19H00","20H00","21H00","22H00","23H00"],
        datasets: [{
            data: [
                    result['number_visite_today'][0][0],
                    result['number_visite_today'][1][0],
                    result['number_visite_today'][2][0],
                    result['number_visite_today'][3][0],
                    result['number_visite_today'][4][0],
                    result['number_visite_today'][5][0],
                    result['number_visite_today'][6][0],
                    result['number_visite_today'][7][0],
                    result['number_visite_today'][8][0],
                    result['number_visite_today'][9][0],
                    result['number_visite_today'][10][0],
                    result['number_visite_today'][11][0],
                    result['number_visite_today'][12][0],
                    result['number_visite_today'][13][0],
                    result['number_visite_today'][14][0],
                    result['number_visite_today'][15][0],
                    result['number_visite_today'][16][0],
                    result['number_visite_today'][17][0],
                    result['number_visite_today'][18][0],
                    result['number_visite_today'][19][0],
                    result['number_visite_today'][20][0],
                    result['number_visite_today'][21][0],
                    result['number_visite_today'][22][0],
                    result['number_visite_today'][23][0]
                  ],
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
        labels: [todayDayM5,todayDayM4,todayDayM3,todayDayM2,todayDayM1,todayM],
        datasets: [{
            data: [result['number_insert_today'][5][0],result['number_insert_today'][4][0],result['number_insert_today'][3][0],result['number_insert_today'][2][0],result['number_insert_today'][1][0],result['number_insert_today'][0][0]],
            label: "Par jour",
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
            text: 'Nombre d\'inscrit'
          }
        }
      });
      var ctx = document.getElementById("line-chart4").getContext("2d");

      var dataChart4 = {
        labels: [todayDayM5,todayDayM4,todayDayM3,todayDayM2,todayDayM1,todayM],
        datasets: [{
            data: [result['number_resa_today'][5][0],result['number_resa_today'][4][0],result['number_resa_today'][3][0],result['number_resa_today'][2][0],result['number_resa_today'][1][0],result['number_resa_today'][0][0],], 
            label: "Par jour",
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
}

  


</script>
window.onload = function() {
  var ctx = document.getElementById("line-chart").getContext("2d");

  var dataChart = {
    labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
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

  window.addEventListener('resize', function () {
    lineChart.resize()
  })
}


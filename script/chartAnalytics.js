// window.onload = function() {

//   var ctx = document.getElementById("line-chart").getContext("2d");

//   var dataChart = {
//     labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050,4000],
//     datasets: [{
//         data: [86,114,106,106,107,111,133,221,783,2478],
//         label: "Par jour",
//         borderColor: "#3e95cd",
//         fill: false
//       }, {
//         data: [282,350,411,502,635,809,947,1402,3700,5267],
//         label: "Par semaine",
//         borderColor: "#8e5ea2",
//         fill: false
//       }
//     ]
//   };

//   var lineChart = new Chart(ctx, {
//     type: 'line',
//     data: dataChart,
//     options: {
//       maintainAspectRatio: false,
//       title: {
//         display: true,
//         text: 'Nombre de visiteurs'
//       }
//     }
//   });

//   var ctx = document.getElementById("line-chart2").getContext("2d");

//   var dataChart2 = {
//     labels: [10,20,30,40,50,60,70,80,90,100,200],
//     datasets: [{
//         data: [2,24,7,45,33,10,66,45,23,17],
//         label: "Par jour",
//         borderColor: "#FF8000",
//         fill: false
//       }
//     ]
//   };

//   var lineChart2 = new Chart(ctx, {
//     type: 'line',
//     data: dataChart2,
//     options: {
//       maintainAspectRatio: false,
//       title: {
//         display: true,
//         text: 'Nombre de visiteurs'
//       }
//     }
//   });

//   var ctx = document.getElementById("line-chart3").getContext("2d");

//   var dataChart3 = {
//     labels: [20,24,24,26,33,45,45,45,46,76],
//     datasets: [{
//         data: [20,24,24,26,33,45,45,45,46,76],
//         label: "Total",
//         borderColor: "#0101DF",
//         fill: false
//       }
//     ]
//   };

//   var lineChart3 = new Chart(ctx, {
//     type: 'line',
//     data: dataChart3,
//     options: {
//       maintainAspectRatio: false,
//       title: {
//         display: true,
//         text: 'Nombre de visiteurs'
//       }
//     }
//   });
//   var ctx = document.getElementById("line-chart4").getContext("2d");

//   var dataChart4 = {
//     labels: [00,01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23], 
//     datasets: [{
//         data: [2,1,0,0,0,0,0,0,0,3,1,6,2,2,4,5,2,0,5,11,9,6,3,0], 
//         label: "Ce jour",
//         borderColor: "#DF013A",
//         fill: false
//       }
//     ]
//   };

//   var lineChart4 = new Chart(ctx, {
//     type: 'line',
//     data: dataChart4,
//     options: {
//       maintainAspectRatio: false,
//       title: {
//         display: true,
//         text: 'Nombre de visiteurs'
//       }
//     }
//   });

//   var ctx = document.getElementById("line-chart5").getContext("2d");

//   var dataChart5 = {
//     labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050,4000],
//     datasets: [{
//         data: [86,114,106,106,107,111,133,221,783,2478],
//         label: "Ce jour",
//         borderColor: "#01DF3A",
//         fill: false
//       }
//     ]
//   };

//   var lineChart5 = new Chart(ctx, {
//     type: 'line',
//     data: dataChart5,
//     options: {
//       maintainAspectRatio: false,
//       title: {
//         display: true,
//         text: 'Nombre de visiteurs'
//       }
//     }
//   });

//   window.addEventListener('resize', function () {
//     lineChart.resize()
//     lineChart2.resize()
//     lineChart3.resize()
//     lineChart4.resize()
//     lineChart5.resize()
//   })
// }


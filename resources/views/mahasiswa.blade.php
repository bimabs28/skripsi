@extends('adminlte')

@section('content')
{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div class="col-md-6">

    <div class="card card-info">
    <div class="card-header">
    <h3 class="card-title">Line Chart</h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>
    <button type="button" class="btn btn-tool" data-card-widget="remove">
    <i class="fas fa-times"></i>
    </button>
    </div>
    </div>
    <div class="card-body">
    <div class="chart">
    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
    </div>
    </div>
    
    </div>
    
<script>
    //-------------
    //- LINE CHART -
    //--------------
    var labels = @json($labels);
    var jumlah = @json($jumlah);
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, labels)
    var lineChartData = $.extend(true, {}, jumlah)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })
</script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
<canvas id="myChart"></canvas>
<script>
    var labels = @json($labels);
    var jumlah = @json($jumlah);

    var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
        labels: labels,
        datasets: [{
            label: 'Jumlah',
            data: jumlah,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script> --}}

{{-- <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div id="chartContainer1" style="width: 45%; height: 300px;display: inline-block;"></div> 
<div id="chartContainer2" style="width: 45%; height: 300px;display: inline-block;"></div><br/>
<div id="chartContainer3" style="width: 45%; height: 300px;display: inline-block;"></div>
<div id="chartContainer4" style="width: 45%; height: 300px;display: inline-block;"></div>
<script>
var chart1 = new CanvasJS.Chart("chartContainer1", {    
    animationEnabled: true,
    title: {
      text: "Spline Area Chart"
    },
    axisX: {
      interval: 10,
    },
    data: [
      {
        type: "splineArea",
        color: "rgba(255,12,32,.3)",
        dataPoints: [
          { x: new Date(1992, 0), y: 2506000 },
          { x: new Date(1993, 0), y: 2798000 },
          { x: new Date(1994, 0), y: 3386000 },
          { x: new Date(1995, 0), y: 6944000 },
          { x: new Date(1996, 0), y: 6026000 },
          { x: new Date(1997, 0), y: 2394000 },
          { x: new Date(1998, 0), y: 1872000 },
          { x: new Date(1999, 0), y: 2140000 },
          { x: new Date(2000, 0), y: 7289000 },
          { x: new Date(2001, 0), y: 4830000 },
          { x: new Date(2002, 0), y: 2009000 },
          { x: new Date(2003, 0), y: 2840000 },
          { x: new Date(2004, 0), y: 2396000 },
          { x: new Date(2005, 0), y: 1613000 },
          { x: new Date(2006, 0), y: 2821000 }
        ]
      },
    ]
  });
  chart1.render();
  
  var chart2 = new CanvasJS.Chart("chartContainer2", {
    animationEnabled: true,
    title: {
      text: "Pie Chart",
    },
    data: [
      {
        type: "pie",
        showInLegend: true,
        dataPoints: [
          { y: 4181563, legendText: "PS 3", indexLabel: "PlayStation 3" },
          { y: 2175498, legendText: "Wii", indexLabel: "Wii" },
          { y: 3125844, legendText: "360", indexLabel: "Xbox 360" },
          { y: 1176121, legendText: "DS", indexLabel: "Nintendo DS" },
          { y: 1727161, legendText: "PSP", indexLabel: "PSP" },
          { y: 4303364, legendText: "3DS", indexLabel: "Nintendo 3DS" },
          { y: 1717786, legendText: "Vita", indexLabel: "PS Vita" }
        ]
      },
    ]
  });
  chart2.render();
  
  var chart3 = new CanvasJS.Chart("chartContainer3", {
    animationEnabled: true,
    title: {
      text: "Line Chart"
    },
    axisX: {
      valueFormatString: "MMM",
      interval: 1,
      intervalType: "month"
    },
    axisY: {
      includeZero: false
    },
    data: [
      {
        type: "line",
        dataPoints: [
            { x: new Date(2012, 00, 1), y: 450 },
            { x: new Date(2012, 01, 1), y: 414 },
            { x: new Date(2012, 02, 1), y: 520, indexLabel: "highest", markerColor: "red", markerType: "triangle" },
            { x: new Date(2012, 03, 1), y: 460 },
            { x: new Date(2012, 04, 1), y: 450 },
            { x: new Date(2012, 05, 1), y: 500 },
            { x: new Date(2012, 06, 1), y: 480 },
            { x: new Date(2012, 07, 1), y: 480 },
            { x: new Date(2012, 08, 1), y: 410, indexLabel: "lowest", markerColor: "DarkSlateGrey", markerType: "cross" },
            { x: new Date(2012, 09, 1), y: 500 },
            { x: new Date(2012, 10, 1), y: 480 },
            { x: new Date(2012, 11, 1), y: 510 }
        ]
      }
    ]
  });
  chart3.render();
  
  var chart4 = new CanvasJS.Chart("chartContainer4", {
    animationEnabled: true,
    title: {
      text: "Column Chart"
    },
    axisX: {
      interval: 10,
    },
    data: [
      {
        type: "column",
        legendMarkerType: "triangle",
        legendMarkerColor: "green",
        color: "rgba(255,12,32,.3)",
        showInLegend: true,
        legendText: "Country wise population",
        dataPoints: [
          { x: 10, y: 297571, label: "India" },
          { x: 20, y: 267017, label: "Saudi" },
          { x: 30, y: 175200, label: "Canada" },
          { x: 40, y: 154580, label: "Iran" },
          { x: 50, y: 116000, label: "Russia" },
          { x: 60, y: 97800, label: "UAE" },
          { x: 70, y: 20682, label: "US" },
          { x: 80, y: 20350, label: "China" }
        ]
      },
    ]
  });
  chart4.render();
</script> --}}



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>

    <title>Document</title>
    <script>
        $(function () {
            var ctx = document.getElementById("layanan").getContext('2d');
            var data = {
                datasets: [{
                    data: [10, 20, 30],
                    backgroundColor: [
                        '#3c8dbc',
                        '#f56954',
                        '#f39c12',
                    ],
                }],
                labels: [
                    'Request',
                    'Layanan',
                    'Problem'
                ]
            };
            var myDoughnutChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12
                        }
                    }
                }
            });

            var ctx_2 = document.getElementById("layanan_subbagian").getContext('2d');
            var data_2 = {
                datasets: [{
                    data: [10, 20, 30],
                    backgroundColor: [
                        '#3c8dbc',
                        '#f56954',
                        '#f39c12',
                    ],
                }],
                labels: [
                    'Request',
                    'Layanan',
                    'Problem'
                ]
            };
            var myDoughnutChart_2 = new Chart(ctx_2, {
                type: 'doughnut',
                data: data_2,
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12
                        }
                    }
                }
            });
        });

    </script>
</head>

<body>
  <div>
      <canvas id="layanan" width="240px" height="240px"></canvas>
  </div>

  <div>
      <canvas id="layanan_subbagian" width="240px" height="240px"></canvas>
  </div>
</body>

</html>


@endsection

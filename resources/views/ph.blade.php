@extends('adminlte')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
<div class='d-flex p-2 flex-wrap'>
    <div class="card-body d-flex flex-center flex-column" style="width: 600px; height:350px;">
        <!-- Find the JS file for the following chart at: src/js/charts/echarts/bandwidth-saved.js-->
        <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
        <canvas id="phChart" width="350"></canvas>
    </div>
    
    <div class="card-body d-flex flex-center flex-column" style="width: 600px; height:350px;">
        <!-- Find the JS file for the following chart at: src/js/charts/echarts/bandwidth-saved.js-->
        <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
        <canvas id="ecChart" width="350"></canvas>
    </div>
    
    <div class="card-body d-flex flex-center flex-column" style="width: 600px; height:350px;">
        <!-- Find the JS file for the following chart at: src/js/charts/echarts/bandwidth-saved.js-->
        <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
        <canvas id="humidityChart" width="350"></canvas>
    </div>
</div>

<script>
    var labels = @json($labels);
    var ph_data = @json($ph_data);
    var ctx = document.getElementById("phChart").getContext('2d');
		var phChart = new Chart(ctx, {
			type: 'line',
			data: {
        labels: labels,
        datasets: [{
            label: 'pH',
            data: ph_data,
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

var labels2 = @json($labels2);
var electrical_conductivity = @json($electrical_conductivity);

var ctx_2 = document.getElementById("ecChart").getContext('2d');
		var ecChart = new Chart(ctx_2, {
			type: 'line',
			data: {
        labels: labels2,
        datasets: [{
            label: 'EC (mS/cm)',
            data: electrical_conductivity,
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

var labels3 = @json($labels3);
var humidity = @json($humidity);

    var ctx_3 = document.getElementById("humidityChart").getContext('2d');
		var myChart = new Chart(ctx_3, {
			type: 'line',
			data: {
        labels: labels3,
        datasets: [{
            label: 'Humidity (%)',
            data: humidity,
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

</script>
@endsection
@extends('adminlte')

@section('content')
<div class="card-body d-flex flex-center flex-column" style="width: 600px; height:350px;">
    <!-- Find the JS file for the following chart at: src/js/charts/echarts/bandwidth-saved.js-->
    <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
    <canvas id="humidity" width="350"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

<script>
    var labels = @json($labels);
    var humidity = @json($humidity);

    var ctx = document.getElementById("humidity").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
        labels: labels,
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
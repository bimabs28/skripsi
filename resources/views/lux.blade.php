@extends('adminlte')

@section('content')
<canvas id="luxChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

<script>
var labels = @json($labels);
    var lux = @json($lux);
    var ctx = document.getElementById("luxChart").getContext('2d');
		var luxChart = new Chart(ctx, {
			type: 'line',
			data: {
        labels: labels,
        datasets: [{
            label: 'Luminosity',
            data: lux,
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
//end of chart lux

//realtime chart lux
function addData(chart, label, data) {
  chart.data.labels.push(label);
  chart.data.datasets.forEach((dataset) => {
    dataset.data.push(data);
  });
  chart.update();
}

setInterval(function() {
  fetch('/readdata3') // Ganti URL sesuai dengan endpoint atau route yang telah Anda buat di server-side
    .then(response => response.json())
    .then(data => {
        addData(luxChart,data['time_lux'], data['lux_data'])
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
}, 10000);
//end of realtime chart lux
</script>
@endsection
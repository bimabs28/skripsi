@extends('adminlte')

@section('content')
<canvas id="phChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

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
//end of chart PH

//realtime chart ph
function addData(chart, label, data) {
  chart.data.labels.push(label);
  chart.data.datasets.forEach((dataset) => {
    dataset.data.push(data);
  });
  chart.update();
}

setInterval(function() {
  fetch('/readdata2') // Ganti URL sesuai dengan endpoint atau route yang telah Anda buat di server-side
    .then(response => response.json())
    .then(data => {
        addData(phChart,data['time_ph'], data['ph_level'])
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
}, 10000);
//end of realtime chart ph
</script>
@endsection
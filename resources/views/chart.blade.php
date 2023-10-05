@extends('adminlte')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

<div class="col-sm-6">
    <h1 class="m-0">Sensor 1</h1>
</div>

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
    
    <div class="card-body d-flex flex-center flex-column" style="width: 600px; height:350px;">
        <!-- Find the JS file for the following chart at: src/js/charts/echarts/bandwidth-saved.js-->
        <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
        <canvas id="luxChart" width="350"></canvas>
    </div>
</div>

<!-- Chart PH -->
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


//chart ec
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
//end of chart ec

//realtime chart ec
function addData(chart, label, data) {
  chart.data.labels.push(label);
  chart.data.datasets.forEach((dataset) => {
    dataset.data.push(data);
  });
  chart.update();
}

setInterval(function() {
  fetch('/readdata4') // Ganti URL sesuai dengan endpoint atau route yang telah Anda buat di server-side
    .then(response => response.json())
    .then(data => {
        addData(ecChart,data['time_ec'], data['electrical_conductivity'])
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
}, 10000);
//end of realtime chart ec

//chart humidity
var labels3 = @json($labels3);
var humidity = @json($humidity);

var ctx_3 = document.getElementById("humidityChart").getContext('2d');
var humidityChart = new Chart(ctx_3, {
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
//end of chart humidity

//realtime chart humidity
function addData(chart, label, data) {
  chart.data.labels.push(label);
  chart.data.datasets.forEach((dataset) => {
    dataset.data.push(data);
  });
  chart.update();
}

setInterval(function() {
  fetch('/readdata') // Ganti URL sesuai dengan endpoint atau route yang telah Anda buat di server-side
    .then(response => response.json())
    .then(data => {
        // Di sini, Anda dapat mengolah dat a yang didapatkan dari tabel MySQL dan menambahkannya ke chart
        // Misalnya, jika Anda menggunakan Chart.js, Anda bisa memanggil fungsi addData(humidityChart, newLabel, newData) dengan data yang diolah
        // addData(humidityChart, data.label, data.value);
        addData(humidityChart,data['time_kelembapan'], data['persentasi_kelembapan'])
        //console.log(data['time_kelembapan']);
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
}, 10000);
//end of realtime chart humidity



//chart lux
var labels4 = @json($labels4);
    var lux = @json($lux);
    var ctx_4 = document.getElementById("luxChart").getContext('2d');
		var luxChart = new Chart(ctx_4, {
			type: 'line',
			data: {
        labels: labels4,
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
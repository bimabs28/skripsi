@extends('adminlte')

@section('content')
  <canvas id="humidityChart"></canvas>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

  <div class="container">
    <h1 class="fw-bold">Lorem Ipsum</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat voluptatibus quod, dicta error reiciendis
      explicabo facere minus vero molestias, neque eaque totam incidunt excepturi quisquam, dolores eligendi? Qui, ut
      architecto!</p>
    <div class="card">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <button class="nav-link tablink" id="defaultcontent" onclick="openContent(event, 'model')">Model</button>
        </li>
        <li class="nav-item">
          <button class="nav-link tablink" onclick="openContent(event, 'controller')">Controller</button>
        </li>
        <li class="nav-item">
          <button class="nav-link tablink" onclick="openContent(event, 'view')">View</button>
        </li>
      </ul>
      <div class="card-body">
        <div class="p-3 tabcontent card-body" id="model">
          <script src="https://gist.github.com/bimabs28/52a42e28896d5370385bdd4faf006bb0.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="controller">
          <script src="https://gist.github.com/bimabs28/42456e8b1dfb608174a135d5c99813eb.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="view">
          <script src="https://gist.github.com/bimabs28/e8c20548ea39bbba19cff11f7c14aa96.js"></script>
        </div>
      </div>
    </div>
  </div>

  <style>
    @import url('https://cdn.rawgit.com/lonekorean/gist-syntax-themes/d49b91b3/stylesheets/one-dark.css');

    #humidityChart {
      margin-bottom: 20px;
    }

    .tabcontent {
      animation: fadeEffect 1s;
    }

    @keyframes fadeEffect {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }
  </style>

  <script>
    function openContent(e, content) {
      let i, tabcontent, tablinks;

      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }

      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }

      document.getElementById(content).style.display = "block";
      e.currentTarget.className += " active";
    }

    document.getElementById("defaultcontent").click();
  </script>


  <script>
    var labels = @json($labels);
    var humidity = @json($humidity);

    var ctx = document.getElementById("humidityChart").getContext('2d');
    var humidityChart = new Chart(ctx, {
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
          addData(humidityChart, data['time_kelembapan'], data['persentasi_kelembapan'])
          //console.log(data['time_kelembapan']);
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    }, 10000);
  </script>
@endsection

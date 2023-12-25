@extends('adminlte')

@section('content')
  <canvas id="humidityChart"></canvas>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

  <div class="container">
    <h1 class="fw-bold">Radar Chart</h1>
    <p>Radar chart, juga dikenal sebagai grafik spider atau grafik bintang, 
      adalah jenis visualisasi data yang digunakan lebih jarang dalam Internet of Things (IoT) 
      daripada line chart atau bar chart. Namun, radar chart dapat memiliki aplikasi dalam beberapa konteks IoT yang khusus. 
      Di bawah ini adalah beberapa contoh penggunaan radar chart dalam IoT:</p>

      <p>
        1. Pemantauan Kualitas Udara: Sensor kualitas udara IoT dapat mengukur berbagai parameter seperti partikel debu, 
        konsentrasi gas, dan indeks polusi. Radar chart dapat digunakan untuk memvisualisasikan tingkat masing-masing parameter dalam satu grafik, 
        sehingga memungkinkan pembandingan langsung antara parameter-parameter tersebut.
      </p>

      <p>
        2. Pemantauan Kualitas Air dalam Akuarium: Jika Anda memiliki sistem IoT untuk mengontrol kualitas air dalam akuarium, 
        radar chart dapat digunakan untuk memvisualisasikan parameter seperti pH, suhu, tingkat oksigen, tingkat nitrat, 
        dan lain-lain dalam satu grafik, yang memberikan pandangan holistik tentang kondisi air.
      </p>

      <p>
        3. Evaluasi Kinerja Sensor: Dalam beberapa kasus, 
        Anda mungkin ingin membandingkan kinerja beberapa sensor IoT yang berbeda dalam mengukur parameter yang sama. 
        Radar chart dapat digunakan untuk membandingkan sensitivitas, akurasi, atau respons waktu sensor-sensor ini dalam satu tampilan.
      </p>

      <p>
        4. Pemantauan Energi: Radar chartr dapat digunakan untuk memvisualisasikan penggunaan energi di berbagai area dalam suatu bangunan atau sistem, 
        seperti pencahayaan, pemanasan, pendinginan, dan lainnya, dalam satu grafik untuk analisis efisiensi energi.
      </p>

      <p>
        5. Evaluasi Kualitas Layanan IoT: Dalam beberapa solusi IoT, kualitas layanan kepada pengguna dapat menjadi faktor kunci. 
        Radar chart dapat digunakan untuk memvisualisasikan berbagai parameter kualitas layanan seperti latensi, kecepatan, ketersediaan, 
        dan keandalan untuk menilai sejauh mana layanan memenuhi kebutuhan pengguna.
      </p>

      <p>
        Radar chart berguna ketika Anda ingin melihat banyak parameter sekaligus dalam satu tampilan dan membandingkannya secara relatif. 
        Namun, perlu diingat bahwa radar chart dapat menjadi sulit untuk dipahami jika terlalu banyak parameter digunakan, 
        sehingga perlu dilakukan dengan bijak dan sesuai dengan kebutuhan analisis dalam konteks IoT.
      </p>

    <div class="card">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <button class="nav-link tablink" id="defaultcontent" onclick="openContent(event, 'model')">Model</button>
        </li>
        <li class="nav-item">
          <button class="nav-link tablink" onclick="openContent(event, 'controller')">Controller</button>
        </li>
        <li class="nav-item">
          <button class="nav-link tablink" onclick="openContent(event, 'chart_controller')">Chart Controller</button>
        </li>
        <li class="nav-item">
          <button class="nav-link tablink" onclick="openContent(event, 'view')">View</button>
        </li>
        <li class="nav-item">
          <button class="nav-link tablink" onclick="openContent(event, 'query')">Query</button>
        </li>
      </ul>
      <div class="card-body">
        <div class="p-3 tabcontent card-body" id="model">
          <script src="https://gist.github.com/bimabs28/52a42e28896d5370385bdd4faf006bb0.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="controller">
          <script src="https://gist.github.com/bimabs28/42456e8b1dfb608174a135d5c99813eb.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="chart_controller">
          <script src="https://gist.github.com/bimabs28/f4884bc3d5a7682fd729b55f150e2982.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="view">
          <script src="https://gist.github.com/bimabs28/e8c20548ea39bbba19cff11f7c14aa96.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="query">
          <script src="https://gist.github.com/bimabs28/41ff59a377a249c5c4856c6a5c2f9a31.js"></script>
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

<div class="container">
  <h1 class="fw-bold">Cara Membuat Radar Chart secara Real Time</h1>

  <p>1. Membuat project laravel terlebih dahulu</p>

  <p>
    2. Isikan Models seperti pada text editor diatas, untuk nama class disesuaikan dengan nama model masing-masing dan 
    protected $table dapat disesuaikan dengan database masing-masing. 
    Model disini berfungsi untuk pengelolaan data dalam database.
  </p>

  <p>3. Isikan Controller seperti pada text editor diatas, sesuaikan kembali nama class
    dan nama dari database dari tabel yang akan digunakan, controller berfungsi sebagai pengontrol alur aplikasi antara
    model dan view.
  </p>

  <p>
    4. Selanjutnya ada Chart Controller yang berfungsi sebagai pengatur real timenya.
  </p>

  <p>
    5. View disini dalam blade.php yang berfungsi untuk menampilkan radar chart.
  </p>
  
  <p>
    6. Kode SQL atau query diatas memasukkan data dengan nilai acak ke dalam kolom 
    "persentasi_kelembapan" dan menambahkan waktu saat ini ke dalam kolom "time_kelembapan" dalam tabel "tbl_kelembapan." 
    Hal ini sering digunakan untuk menambahkan data simulasi atau data sensor ke dalam tabel dalam basis data.
    Kode SQL ini ditambahkan dalam "Event Scheduler" dalam phpmyadmin.
  </p>

  <p>
    <a href="https://github.com/bimabs28/radarchart-realtime">GitHub Radar chart real time</a>
  </p>


  <script>
    var labels = @json($labels);
    var humidity = @json($humidity);

    var ctx = document.getElementById("humidityChart").getContext('2d');
    var humidityChart = new Chart(ctx, {
      type: 'radar',
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

@extends('adminlte')

@section('content')
  <canvas id="luxChart"></canvas>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
  <div class="container">
    <h1 class="fw-bold">Line Chart</h1>

    <p>Line chart adalah salah satu jenis visualisasi data yang umum digunakan dalam 
      Internet of Things (IoT) untuk memahami dan menganalisis data sensor atau data real time. 
      Berikut beberapa contoh penggunaan line chart dalam IoT:
    </p>

    <p>
      1. Pemantauan Suhu: Dalam aplikasi IoT, Anda mungkin memiliki sensor suhu yang mengukur suhu sepanjang waktu. 
      Dengan menggunakan line chart, Anda dapat memvisualisasikan data suhu seiring waktu, 
      yang memungkinkan Anda untuk memahami pola perubahan suhu sepanjang hari, minggu, atau bulan.
    </p>

    <p>
      2. Pemantauan Kelembaban: Sensor kelembaban dapat digunakan untuk memonitor tingkat kelembaban dalam suatu lingkungan. 
      Line chart dapat membantu Anda melihat fluktuasi kelembaban sepanjang waktu dan mengidentifikasi tren.
    </p>

    <p>
      3. Pemantauan Kualitas Udara: Sensor kualitas udara dalam IoT dapat mengukur parameter seperti partikel debu, konsentrasi gas, atau indeks polusi. 
      Line chart dapat digunakan untuk melihat perubahan kualitas udara sepanjang waktu.
    </p>

    <p>
      4. Pemantauan Konsumsi Energi: IoT digunakan untuk mengukur dan mengelola konsumsi energi dalam bangunan dan industri. 
      Line chart dapat memberikan wawasan tentang konsumsi energi harian atau mingguan, yang dapat membantu dalam penghematan energi.
    </p>

    <p>
      5. Pemantauan Kinerja Perangkat: Dalam konteks IoT, Anda dapat menggunakan line chart untuk melacak kinerja perangkat IoT, 
      seperti latensi komunikasi, kecepatan data, atau penggunaan sumber daya perangkat seiring waktu.
    </p>

    <p>
      6. Pemantauan Kualitas Air dalam Akuarium: Jika Anda memiliki sistem IoT untuk mengontrol kualitas air dalam akuarium, 
      Anda dapat menggunakan line chart untuk memantau parameter seperti pH, suhu, dan tingkat oksigen dalam air.
    </p>

    <p>
      Line chart membantu Anda melihat tren, fluktuasi, dan pola dalam data IoT, yang dapat membantu dalam pengambilan keputusan yang lebih baik, pemeliharaan perangkat, dan identifikasi masalah. 
      Selain itu, mereka memudahkan komunikasi hasil pemantauan dengan pemangku kepentingan atau pengguna akhir yang tidak teknis, 
      karena line chart adalah salah satu metode visualisasi data yang mudah dipahami dan populer.
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
          <script src="https://gist.github.com/bimabs28/ff0f81325d7c5e54a6cb59f342985268.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="controller">
          <script src="https://gist.github.com/bimabs28/ac0bc2a64fb8f3a7045fc4f079661376.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="chart_controller">
          <script src="https://gist.github.com/bimabs28/f4884bc3d5a7682fd729b55f150e2982.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="view">
          <script src="https://gist.github.com/bimabs28/600a88fcf2f17bc4b513b6764ade8dab.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="query">
          <script src="https://gist.github.com/bimabs28/eabc414a1827640e81d4de2802926ba2.js"></script>
        </div>
      </div>
    </div>
  </div>

  <style>
    @import url('https://cdn.rawgit.com/lonekorean/gist-syntax-themes/d49b91b3/stylesheets/one-dark.css');

    #luxChart {
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
    // Get the <pre> element
    const preTag = document.getElementById("myPreTag");

    // Create a copy button element
    const copyButton = document.createElement("span");
    copyButton.innerText = "Copy";
    copyButton.classList.add("copy-button");

    // Append the copy button to the <pre> tag
    preTag.appendChild(copyButton);

    // Add click event listener to the copy button
    copyButton.addEventListener("click", () => {
      // Hide the copy button temporarily
      copyButton.style.display = "none";

      // Create a range and select the text inside the <pre> tag
      const range = document.createRange();
      range.selectNode(preTag);
      window.getSelection().removeAllRanges();
      window.getSelection().addRange(range);

      try {
        // Copy the selected text to the clipboard
        document.execCommand("copy");

        // Alert the user that the text has been copied
        copyButton.innerText = "Copied!";
        setTimeout(function() {
          copyButton.innerText = "Copy";
        }, 2000);
      } catch (err) {
        console.error("Unable to copy text:", err);
      } finally {
        // Show the copy button again
        copyButton.style.display = "inline";

        // Deselect the text
        window.getSelection().removeAllRanges();
      }
    });
  </script>

<div class="container">
  <h1 class="fw-bold">Cara Membuat Line Chart secara Real Time</h1>

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
    4. Selanjutnya ada Chart Controller yang berfungsi sebagai pengatur real timenya
  </p>

  <p>
    5. View disini dalam blade.php yang berfungsi untuk menampilkan line chart
  </p>
  
  <p>
    6. Kode SQL atau query diatas mmenghasilkan nilai acak untuk pembacaan "lux" pada berbagai waktu dalam sehari, 
    kemudian memasukkan nilai-nilai tersebut ke dalam tabel bernama "tbl_lux" bersama dengan penanda waktu saat ini. 
    Hal ini sering digunakan untuk menambahkan data simulasi atau data sensor ke dalam tabel dalam basis data.
    Kode SQL ini ditambahkan dalam "Event Scheduler" dalam phpmyadmin.
  </p>

  <p>
    Deklarasikan dua variabel, DateAndHour dan luxvalue, keduanya bertipe INT.
  </p>

  <p>
    Ambil jam saat ini dari waktu saat ini menggunakan fungsi HOUR() dan simpan nilainya di dalam variabel DateAndHour.
  </p>

  <p>
    Gunakan pernyataan kondisional (IF, ELSEIF, ELSE) untuk menentukan rentang jam 
    dan atur nilai luxvalue sesuai dengan waktu dalam sehari:
  </p>

  <p>
    Antara 6 dan 8: Atur luxvalue antara 5000 dan 20000.
  </p>

  <p>
    Antara 9 dan 11: Atur luxvalue antara 20000 dan 50000.
  </p>

  <p>
    Antara 12 dan 14: Atur luxvalue antara 50000 dan 100000.
  </p>

  <p>
    Antara 15 dan 17: Atur luxvalue antara 20000 dan 50000.
  </p>

  <p>
    Antara 18 dan 24: Atur luxvalue antara 5000 dan 10000.
  </p>

  <p>
    Selain dari rentang yang ditentukan di atas (untuk jam di luar rentang tersebut): Atur luxvalue antara 5000 dan 10000.
  </p>
  
  <p>
    Secara keseluruhan, kode ini menghasilkan nilai-nilai acak untuk pembacaan "lux" pada berbagai waktu dalam sehari 
    dan memasukkan nilai-nilai tersebut ke dalam tabel basis data. 
  </p>

  <p>
    <a href="https://github.com/bimabs28/linechart-realtime">GitHub Line chart real time</a>
  </p>

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
          addData(luxChart, data['time_lux'], data['lux_data'])
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    }, 10000);
    //end of realtime chart lux
  </script>
@endsection

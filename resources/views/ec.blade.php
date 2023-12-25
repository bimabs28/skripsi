@extends('adminlte')

@section('content')
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
  <canvas id="ecChart"></canvas>
  <div class="container">
    <h1 class="fw-bold">Pie Chart</h1>
    <p>Grafik pie (pie chart) adalah jenis visualisasi data yang jarang digunakan dalam konteks Internet of Things (IoT). 
      Grafik pie biasanya digunakan untuk menggambarkan pembagian persentase komponen dari suatu keseluruhan, 
      dan dalam banyak kasus, data IoT bersifat lebih dinamis dan kontinu daripada data yang dapat direpresentasikan dengan baik oleh grafik pie. 
      Meskipun demikian, ada beberapa situasi di mana Anda mungkin menggunakan grafik pie dalam IoT:
    </p>

    <p>
      1. Distribusi Sumber Daya: Jika Anda ingin memvisualisasikan distribusi sumber daya 
      (seperti alokasi anggaran, tenaga kerja, atau sumber daya fisik) di dalam solusi IoT, 
      grafik pie dapat digunakan untuk menggambarkan persentase penggunaan sumber daya.
    </p>

    <p>
      2. Komposisi Sensor atau Perangkat: Anda dapat menggunakan grafik pie untuk menggambarkan komposisi perangkat atau sensor dalam suatu sistem IoT. 
      Misalnya, jika Anda memiliki jaringan sensor dengan berbagai jenis sensor, grafik pie dapat menunjukkan berapa banyak sensor dari masing-masing jenis.
    </p>

    <p>
      3. Pemantauan Status Perangkat: Dalam situasi di mana Anda ingin memvisualisasikan status perangkat IoT, seperti perbandingan perangkat yang aktif, 
      perangkat dalam pemeliharaan, dan perangkat yang sedang mati, grafik pie dapat digunakan untuk memperlihatkan persentase masing-masing status.
    </p>

    <p>
      Namun, perlu diingat bahwa penggunaan grafik pie dalam banyak konteks IoT mungkin tidak efektif. 
      Ini karena grafik pie cenderung lebih cocok untuk situasi di mana Anda memiliki beberapa kategori yang tidak terlalu banyak dan persentase relatifnya mudah dipahami. 
      Dalam IoT, data seringkali bersifat kontinu atau berkisar pada banyak titik data, yang dapat sulit direpresentasikan dengan baik dalam bentuk grafik pie. 
      Oleh karena itu, alternatif visualisasi data seperti grafik garis, batang, atau scatter plot mungkin lebih cocok dalam banyak kasus IoT.
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
          <script src="https://gist.github.com/bimabs28/89c02f52feefb5cb1ea4d98aaf610147.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="controller">
          <script src="https://gist.github.com/bimabs28/327015dff12b3bc1bc02c7ab4b5e3526.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="chart_controller">
          <script src="https://gist.github.com/bimabs28/f4884bc3d5a7682fd729b55f150e2982.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="view">
          <script src="https://gist.github.com/bimabs28/6368e3b3a2361c882a2069fa9e582d1c.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="query">
          <script src="https://gist.github.com/bimabs28/cb2d39b703a7ccbb001b2f734e09718a.js"></script>
        </div>
      </div>
    </div>
  </div>

  <style>
    @import url('https://cdn.rawgit.com/lonekorean/gist-syntax-themes/d49b91b3/stylesheets/one-dark.css');

    #ecChart {
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
  <h1 class="fw-bold">Cara Membuat Pie Chart secara Real Time</h1>

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
    5. View disini dalam blade.php yang berfungsi untuk menampilkan bar chart
  </p>
  
  <p>
    6. Kode SQL atau query diatas memasukkan data dengan nilai acak ke dalam kolom 
    "electrical_conductivity" dan menambahkan waktu saat ini ke dalam kolom "time_ec" dalam tabel "tbl_ec." 
    Hal ini sering digunakan untuk menambahkan data simulasi atau data sensor ke dalam tabel dalam basis data.
    Kode SQL ini ditambahkan dalam "Event Scheduler" dalam phpmyadmin.
  </p>

  <p>
    <a href="https://github.com/bimabs28/piechart-realtime">GitHub Pie chart real time</a>
  </p>

  <script>
    var labels = @json($labels);
    var electrical_conductivity = @json($electrical_conductivity);

    var ctx = document.getElementById("ecChart").getContext('2d');
    var ecChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: labels,
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
          addData(ecChart, data['time_ec'], data['electrical_conductivity'])
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    }, 10000);
  </script>
@endsection

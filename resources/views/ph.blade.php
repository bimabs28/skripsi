@extends('adminlte')

@section('content')
  <canvas id="phChart"></canvas>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

  <div class="container">
    <h1 class="fw-bold">Bar Chart</h1>
    <p>Bar chart adalah jenis visualisasi data yang sering digunakan dalam Internet of Things (IoT) untuk menganalisis 
      dan mempresentasikan data yang berhubungan dengan sensor, perangkat, atau aplikasi IoT. 
      Berikut ini adalah beberapa contoh penggunaan bar chart dalam IoT:
    </p>

    <p>
      1. Monitoring Konsumsi Energi: IoT sering digunakan untuk mengukur dan mengelola konsumsi energi di berbagai konteks, termasuk rumah pintar dan industri. 
      Bar chart dapat digunakan untuk membandingkan konsumsi energi antara perangkat, area, atau periode waktu tertentu, 
      memungkinkan pemilik atau pengelola untuk mengidentifikasi sumber konsumsi yang signifikan.
    </p>

    <p>
      2. Pemantauan Kualitas Udara: Sensor kualitas udara IoT dapat mengukur berbagai parameter seperti partikel debu, konsentrasi gas, atau indeks polusi. 
      Bar chart dapat digunakan untuk membandingkan tingkat parameter tersebut di lokasi yang berbeda atau selama periode waktu yang berbeda.
    </p>

    <p>
      3. Keadaan Sumber Daya: IoT digunakan untuk mengelola sumber daya seperti air, listrik, atau bahan bakar. 
      Bar chart dapat membantu dalam membandingkan penggunaan sumber daya antara berbagai entitas, 
      seperti perangkat atau bangunan, dan mengidentifikasi pola penggunaan yang tidak efisien.
    </p>

    <p>
      4. Monitoring Kualitas Air dalam Pertanian: Dalam pertanian berbasis IoT, bar chart dapat digunakan untuk membandingkan parameter seperti tingkat 
      kelembaban tanah atau kandungan nutrisi dalam tanaman pada berbagai lokasi pertanian.
    </p>

    <p>
      5. Pemantauan Stok Barang: IoT dapat digunakan untuk memantau stok barang di gudang atau toko. Bar chart dapat membantu dalam melacak stok barang yang tersedia, 
      membandingkannya dengan pesanan, dan mengidentifikasi barang yang perlu diisi ulang.
    </p>

    <p>
      6. Keamanan IoT: Bar chart dapat digunakan untuk menganalisis data keamanan seperti jumlah serangan siber yang berhasil diblokir, 
      jenis serangan yang paling umum, atau tingkat lalu lintas jaringan yang mencurigakan.
    </p>

    <p>
      Bar chart membantu dalam membandingkan data dengan cara yang mudah dipahami, yang sangat penting dalam pengambilan keputusan dan pemantauan IoT. 
      Mereka juga membantu dalam mengidentifikasi tren, perbedaan, dan pola dalam data, 
      yang bisa menjadi dasar untuk pengoptimalan dan perbaikan berkelanjutan dalam solusi IoT.
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
          <script src="https://gist.github.com/bimabs28/fab5d74cf1af0e61330980ee01941f1e.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="controller">
          <script src="https://gist.github.com/bimabs28/a3e8130b9e08a377b0e9bfbf8c3047de.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="chart_controller">
          <script src="https://gist.github.com/bimabs28/f4884bc3d5a7682fd729b55f150e2982.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="view">
          <script src="https://gist.github.com/bimabs28/e52f670df96fcbfff6797f207b471bc5.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="query">
          <script src="https://gist.github.com/bimabs28/62681dfc5ebee1025395cb2233fd0238.js"></script>
        </div>
      </div>
    </div>
  </div>

  <style>
    @import url('https://cdn.rawgit.com/lonekorean/gist-syntax-themes/d49b91b3/stylesheets/one-dark.css');

    #phChart {
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
  <h1 class="fw-bold">Cara Membuat Bar Chart secara Real Time</h1>

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
    "ph_level" dan menambahkan waktu saat ini ke dalam kolom "time_ph" dalam tabel "tbl_ph." 
    Hal ini sering digunakan untuk menambahkan data simulasi atau data sensor ke dalam tabel dalam basis data.
    Kode SQL ini ditambahkan dalam "Event Scheduler" dalam phpmyadmin.
  </p>

  <p>
    <a href="https://github.com/bimabs28/barchart-realtime">GitHub Bar chart real time</a>
  </p>

  <script>
    var labels = @json($labels);
    var ph_data = @json($ph_data);
    var ctx = document.getElementById("phChart").getContext('2d');
    var phChart = new Chart(ctx, {
      type: 'bar',
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
          addData(phChart, data['time_ph'], data['ph_level'])
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    }, 10000);
    //end of realtime chart ph
  </script>
@endsection

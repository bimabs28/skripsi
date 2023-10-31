@extends('adminlte')

@section('content')
  <canvas id="phChart"></canvas>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

  <div class="container">
    <h1 class="fw-bold">Lorem Ipsum</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat voluptatibus quod, dicta error reiciendis explicabo
      facere minus vero molestias, neque eaque totam incidunt excepturi quisquam, dolores eligendi? Qui, ut architecto!
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
          <button class="nav-link tablink" onclick="openContent(event, 'view')">View</button>
        </li>
      </ul>
      <div class="card-body">
        <div class="p-3 tabcontent card-body" id="model">
          <script src="https://gist.github.com/bimabs28/fab5d74cf1af0e61330980ee01941f1e.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="controller">
          <script src="https://gist.github.com/bimabs28/a3e8130b9e08a377b0e9bfbf8c3047de.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="view">
          <script src="https://gist.github.com/bimabs28/e52f670df96fcbfff6797f207b471bc5.js"></script>
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
          addData(phChart, data['time_ph'], data['ph_level'])
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    }, 10000);
    //end of realtime chart ph
  </script>
@endsection

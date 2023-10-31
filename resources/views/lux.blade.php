@extends('adminlte')

@section('content')
  <canvas id="luxChart"></canvas>
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
          <script src="https://gist.github.com/bimabs28/ff0f81325d7c5e54a6cb59f342985268.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="controller">
          <script src="https://gist.github.com/bimabs28/ac0bc2a64fb8f3a7045fc4f079661376.js"></script>
        </div>
        <div class="p-3 tabcontent card-body" id="view">
          <script src="https://gist.github.com/bimabs28/600a88fcf2f17bc4b513b6764ade8dab.js"></script>
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

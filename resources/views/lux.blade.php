@extends('adminlte')

@section('content')
<canvas id="luxChart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

<!DOCTYPE html>
<html>
<head>
    <title>Code Snippets with Copy Button</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
  <pre id="myPreTag">var labels = ($labels);
    var lux = ($lux);
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
//end of realtime chart lux</pre>
</body>
</html>

<style>

pre {
  position: relative;
  background: #ffffff;
  padding: 10px;
  font-size: 15px;
  word-wrap: break-word;
  white-space: pre-wrap;
  border: 1px solid #e6e7e9;
  max-width: 1500px;
}

.copy-button {
  position: absolute;
  top: 2px;
  right: 10px;
  cursor: pointer;
  color: #fff;
  background: gray;
  border-radius: 0.5em;
  padding: 2px 7px;
}

.copy-button:hover {
  color: #000;
}
</style>

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
    setTimeout(function(){
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
        addData(luxChart,data['time_lux'], data['lux_data'])
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
}, 10000);
//end of realtime chart lux
</script>
@endsection
<!DOCTYPE html>
<html>
<head>
    <title>ThingSpeak Data Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
            color: white;
        }
        body{
            background: #A4DDED;
            
        }
        .header{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 16px 10%;
            background: transparent;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
            box-shadow: 0 5px 10px rgba(0,0,0,.1);
        }

        .logo{
            font-size: 25px;
            color: #224C98;
            text-decoration: none;
            font-weight: 600;   
        }
        .chat-container{
            
            width: 1100px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin:auto;
            margin-top: 120px;
        }
        canvas{
            padding:30px;
            margin: 20px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 30px;
            
        }

    </style>
</head>
<body>
    <header class="header">
        <a href="http://localhost/web%20application/welcome.php" class="logo">BACK</a>
    </header>

    <div class="chat-container">
    <!--Body Temperature-->
    <h2>Body Temperature</h2>
    <canvas id="myChart1" style="width: 200px;"></canvas>

    <!--SpO2 Level-->
    <h2>SpO2 Level</h2>
    <canvas id="myChart2"></canvas>

    <!--Heart Rate-->
    <h2>Heart Rate</h2>
    <canvas id="myChart3"></canvas>

    <!--Blood Pressure-->
    <h2>Blood Pressure</h2>
    <canvas id="myChart4"></canvas>

    </div>

    <button class="btn" onclick="downloadPDF()">Download PDF</button>

    <script>
    function downloadPDF() {
      // Create a new hidden form
      var form = document.createElement('form');
      form.setAttribute('method', 'post');
      form.setAttribute('action', 'generate_pdf.php');

      // Add the current URL as a parameter
      var urlInput = document.createElement('input');
      urlInput.setAttribute('type', 'hidden');
      urlInput.setAttribute('name', 'url');
      urlInput.setAttribute('value', window.location.href);
      form.appendChild(urlInput);

      // Submit the form
      document.body.appendChild(form);
      form.submit();
      document.body.removeChild(form);
    }
    </script>

    <script>
    // Replace these variables with your own values
    var channel_id =  2173061; // Replace with your channel ID.
    var api_key = '16ZORQW1SAR414EU'; // Replace with your Read API Key.

    // Define an array of field numbers for each chart
    var field_numbers = [1, 2, 3, 4];

    // Loop through the field_numbers array to create and update each chart
    field_numbers.forEach(function(field_number, index) {
        var url = 'https://api.thingspeak.com/channels/' + channel_id + '/fields/' + field_number + '.json?api_key=' + api_key + '&results=60';

        var ctx = document.getElementById('myChart' + (index + 1)).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line', // Replace with the type of chart you want.
            data: {
                labels: [],
                datasets: [{
                    label: 'Patient Details', // Replace with the name of your dataset.
                    data: [],
                    tension: 0, 
                }]
            },
            options: {
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Date & Time'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: getChartYAxisLabel(index + 1)
                        }
                    }
                }
            }
        });

        function getChartYAxisLabel(chartIndex) {
            switch (chartIndex) {
                case 1:
                    return 'Temperature (°C)';
                case 2:
                    return 'SpO2 (%)';
                case 3:
                    return 'Heart Rate (bpm)';
                case 4:
                    return 'Blood Pressure (mmHg)';
                default:
                    return '';
            }
        }

        function updateChart() {
            fetch(url)
            .then(response => response.json())
            .then(data => {
                myChart.data.labels = data.feeds.map(feed => feed.created_at);
                myChart.data.datasets[0].data = data.feeds.map(feed => feed['field' + field_number]);
                myChart.update();
            })
            .catch(error => console.log('Error:', error));
        }

        setInterval(updateChart, 300000); // Fetch new data every 300 seconds. You can adjust this as needed.

        // Fetch data and update the chart when the page is loaded.
        updateChart();
    });
    </script>
</body>
</html>

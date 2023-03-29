
<?php
// database connection
$con = mysqli_connect("localhost","root","","test1");

// check connection
if (mysqli_connect_error()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// query to retrieve data from the database
$query = "SELECT location, COUNT(*) AS count FROM users GROUP BY location";

// execute the query
$result = mysqli_query($con, $query);

// create an array to hold the data for the chart
$data = array();

// loop through the result set and add data to the array
while ($row = mysqli_fetch_assoc($result)) {
  $data[$row['location']] = (int)$row['count'];
}

// close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Locations Chart</title>
  <!-- include Chart.js library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div style="width: 50%">
    <canvas id="myChart"></canvas>
  </div>
  <script>
    // create the chart using the data array
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode(array_keys($data)); ?>,
            datasets: [{
                label: 'User Locations',
                data: <?php echo json_encode(array_values($data)); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
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
  </script>
</body>
</html>


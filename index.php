<?php

require_once('../config/db.php');
$query = "select * from users";
$result = mysqli_query($con,$query)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Fetch data from database</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Fetch Data From Php Database</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr class="bg-dark text-white">
                                <td>User Id</td>
                                <td>No.of dependants</td>
                                <td>Phone</td>
                                <td>Location</td>
                            </tr>
                            <tr>
                                <?php
                                while($row = mysqli_fetch_assoc($result))
                                {
                                ?>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['number of dependants']?></td>
                                    <td><?php echo $row['phone']?></td>
                                    <td><?php echo $row['location']?></td>
                            </tr>
                                <?php
                                }
                                ?>
                         </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
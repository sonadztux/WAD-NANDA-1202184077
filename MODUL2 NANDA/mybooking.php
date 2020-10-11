<?php
$name = $_POST['name'];
$date = $_POST['date'];
$duration = $_POST['duration'];
$checkout =  date('d/m/yy', strtotime($date . '+' . $duration . 'day'));
$date = date('d/m/yy', strtotime($_POST['date']));
$roomtype = $_POST['roomtype'];
$roomservice = $_POST['roomservice'];
$breakfast = $_POST['breakfast'];
$phone_number = $_POST['phone_number'];
if($roomtype == "Standard"){
    $roomprice = $duration*90;
}else if($roomtype == "Superior"){
    $roomprice = $duration*120;
}else{
    $roomprice = $duration*200;
}    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Booking | Studi Kasus Modul 2 Praktikum WAD</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="navbar-collapse collapse justify-content-center order-2" id="collapsingNavbar">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-dark" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="booking.php">Booking</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Booking Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Check-in</th>
                    <th scope="col">Check-out</th>
                    <th scope="col">Room Type</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Service</th>
                    <th scope="col">Total Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= rand(1,10) ?></th>
                    <td><?= $name ?></td>
                    <td><?= $date ?></td>
                    <td><?= $checkout ?></td>
                    <td><?= $roomtype ?></td>
                    <td><?= $phone_number ?></td>
                    <td>
                        <ul>
                            <?php 
                                if(isset($roomservice)){
                                    echo "<li>Room Services</li>";
                                    $roomprice += 20;
                                }
                                if(isset($breakfast)){
                                    echo "<li>Breakfast</li>";
                                    $roomprice += 20;
                                }
                            ?>
                        </ul>
                    </td>
                    <td><?= "$" . $roomprice ?></td>
                </tr>
            </tbody>
        </table>
    </div>



    <!-- FOOTER -->
    <div class="fixed-bottom text-center text-muted m-2">
        <a href="http://github.com/sonadztux" target="_blank">@sonadztux</a> | meh.
    </div>


    <!-- BOOTSTRAP JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

</body>

</html>
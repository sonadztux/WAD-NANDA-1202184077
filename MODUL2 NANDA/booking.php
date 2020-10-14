<?php
$room = $_GET['room']
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking | Studi Kasus Modul 2 Praktikum WAD</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

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
        <div class="row">
            <div class="col">
                <form method="POST" action="mybooking.php">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Check-In</label>
                        <input type="date" class="form-control" name="date" id="date" required>
                        <!-- <input id="datepicker" class="form-control" name="date" placeholder="dd/mm/yyyy"/> -->
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration" aria-describedby="durationHelp" required>
                        <small id="durationHelp" class="form-text text-muted">Day(s)</small>
                    </div>
                    <div class="form-group">
                        <label for="roomtype">Room Type</label>
                        <?php
                        if ($room == "standard") {
                            echo "<input type='text' class='form-control' name='roomtype' value='Standard' readonly>";
                        } else if ($room == "superior") {
                            echo "<input type='text' class='form-control' name='roomtype' value='Superior' readonly>";
                        } else if ($room == "luxury") {
                            echo "<input type='text' class='form-control' name='roomtype' value='Luxury' readonly>";
                        } else {
                            echo "<select class='form-control' id='roomtype' name='roomtype' required>";
                            echo '<option value="Standard">Standard</option>
                                        <option value="Superior">Superior</option>
                                        <option value="Luxury">Luxury</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="add_services">Add Service(s)</label>
                        <small id="price_service" class="form-text text-muted">$ 20/Service</small>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="roomservice" id="roomservice" name="roomservice">
                            <label class="form-check-label" for="roomservice">
                                Room Service
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="breakfast" id="breakfast" name="breakfast">
                            <label class="form-check-label" for="breakfast">
                                Breakfast
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="number" class="form-control" id="phone_number" name="phone_number" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Book</button>
                </form>

            </div>
            <div class="col">
                <?php
                if ($room == "standard") {
                    echo "<img src='static/img/standard_room.jpeg' alt='Standard Room' width='350px' height='350px'/>";
                } else if ($room == "superior") {
                    echo "<img src='static/img/superior_room.jpeg' alt='Superior Room' width='350px' height='350px'/>";
                } else if ($room == "luxury") {
                    echo "<img src='static/img/luxury_room.jpeg' alt='Luxury Room' width='350px' height='350px'/>";
                } else {
                    echo "<img src='static/img/standard_room.jpeg' alt='Standard Room' width='350px' height='350px'/>";
                }
                ?>
            </div>
        </div>
    </div>



    <!-- FOOTER -->
    <div class="fixed-bottom text-center text-muted m-2">
        <a href="http://github.com/sonadztux" target="_blank">@sonadztux</a> | meh.
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>


</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Studi Kasus Modul 2 Praktikum WAD</title>

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

    <div class="container mt-3">
        <div class="container text-center">
            <div class="text-info">
                <h3>EAD HOTEL</h3>
                <h6>Welcome To 5 Star Hotel</h6>
            </div>
        </div>
        <div class="container mt-5">
            <form action="booking.php" method="post">
                <div class="form-row">
                    <div class="col">
                        <div class="card text-center" style="width: 18rem;">
                            <img class="card-img-top" src="static/img/standard_room.jpeg" alt="Card image cap" height="230px">
                            <div class="card-body">
                                <h4 class="card-title">Standard</h4>
                                <h5 class="card-title text-info">$ 90/Day</h5>
                                <div class="card-header mt-5">
                                    Facilities
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">1 Single Bed</li>
                                    <li class="list-group-item">1 Bathroom</li>
                                </ul>
                            </div>
                            <div class="card-footer bg-light border">
                                <button type="submit" name="room" value="standard" class="btn btn-primary">Book Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-center" style="width: 18rem;">
                            <img class="card-img-top" src="static/img/superior_room.jpeg" alt="Card image cap" height="230px">
                            <div class="card-body">
                                <h4 class="card-title">Superior</h4>
                                <h5 class="card-title text-info">$ 150/Day</h5>
                                <div class="card-header mt-5">
                                    Facilities
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">1 Double Bed</li>
                                    <li class="list-group-item">1 Television and Wi-Fi</li>
                                    <li class="list-group-item">1 Bathroom with hot water</li>
                                </ul>
                            </div>
                            <div class="card-footer bg-light border">
                                <button type="submit" name="room" value="superior" class="btn btn-primary">Book Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-center" style="width: 18rem;">
                            <img class="card-img-top" src="static/img/luxury_room.jpeg" alt="Card image cap" height="230px">
                            <div class="card-body">
                                <h4 class="card-title">Luxury</h4>
                                <h5 class="card-title text-info">$ 200/Day</h5>
                                <div class="card-header mt-5">
                                    Facilities
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">2 Double Bed</li>
                                    <li class="list-group-item">1 Bathroom with hot water</li>
                                    <li class="list-group-item">1 Kitchen</li>
                                    <li class="list-group-item">1 Television and Wi-Fi</li>
                                    <li class="list-group-item">1 Workroom</li>
                                </ul>
                            </div>
                            <div class="card-footer bg-light border">
                                <button type="submit" name="room" value="luxury" class="btn btn-primary">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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
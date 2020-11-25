<?php
include("config.php");

if (!isset($_SESSION["is_login"])) {
    header("location: login.php");
}

$message = "";
if (isset($_POST["tambah"])) {
    $nama_barang = $_POST["nama_barang"];
    $user_id = $_SESSION["user_id"];
    $harga = $_POST["harga"];

    $query = "INSERT INTO cart VALUES (NULL, $user_id, '$nama_barang', $harga)";
    $result = mysqli_query($conn, $query);

    $message = "Barang berhasil ditambahkan ke keranjang";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Bosan TP</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- FONT AWESOME -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body class="bg-dark">

    <?php if ($_COOKIE["navbar"] == "light") : ?>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand mr-auto" href="index.php">Bosan TP</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-info" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item">
                        <span class="navbar-text">Selamat Datang, </span>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-info" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION["nama"] ?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    <?php else : ?>
        <nav class="navbar navbar-expand-sm navbar-dark bg-info">
            <a class="navbar-brand mr-auto" href="index.php">Bosan TP</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item">
                        <span class="navbar-text text-white">Selamat Datang, </span>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION["nama"] ?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    <?php endif; ?>

    <div class="container mt-3">
        <?php if ($message) : ?>
            <div class="row justify-content-center">
                <div class="alert alert-warning w-100" role="alert">
                    <?= $message ?>
                </div>
            </div>
        <?php endif; ?>

        <table class="table table-dark table-bordered">
            <thead class="bg-info text-center">
                <tr>
                    <th colspan="3">
                        <h3>WAD !Beauty</h3>
                        <p>Tersedia Skin Care dengan harga murah tapi bukan murahan dan berkualitas</p>
                    </th>
                </tr>
            </thead>
            <tbody class="text-dark">
                <tr>
                    <td>
                        <div class="card">
                            <form method="POST">
                                <img class="card-img-top" src="static/img/longcat.png" height="200px">
                                <div class="card-body">
                                    <h5 class="card-title">YUJA NIACIN 30 DAYS BLEMISH CARE SERUM</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti error veritatis, quia asperiores qui at nisi iste corporis, perspiciatis, dolorem optio? Mollitia voluptatem obcaecati eveniet explicabo saepe quas repellendus quia?</p>
                                    <hr>
                                    Rp169.000
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="nama_barang" value="YUJA NIACIN 30 DAYS BLEMISH CARE SERUM">
                                    <input type="hidden" name="harga" value="169000">
                                    <button type="submit" name="tambah" class="btn btn-info btn-block">Tambahkan ke Keranjang</button>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="card">
                            <form method="POST">
                                <img class="card-img-top" src="static/img/pokemon_momen.jpg" height="200px">
                                <div class="card-body">
                                    <h5 class="card-title">SOMEBYMI Snail Truecica Miracle Repair Cream</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti error veritatis, quia asperiores qui at nisi iste corporis, perspiciatis, dolorem optio? Mollitia voluptatem obcaecati eveniet explicabo saepe quas repellendus quia?</p>
                                    <hr>
                                    Rp180.000
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="nama_barang" value="SOMEBYMI Snail Truecica Miracle Repair Cream">
                                    <input type="hidden" name="harga" value="180000">
                                    <button type="submit" name="tambah" class="btn btn-info btn-block">Tambahkan ke Keranjang</button>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="card">
                            <form method="POST">
                                <img class="card-img-top" src="static/img/longcat.png" height="200px">
                                <div class="card-body">
                                    <h5 class="card-title">30 DAYS MIRACLE TONER SKIN CARE</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti error veritatis, quia asperiores qui at nisi iste corporis, perspiciatis, dolorem optio? Mollitia voluptatem obcaecati eveniet explicabo saepe quas repellendus quia?</p>
                                    <hr>
                                    Rp108.000
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="nama_barang" value="30 DAYS MIRACLE TONER SKIN CARE">
                                    <input type="hidden" name="harga" value="108000">
                                    <button type="submit" name="tambah" class="btn btn-info btn-block">Tambahkan ke Keranjang</button>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
                </form>
            </tbody>
        </table>
    </div>

</body>

</html>
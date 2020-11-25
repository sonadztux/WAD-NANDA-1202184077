<?php
session_start();
include("config.php");

if (!isset($_SESSION["is_login"])) {
    header("location: login.php");
}

$id = $_SESSION["user_id"];
$message = "";

if (isset($_POST["update"])) {
    $nama = $_POST["nama"];
    $nohp = $_POST["nohp"];
    $navbar = $_POST["navbar"];

    setcookie("navbar", $navbar, strtotime('+1 days'), '/');

    if (!empty($_POST["sandi"]) && !empty($_POST["confirmsandi"])) {
        if ($_POST["sandi"] === $_POST["confirmsandi"]) {
            $sandi = password_hash($_POST["sandi"], PASSWORD_DEFAULT);

            $query = "UPDATE user SET nama='$nama', no_hp=$nohp, password='$sandi', WHERE id=$id";
            $update = mysqli_query($conn, $query);
            if ($update) {
                $_SESSION["nama"] = $nama;
                $message = "Profil berhasil diperbarui";
            }
        } else {
            $message = "Gagal: kata sandi dan konfirmasi kata sandi tidak sesuai!";
        }
    } else {
        $query = "UPDATE user SET nama='$nama', no_hp=$nohp WHERE id=$id";
        $update = mysqli_query($conn, $query);
        if ($update) {
            $_SESSION["nama"] = $nama;
            $message = "Profil berhasil diperbarui";
        }
    }
}

$result = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Bosan TP</title>

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

    <div class="container mt-4">
        <?php if ($message) : ?>
            <div class="row justify-content-center">
                <div class="alert alert-warning w-50" role="alert">
                    <?php print_r($message) ?></a>
                </div>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="card w-50">
                <div class=" card-header text-center" ?update=>
                    <h3>Profile</h3>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="email" value="<?= $user["email"] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user["nama"] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nohp" class="col-sm-3 col-form-label">Nomor Handphone</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="nohp" name="nohp" value="<?= $user["no_hp"] ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="sandi" class="col-sm-3 col-form-label">Kata Sandi</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="sandi" name="sandi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirmsandi" class="col-sm-3 col-form-label">Konfirmasi Kata Sandi</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="confirmsandi" name="confirmsandi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="navbar" class="col-sm-3 col-form-label">Warna Navbar</label>
                            <div class="col-sm-3">
                                <select id="navbar" name="navbar" class="form-control">
                                    <option value="default">Default</option>
                                    <option value="light">Light</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="update" class="btn btn-info btn-block">Submit</button>
                        <a class="btn btn-secondary btn-block" href="index.php" role="button">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

</body>

</html>
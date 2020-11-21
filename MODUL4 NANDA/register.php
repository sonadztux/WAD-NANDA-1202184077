<?php
session_start();
include("config.php");

if (isset($_SESSION["is_login"])) {
    header("location: index.php");
}

$message = "";
if (isset($_POST["register"])) {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $nohp = $_POST["nohp"];
    $sandi = $_POST["sandi"];
    $confirmsandi = $_POST["confirmsandi"];

    if ($sandi == $confirmsandi) {
        $sandi = password_hash($_POST["sandi"], PASSWORD_DEFAULT);
        $confirmsandi = password_hash($_POST["confirmsandi"], PASSWORD_DEFAULT);
        $query = "SELECT email FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        if (!$result->num_rows) {
            $query = "INSERT INTO user VALUES (NULL, '$nama', '$email', '$nohp', '$sandi')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $message = "Registrasi berhasil";
            } else {
                $message = "Registrasi gagal";
            }
        } else {
            $message = "Registrasi gagal: email sudah pernah didaftarkan!";
        }
    } else {
        $message = "Kata sandi dan konfirmasi kata sandi tidak sesuai!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Bosan TP</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body class="bg-dark">

    <nav class="navbar navbar-expand-sm navbar-dark bg-info">
        <a class="navbar-brand mr-auto" href="index.php">Bosan TP</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light btn btn-outline-dark" href="login.php">Login</a>
                </li>
                &nbsp;
                <li class="nav-item">
                    <a class="nav-link text-light btn btn-outline-dark" href="register.php">Register</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-3">
        <?php if ($message) : ?>
            <?php if (strpos($message, "berhasil")) : ?>
                <div class="row justify-content-center">
                    <div class="alert alert-warning w-100" role="alert">
                        <?= $message ?> Silakan <a class="alert-link" href="login.php"><strong>Login</strong></a>
                    </div>
                </div>
            <?php else : ?>
                <div class="row justify-content-center">
                    <div class="alert alert-danger w-100" role="alert">
                        <?= $message ?>
                    </div>
                </div>
            <?php endif ?>
        <?php endif; ?>
        <div class="row">
            <div class="col">
                <img src="static/img/pokemon_momen.jpg" class="img-fluid" alt="Pokemon moment">
                <h1 class="text-white text-center">PIKA PIKA PIKA PIKA PIKA<br>PIKA PIKA PIKA PIKA PIKA<br>PIKA PIKA PIKA PIKA PIKA<br>PIKA PIKA PIKA PIKA PIKA</h1>
            </div>
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header text-center">
                        <h3>Register</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama kamu">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email kamu">
                            </div>
                            <div class="form-group">
                                <label for="nohp">No. Handphone</label>
                                <input type="number" class="form-control" id="nohp" name="nohp" placeholder="Masukkan no hp kamu">
                            </div>
                            <div class="form-group">
                                <label for="sandi">Kata Sandi</label>
                                <input type="password" class="form-control" id="sandi" name="sandi" placeholder="Masukkan kata sandi">
                            </div>
                            <div class="form-group">
                                <label for="confirmsandi">Konfirmasi Kata Sandi</label>
                                <input type="password" class="form-control" id="confrmsandi" name="confirmsandi" placeholder="Masukkan ulang kata sandi">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" name="register" class="btn btn-info">Daftar</button>
                            </div>
                            <div class="form-group text-center">
                                <span class="text-center">Sudah punya akun? <a href="login.php" class="text-info">Login</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
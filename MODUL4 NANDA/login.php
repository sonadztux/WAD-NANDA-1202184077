<?php
session_start();
include("config.php");

if(isset($_SESSION["is_login"])) {
    header("location: index.php");
}

if(isset($_COOKIE["username"])) {
    header("location: index.php");
}

$message = "";
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $sandi = $_POST["sandi"];
    if(isset($_POST["remember_me"])) {
        $remember_me = TRUE;
    }else{
        $remember_me = FALSE;
    }
    
    $query = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows == 1) {
        $message = "Gagal login: user tidak ditemukan!";
    } else {
        $user = mysqli_fetch_assoc($result);
        if(password_verify($sandi, $password)) {
            if($remember_me){
                setcookie("email", $user["email"], strtotime('+1 days'), '/');
            }
            setcookie("navbar", "default", strtotime('+1 days'), '/');
            $_SESSION["is_login"] = TRUE;
            $_SESSION["user_id"] = $id;
            $_SESSION["nama"] = $nama;
            header("location: index.php");
        }else{
            $message = "Email atau kata sandi salah!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Bosan TP</title>

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

    <div class="container mt-4">
        <?php if ($message) : ?>
            <div class="row justify-content-center">
                <div class="alert alert-danger w-100" role="alert">
                    <?= $message ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col">
                <img src="static/img/longcat.png" class="img-fluid" alt="Pokemon moment">
                <h1 class="text-white text-center">BAAAAAAAAAA!<br>KAGET GA?</h1>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group form-control-lg mt-2 mb-5">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Masukkan email kamu">
                            </div>
                            <br>
                            <div class="form-group form-control-lg mb-5">
                                <label for="sandi">Kata Sandi</label>
                                <input type="password" class="form-control form-control-lg" id="sandi" name="sandi" placeholder="Masukkan kata sandi">
                            </div>
                            <div class="form-group form-control-lg">
                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="remember_me" name="remember_me">
                                    <label class="custom-control-label" for="remember_me">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group form-control-lg text-center">
                                <button type="submit" name="login" class="btn btn-info btn-lg btn-block">Login</button>
                            </div>
                            <br>
                            <div class="form-group text-center">
                                <span class="text-center">Belum punya akun? <a href="register.php" class="text-info">Registrasi</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php
include("config.php");

$message = "";
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $deskripsi = $_POST["deskripsi"];
    $kategori = $_POST["kategori"];
    $tanggal = $_POST["tanggal"];
    $mulai = $_POST["mulai"];
    $berakhir = $_POST["berakhir"];
    $tempat = $_POST["tempat"];
    $harga = $_POST["harga"];
    $benefit = implode(",", $_POST['benefit']);

    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg');
    $filename = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
        header("location:create_event.php?alert=file_extension_not_allowed");
    } else {
        if ($ukuran < 1044070) {
            $gambar = $rand . '_' . $filename;
            $query = "INSERT INTO event_table VALUES (NULL,'$name','$deskripsi','$gambar','$kategori','$tanggal','$mulai','$berakhir','$tempat','$harga','$benefit')";
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'static/img/' . $rand . '_' . $filename);
            mysqli_query($conn, $query);
            header("location:home.php?alert=success");
        } else {
            header("location:create_event.php?alert=file_size_exceeded");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Detail Event</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand text-white" href="home.php">EAD EVENTS</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="nav-link text-white" href="home.php">Home</a></li>
                <li class="nav-item active"><a class="nav-link btn btn-outline-light" href="create_event.php">Buat Event</a></li>
            </ul>
        </div>
    </nav>

    <h4 class="text-primary"><?= $message; ?></h4>

    <div class="container mt-4">
        <div class="row">
            <h4 class="text-info">Buat Event</h4>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-primary bg-danger"></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Upload Gambar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" aria-describedby="gambar" name="gambar">
                                        <label class="custom-file-label" for="gambar"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kategori" id="online" value="Online">
                                    <label class="form-check-label" for="online">Online</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kategori" id="offline" value="Offline">
                                    <label class="form-check-label" for="inlineRadio2">Offline</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-primary bg-primary"></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="mulai">Jam Mulai</label>
                                        <input type="time" class="form-control" id="mulai" name="mulai">
                                    </div>
                                    <div class="col">
                                        <label for="berakhir">Jam Berakhir</label>
                                        <input type="time" class="form-control" id="berakhir" name="berakhir">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tempat">Tempat</label>
                                <input type="text" class="form-control" id="tempat" name="tempat">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga">
                            </div>
                            <div class="form-group">
                                <label for="benefit">Benefit</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="snacks" value="Snacks" name="benefit[]">
                                    <label class="form-check-label" for="snacks">Snacks</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="sertifikat" value="Sertifikat" name="benefit[]">
                                    <label class="form-check-label" for="sertifikat">Sertifikat</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="souvenir" value="Souvenir" name="benefit[]">
                                    <label class="form-check-label" for="souvenir">Souvenir</label>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                <a class="btn btn-danger" href="home.php" role="button">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


</body>

</html>
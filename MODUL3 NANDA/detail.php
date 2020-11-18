<?php
include('config.php');

$id = $_GET["id"];
$query = "SELECT * FROM event_table WHERE id=$id";
$event_data = mysqli_query($conn, $query);

if (isset($_POST["update"])) {
    print_r($_POST);
    $id = $_POST["id"];
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
        header("location:detail.php?id=$id&alert=gagal_ekstensi");
    } else {
        if ($ukuran < 1044070) {
            $gambar = $rand . '_' . $filename;
            $query = "UPDATE event_table SET name='$name',deskripsi='$deskripsi',gambar='$gambar',kategori='$kategori',tanggal='$tanggal',mulai='$mulai',berakhir='$berakhir',tempat='$tempat',harga='$harga',benefit='$benefit' WHERE id=$id";
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'static/img/' . $rand . '_' . $filename);
            mysqli_query($conn, $query);
            header("location:detail.php?id=$id&alert=berhasil");
        } else {
            header("location:detail.php?id=$id&alert=gagal_ukuran");
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

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand text-white" href="home.php">EAD EVENTS</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="nav-link text-white" href="home.php">Home</a></li>
                <li class="nav-item active"><a class="nav-link btn btn-outline-light" href="create.php">Buat Event</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <h5 class="text-info">Detail Event!</h5>
        </div>
        <div class="row mt-4 justify-content-center">
            <?php while ($event = mysqli_fetch_assoc($event_data)) : ?>
                <div class="card mb-3">
                    <img class="card-img-top" src="static/img/<?= $event["gambar"] ?>" width="150px" height="250px" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $event["name"] ?></h5>
                        <p class="card-text"><strong>Deskripsi</strong><br><?= $event["deskripsi"] ?></p>
                        <div class="row">
                            <div class="col">
                                <p class="card-text"><strong>Informasi Event</strong></p>
                                <p class="card-text"><?= $event["tanggal"] ?></p>
                                <p class="card-text"><?= $event["tempat"] ?></p>
                                <p class="card-text"><?= $event["mulai"] ?> - <?= $event["berakhir"] ?></p>
                            </div>
                            <div class="col">
                                <p class="card-text"><strong>Benefit</strong></p>
                                <ul>
                                    <?php $benefits = explode(",", $event["benefit"]); ?>
                                    <?php foreach ($benefits as $benefit) : ?>
                                        <li>
                                            <p class="card-text"><?= $benefit ?></p>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div><br>
                        <p class="card-text"><strong>Kategori</strong> : <?= $event["kategori"] ?></p>
                        <p class="card-text"><strong>HTM</strong> : Rp<?= $event["harga"] ?></p>
                    </div>
                    <div class="card-footer text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Edit</button>
                        <a href="delete.php?id=<?= $event["id"] ?>" class="btn btn-danger" onclick="return confirm('Kamu yakin ingin menghapus data event?');">Delete</a>
                    </div>
                </div>

                <!-- EDIT MODAL -->
                <div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Content Event</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $event["id"] ?>">
                                <div class="modal-body">
                                    <div class="row mt-4">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header bg-danger"></div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="<?= $event["name"] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="deskripsi">Deskripsi</label>
                                                        <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"><?= $event["deskripsi"] ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gambar">Upload Gambar</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="gambar" aria-describedby="gambar" name="gambar" value="<?= $event["gambar"] ?>" required>
                                                                <label class="custom-file-label" for="gambar"><?= $event["gambar"] ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kategori">Kategori</label><br>
                                                        <?php if ($event["kategori"] == "Online") : ?>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="kategori" id="online" value="Online" checked>
                                                                <label class="form-check-label" for="online">Online</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="kategori" id="offline" value="Offline">
                                                                <label class="form-check-label" for="inlineRadio2">Offline</label>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="kategori" id="online" value="Online">
                                                                <label class="form-check-label" for="online">Online</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="kategori" id="offline" value="Offline" checked>
                                                                <label class="form-check-label" for="inlineRadio2">Offline</label>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header bg-primary"></div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="tanggal">Tanggal</label>
                                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $event["tanggal"] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="mulai">Jam Mulai</label>
                                                                <input type="time" class="form-control" id="mulai" name="mulai" value="<?= $event["mulai"] ?>">
                                                            </div>
                                                            <div class="col">
                                                                <label for="berakhir">Jam Berakhir</label>
                                                                <input type="time" class="form-control" id="berakhir" name="berakhir" <?= $event["berakhir"] ?>>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tempat">Tempat</label>
                                                        <input type="text" class="form-control" id="tempat" name="tempat" value="<?= $event["tempat"] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="harga">Harga</label>
                                                        <input type="number" class="form-control" id="harga" name="harga" value="<?= $event["harga"] ?>">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

</body>

</html>
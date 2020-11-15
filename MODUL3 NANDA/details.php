<?php
require 'functions.php';

$event = query("SELECT * FROM event_table");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Home</title>
</head>

<body>

    <nav class="navbar navbar-expand navbar-dark bg-info">
        <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" href="home.php"><b>EAD EVENTS</b><span class="sr-only">(current)</span></a>
            </div>
        </div>
        <div class="collapse navbar-collapse justify-content-end">
            <table style="width: 25%;">
                <form class="form-inline my-2 my-lg-0">
                    <tr>
                        <td>
                            <a href="home.php"><button class="btn btn-outline-light" type="button">Home</button></a>
                        </td>
                        <td>
                            <a href="buat_event.php"><button class="btn btn-outline-light" type="button">Buat Event</button></a>
                        </td>
                    </tr>
                </form>
            </table>
        </div>
    </nav>

    <div class="container">
        <h3 class="text-info text-center m-4">WELCOME TO EAD EVENTS!</h3>
        <?php $i = 1; ?>
        <?php foreach ($event as $row) : ?>

            <div class="row">
                <div class="col-sm">

                </div>
                <div class="col-sm-8">
                    <div class="card">
                        <img src="static/img/<?php echo $row['gambar'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row["name"] ?></h5>

                            <b>Deskripsi</b><br>
                            <p><?= $row["deskripsi"] ?></p>



                            <div class="row">
                                <div class="col-sm">
                                    <p><b>Informasi Event</b></p>
                                    <p class="card-text"><img src="static/img/calendar.png" alt="" width="20" height="20">&nbsp;&nbsp;&nbsp;&nbsp;<?= $row["tanggal"] ?></p>
                                    <p class="card-text"><img src="static/img/pin.png" alt="" width="20" height="25">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row["tempat"] ?></p>
                                    <p class="card-text"><img src="static/img/jam.png" alt="" width="20" height="20">&nbsp;&nbsp;&nbsp;&nbsp;<?= $row["mulai"] ?> - <?= $row["berakhir"] ?></p>
                                    <p class="card-text"><b>Kategori: </b> &nbsp;&nbsp; <?= $row["kategori"] ?></p>
                                    <p class="card-text"><b>HTM Rp. <?= $row["harga"] ?></b></p>
                                </div>

                                <div class="col-sm">
                                    <p class="card-text"><b>Benefit</b></p>
                                    <?= $row["benefit"] ?>
                                </div>
                            </div>




                            <hr>
                            <center>
                                <div class="row justify-content-md-center">
                                    <table style="width: 26%;">
                                        <tr>
                                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                                                    Edit
                                                </button></td>
                                            <td>
                                                <a href="delete.php?id=<?= $row["id"] ?>" onclick="return confirm('Do you want to delete?');"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Delete</button></a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </center>



                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Edit Content Event</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row row-cols-1 row-cols-md-2">
                                                <div class="col mb-4">
                                                    <div class="card">
                                                        <div class="card-header bg-primary bg-danger">

                                                        </div>

                                                        <div class="card-body">
                                                            <form action="" method="POST">
                                                                <div class="form-group">
                                                                    <label for="formGroupExampleInput">Name</label>
                                                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputGroupFile04">Upload Gambar</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <label for="inputGroupFile04">Upload</label>
                                                                            <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="gambar">
                                                                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inlineRadio1">Kategori</label><br>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" id="inlineRadio1" value="Online" name="kategori">
                                                                        <label class="form-check-label" for="inlineRadio1">Online</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" id="inlineRadio2" value="Offline" name="kategori">
                                                                        <label class="form-check-label" for="inlineRadio2">Offline</label>
                                                                    </div>
                                                                </div>
                                                                <br><br>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col mb-4">
                                                    <div class="card">
                                                        <div class="card-header bg-primary bg-secondary">

                                                        </div>

                                                        <div class="card-body">

                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput">Tanggal</label>
                                                                <input type="date" class="form-control" id="formGroupExampleInput" placeholder="" name="tanggal">
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="jammulai">Jam Mulai</label>
                                                                        <input type="time" class="form-control" placeholder="First name" id="jammulai" name="mulai">
                                                                    </div>

                                                                    <div class="col">
                                                                        <label for="jamakhir">Jam Berakhir</label>
                                                                        <input type="time" class="form-control" placeholder="Last name" id="jamakhir" name="berakhir">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput">Tempat</label>
                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="tempat">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput">Harga</label>
                                                                <input type="number" class="form-control" id="formGroupExampleInput" placeholder="" name="harga">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">Benefit</label><br>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Snacks" name="benefit">
                                                                    <label class="form-check-label" for="inlineCheckbox1">Snacks</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Sertifikat" name="benefit">
                                                                    <label class="form-check-label" for="inlineCheckbox2">Sertifikat</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Souvenir" name="benefit">
                                                                    <label class="form-check-label" for="inlineCheckbox3">Souvenir</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div style="text-align: right;">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <!-- <input class="btn btn-primary" type="submit" value="Submit" name="submitevent">
                                                                                            <input class="btn btn-danger" type="submit" value="Cancel" name="cancel"> -->
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>





                        </div>
                    </div>
                </div>
                <div class="col-sm">

                </div>
            </div>
            <?php $i++; ?>
        <?php endforeach; ?>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>
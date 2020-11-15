<?php

require 'functions.php';

if (isset($_POST["submitevent"])) {
  $name = $_POST['name'];
  $deskripsi = $_POST['deskripsi'];
  $gambar = $_POST['gambar'];
  $kategori = $_POST['kategori'];
  $tanggal = $_POST['tanggal'];
  $mulai = $_POST['mulai'];
  $berakhir = $_POST['berakhir'];
  $tempat = $_POST['tempat'];
  $harga = $_POST['harga'];
  $benefit = implode(',', $_POST['benefit']);
  $rand = rand();
  $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
  $filename = $_FILES['gambar']['name'];
  $ukuran = $_FILES['gambar']['size'];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);


  echo "
              <script>
                  alert('Data has Successfully Added!');
                  document.location.href = 'home.php';
              </script>
          ";

  for ($i = 0; $i < sizeof($benefit); $i++) {
    $query = "INSERT INTO event_table (benefit) VALUES ('" . $benefit . "')";
  }

  $rand = rand();
  $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
  $filename = $_FILES['gambar']['name'];
  $ukuran = $_FILES['gambar']['size'];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);

  if (!in_array($ext, $ekstensi)) {
    echo "<script>
            alert('yang anda upload bukan gambar');
          <script>";
  } else {
    if ($ukuran < 1000000) {
      $xx = $rand . '_' . $filename;
      move_uploaded_file($_FILES['gambar']['tmp_name'], 'static/img/' . $rand . '_' . $filename);
      mysqli_query($conn, "INSERT INTO event_table VALUES(NULL,'$name','$deskripsi','$xx','$kategori','$tanggal','$mulai','$berakhir','$tempat','$harga','$benefit')");
    } else {
      echo "<script>
        alert('gagal menambahkan ke database');
      <script>";
    }
  }
}


?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Buat Event</title>
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
    <h3 class="text-info m-4">Buat Event!</h3>
    <div class="row row-cols-1 row-cols-md-2">
      <div class="col mb-4">
        <div class="card">
          <div class="card-header bg-primary bg-danger">

          </div>

          <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
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
                    <label class="custom-file-label" for="inputGroupFile04"></label>
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
              <br><br><br><br>
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
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Snacks" name="benefit[]">
                <label class="form-check-label" for="inlineCheckbox1">Snacks</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Sertifikat" name="benefit[]">
                <label class="form-check-label" for="inlineCheckbox2">Sertifikat</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Souvenir" name="benefit[]">
                <label class="form-check-label" for="inlineCheckbox3">Souvenir</label>
              </div>
            </div>
            <div class="form-group">
              <div style="text-align: right;">
                <div class="row">
                  <div class="col">
                    <input class="btn btn-primary" type="submit" value="Submit" name="submitevent">
                    <a href="home.php"><input class="btn btn-danger" type="button" value="Cancel" name="cancel"></a>
                  </div>
                </div>
              </div>


            </div>

            </form>

          </div>
        </div>
      </div>
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
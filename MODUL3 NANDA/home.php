<?php

$event = query("SELECT * FROM event_table");
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Home</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

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

      <div class="card" style="width: 18rem;">
        <img src="static/img/<?php echo $row['gambar'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $row["name"] ?></h5>
          <br>
          <table>
            <tr>
              <td>
                <p class="card-text"><img src="static/img/calendar.png" alt="" width="20" height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row["tanggal"] ?></p>
                <p class="card-text"><img src="static/img/pin.png" alt="" width="20" height="25">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row["tempat"] ?></p>
              </td>
            </tr>
          </table>
          <br>

          <p class="card-text">Kategori : Event <?= $row["kategori"] ?></p>

          <hr>
          <div style="text-align: right;">
            <a href="details.php" class="btn btn-primary">Detail</a>
          </div>

        </div>
      </div>

      <?php $i++; ?>
    <?php endforeach; ?>
  </div>

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>
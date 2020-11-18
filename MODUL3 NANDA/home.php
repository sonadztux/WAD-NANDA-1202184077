<?php
include('config.php');
$query = "SELECT * FROM event_table";
$events = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home</title>

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
        <li class="nav-item active"><a class="nav-link btn btn-outline-light" href="create.php">Buat Event</a></li>
      </ul>
    </div>
  </nav>

  <div class="container mt-4">
    <div class="row justify-content-center">
      <h4 class="text-info"> WELCOME TO EAD EVENTS! </h4>
    </div>
    <div class="row mt-4">
      <?php while ($event = mysqli_fetch_assoc($events)) : ?>
        <div class="col">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="static/img/<?= $event["gambar"]; ?>" height="170px">
            <div class="card-body">
              <h5 class="card-title"><?= $event["name"] ?></h5>
              <p class="card-text"><?= $event["tanggal"] ?></p>
              <p class="card-text"><?= $event["tempat"] ?></p>
              <p class="card-text">Kategori : Event <?= $event["kategori"] ?></p>
            </div>
            <div class="card-footer text-right">
              <a href="detail.php?id=<?= $event["id"] ?>" class="btn btn-primary">Detail</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>

</body>

</html>
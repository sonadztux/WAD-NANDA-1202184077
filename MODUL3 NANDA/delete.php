<?php
include('koneksi.php');

$id = $_GET["id"];
$query = "DELETE FROM event_table WHERE id=$id";
$delete = mysqli_query($conn, $query);

header('Location: home.php')
?>
<?php

require 'functions.php';

$id = $_GET["id"];

if(hapus($id) > 0) {

    echo "
      <script>
      alert('Data deleted successfully!');
      document.location.href = 'home.php';
      </script>";
}
else {
    echo "
      <script>
      alert('data was not deleted successfully!');
      document.location.href = 'details.php';
      </script>";
}
?>
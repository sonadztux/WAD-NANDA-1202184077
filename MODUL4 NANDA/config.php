<?php

$conn = mysqli_connect("localhost", "son", "1", "wad_modul4");

if (!$conn) {
    echo "<h6 style='color:red';>Database connection failed</h6>";
}
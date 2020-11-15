<?php

$conn = mysqli_connect("localhost", "son", "1", "wad_modul3_nanda");

function tambah($data)
{

    global $conn;
    $name = htmlspecialchars($data["name"]);
    $deskripsi  = htmlspecialchars($data["deskripsi"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $mulai = htmlspecialchars($data["mulai"]);
    $berakhir = htmlspecialchars($data["berakhir"]);
    $tempat = htmlspecialchars($data["tempat"]);
    $harga = htmlspecialchars($data["harga"]);
    $benefit = $data["benefit"];

    $bnf = "";
    foreach ($benefit as $bnf1) {
        $bnf .= $bnf1 . ",";
    }

    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($ext,$ekstensi) ) {
        echo "<script>
                alert('yang anda upload bukan gambar');
              <script>";
    }else{
        if($ukuran < 1044070){		
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'static/img/'.$rand.'_'.$filename);
            mysqli_query($conn, "INSERT INTO event_table VALUES(NULL,'$name','$deskripsi','$xx','$kategori','$tanggal','$mulai','$berakhir','$tempat','$harga','$benefit')");
            
        }else{
            echo "<script>
            alert('gagal menambahkan ke database');
          <script>";
        }



    }
}

function query($query)
{

    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM event_table WHERE id = $id");

    return mysqli_affected_rows($conn);
}

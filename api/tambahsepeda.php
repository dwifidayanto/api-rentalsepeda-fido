<?php
if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $kode = $_POST['kode'];
    $warna = $_POST['warna'];
    $jenis = $_POST['jenis'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];

    $filename = $_FILES['gambar']['name'];

    $filetmpname = $_FILES['gambar']['tmp_name'];

    // FOLDER DIMANA GAMBAR AKAN DI SIMPAN
			$folder = '../img/';
			// GAMBAR DI SIMPAN KE DALAM FOLDER
			move_uploaded_file($filetmpname, $folder . $filename);

    require_once 'connect.php';

    $sql = "INSERT INTO sepeda (kode, warna, jenis, merk, hargasewa, gambar) VALUES ('$kode','$warna','$jenis','$merk','$harga','$filename')";


    if( mysqli_query($conn, $sql) ) {
        $result["success"] = "1";
        $result["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);

    } else {

        $result["success"] = "0";
        $result["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
    }
}

?>

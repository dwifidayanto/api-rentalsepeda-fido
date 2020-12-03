<?php
if ($_SERVER['REQUEST_METHOD'] =='POST'){
   $id = $_POST['id'];
   $kode = $_POST['kode'];
   $merk = $_POST['merk'];
   $warna = $_POST['warna'];
   $jenis = $_POST['jenis'];
   $hargasewa = $_POST['hargasewa'];
  // $hargasewa  = $_POST['gambar'];
  $filename = $_FILES['gambar']['name'];

  $filetmpname = $_FILES['gambar']['tmp_name'];

    // FOLDER DIMANA GAMBAR AKAN DI SIMPAN
			$folder = '../img/';
			// GAMBAR DI SIMPAN KE DALAM FOLDER
			move_uploaded_file($filetmpname, $folder . $filename);

   require_once 'connect.php';

   $sql = "UPDATE sepeda SET kode='$kode',merk='$merk',jenis='$jenis', warna='$warna' , hargasewa='$hargasewa' , gambar='$filename' WHERE id = '$id'";

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

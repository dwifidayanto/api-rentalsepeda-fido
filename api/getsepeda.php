<?php
include "connect.php";  //menyambungkan ke database

if($_SERVER['REQUEST_METHOD']=='GET') {

//inisialiasi query READ
  $query = "SELECT * FROM sepeda ORDER BY KODE";
 $sql = mysqli_query($conn, $query);//pemanggilan fungsi mysqli_query untuk mengirimkan perintah sesuai parameter yang diisi
  $result = array(); //inisialisasi array dengan variabel $result

  while($row = mysqli_fetch_array($sql)){
    array_push($result, array(
    	'ID'=>$row[0],
      'KODE'=>$row[1],
    	'MERK'=>$row[2],
    	'WARNA'=>$row[3],
    	'JENIS'=>$row[4],
    	'HARGA'=>$row[5],
      'GAMBAR'=>$row[6],
    ));
  }//melakukan pengulangan dengan while untuk membaca seluruh data pada tabel mahasiswa, dan disimpan didalam row/baris. urutan row harus sesuai urutan pada database
  echo json_encode($result); //mengeluarkan data dalam bentuk json
  mysqli_close($conn);
//tutup koneksi
}
?>

<?php
include "connect.php";  //menyambungkan ke database

if($_SERVER['REQUEST_METHOD']=='GET') {

//inisialiasi query READ
  $query = "SELECT * FROM user WHERE roleuser = 'customer'";
 $sql = mysqli_query($conn, $query);//pemanggilan fungsi mysqli_query untuk mengirimkan perintah sesuai parameter yang diisi
  $result = array(); //inisialisasi array dengan variabel $result

  while($row = mysqli_fetch_array($sql)){
    array_push($result, array(
    	'id'=>$row[0],
      'username'=>$row[1],
    	'password'=>$row[2],
    	'email'=>$row[3],
    	'noktp'=>$row[4],
    	'nohp'=>$row[5],
    	'alamat'=>$row[6],
    	'roleuser'=>$row[7],
    ));
  }//melakukan pengulangan dengan while untuk membaca seluruh data pada tabel mahasiswa, dan disimpan didalam row/baris. urutan row harus sesuai urutan pada database
  echo json_encode($result); //mengeluarkan data dalam bentuk json
  mysqli_close($conn);
//tutup koneksi
}
?>

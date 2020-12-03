<?php
include 'connect.php';
// menyimpan data id kedalam variabel
$id = $_POST['id'];
// query SQL untuk insert data
$query="DELETE from user where id='$id'";
mysqli_query($conn, $query);
// mengalihkan ke halaman index.php
$result['message'] = "success";
echo json_encode($result);
?>

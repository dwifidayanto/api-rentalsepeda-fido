<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $noktp = $_POST['noktp'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];

    // $password = password_hash($password, PASSWORD_DEFAULT);

    require_once 'connect.php';

    $sql = "UPDATE user SET username='$username',email='$email',noktp='$noktp',nohp='$nohp', alamat='$alamat' WHERE id = '$id'";


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

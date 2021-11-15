<?php 
include "koneksi.php";

$email_no_escape = $_POST['email'];
$password_no_escape = $_POST['password'];

$email = mysqli_real_escape_string($conn, $email_no_escape);
$password = mysqli_real_escape_string($conn, $password_no_escape);


if ($email == '' && $password == '') {
    header("location:index.php");
} else {
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");

    $data = mysqli_num_rows($query);

    if ($data == 1) {
        header("location:cek_role.php");
    } else {
        header("location:index.php");
    }
}


?>
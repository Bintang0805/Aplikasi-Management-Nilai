<?php 
    include "../koneksi.php";

    session_start();

    if ($_SESSION['login'] != true) {
        header("location:../../public/index");
    } else {
        $data = $_SESSION['data'];
        $role = $data['role'];

        if ($role == "admin") {
            header("location:admin.php");
        } elseif ($role == "guru") {
            header("location:guru.php");
        } elseif ($role == "siswa") {
            header("location:siswa.php");
        }
    }

?>
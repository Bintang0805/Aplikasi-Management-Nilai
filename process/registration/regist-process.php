<?php 

    include "../koneksi.php";

    if ( !isset($_POST['no_identitas']) && !isset($_POST['email']) && !isset($_POST['password']) && !isset($_POST['role']) ) {
        header("location:../../public");
    } else {

        $no_identitas_no = $_POST['no_identitas'];
        $email_no = $_POST['email'];
        $password_no = $_POST['password'];
        $role_no = $_POST['role'];

        $no_identitas = mysqli_escape_string($conn, $no_identitas_no);
        $email = mysqli_escape_string($conn, $email_no);
        $password = mysqli_escape_string($conn, $password_no);
        $role = mysqli_escape_string($conn, $role_no);

        $data = [
            "no_identitas" => $no_identitas,
            "email" => $email,
            "password" => $password,
            "role" => $role,
        ];

        var_dump($data);

        $query = mysqli_query($conn, "SELECT * FROM users WHERE no_identitas = '$no_identitas' OR email = '$email'");

        $hasil = mysqli_num_rows($query);

        if ($hasil == 1) {
            header("location:../../public");
        } else {
            $query = mysqli_query($conn, "INSERT INTO users VALUES (null, '$no_identitas', '$email', '$password', '$role')");

            header("location:../../public");
        }

        

    }

?>
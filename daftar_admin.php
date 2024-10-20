<?php

include('config.php');

if(isset($_POST['daftar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // cek username apakah sudah terdaftar
    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");
    if($result->fetch_assoc()) {
        echo "<script>
                alert('Username telah terdaftar!')
                document.location.href = 'registrasi.php'
            </script>";
            exit;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah ke database
    mysqli_query($conn, "INSERT INTO admin VALUES(NULL, '$username', '$password')");

    if(mysqli_affected_rows($conn)) {
        echo "<script>
                alert('Admin berhasil terdaftar!')
                document.location.href = 'registrasi.php'
            </script>";
            exit;
    } else {
        echo "<script>
                alert('Admin gagal terdaftar!')
                document.location.href = 'registrasi.php'
            </script>";
            exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin</title>
</head>
<body>
    <h1>Daftar Admin</h1>
    <form action="" method="post">
        <table cellpadding="5">
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" name="username" id="username"></td>
            </tr>

            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password"></td>
            </tr>

            <tr>
                <td></td>
                <td><button type="submit" name="daftar">Daftar</button></td>
            </tr>
            
        </table>

    </form>
</body>
</html>
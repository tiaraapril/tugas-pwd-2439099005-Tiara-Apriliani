<?php

include('config.php');

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // cek username apakah sudah terdaftar
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    if($row = $result->fetch_assoc()) {
        // cek password
        if(password_verify($password, $row['password'])) {
            $_SESSION['is_login'] = true;
            header('location: index.php');
            exit;
        }
    }
    echo "<script>
                alert('Username atau password salah!')
                document.location.href = 'login.php'
            </script>";
            exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
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
                <td><button type="submit" name="login">Login</button></td>
            </tr>
            
        </table>

    </form>
</body>
</html>